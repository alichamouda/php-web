<html lang="fr">

<head>
    <title>Ajout de citation </title>
    <meta charset="UTF-8">
    <style>
        html,
        body {
            width: 100%;
            font-family: sans-serif;
            color: #222222;
        }

        main {
            padding: 32px;
        }

        form {
            padding: 0 16px;
            max-width: 450px;
            border-left: 4px #444444 solid;
            border-radius: 2px;
        }

        label {
            margin-bottom: 4px;
        }

        p.form-error {
            color: red;
            font-weight: 700;
            margin-top: 4px;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            margin: 8px 0;
        }

        .button-ctr {
            flex-direction: row;
            margin-top: 16px;
        }

        .button-ctr button {
            max-width: 150px;
            margin-right: 8px;
        }
    </style>
</head>
<?php
require_once( __DIR__."/entities/Citation.php");
include "db/dbConfig.php";
include "db/dbFunctions.php";
include "ui_components/dbError.php";
include "ui_components/quotePreview.php";

$hasErrors = false;
$errors = array("", "", "", "");
$citation = Citation::fromForm("", "", "", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $citation = Citation::fromForm(
        htmlspecialchars($_POST["auteur"]),
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["citation"]),
        htmlspecialchars($_POST["date-citation"])
    );

    $validation = $citation->validate();
    $errors = $validation["errors"];
    $hasErrors = $validation["hasErrors"];
}

if (!$hasErrors && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $connection = getConnection();
    $isInserted = insertQuote($connection, $citation);
    if (!$isInserted) { 
        dbError("Quote is not inserted");
    } else {
        quotePreview($citation, "/citation/ajoutCtrl.php");
    }
} else { ?>

    <body>
        <nav>
            <a href="/citation/">Accueil</a>
            <a href="/citation/citations.php">Citations</a>
        </nav>

        <main>
            <h2>Formulaire de création de citations</h1>
                <form method="post" name="FrameCitation" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-section">
                        <label for="login">Login*</label>
                        <input name="login" maxlength="64" size="32" value="<?php echo $citation->get_login(); ?>">
                        <p class="form-error"><?php echo $errors[1] ?></p>
                    </div>
                    <div class="form-section">

                        <label for="citation">Citation*</label>
                        <textarea minlength="10" cols="128" rows="5" name="citation"><?php echo $citation->get_citation(); ?></textarea>
                        <p class="form-error"><?php echo $errors[3] ?></p>
                    </div>
                    <div class="form-section">
                        <label for="auteur">Auteur*</label>
                        <input name="auteur" maxlength="128" size="64" value="<?php echo $citation->get_auteur(); ?>">
                        <p class="form-error"> <?php echo $errors[0] ?></p>

                    </div>
                    <div class="form-section">
                        <label for="date-citation">Date*</label>
                        <input name="date-citation" type="date" value="<?php echo strlen($citation->get_dateCitation()) > 0 ? $citation->get_dateCitation() : date('Y-m-d') ?>">
                        <p class="form-error"> <?php echo $errors[2] ?></p>
                    </div>
                    <div class="form-section button-ctr">
                        <button name="Envoyer" type="submit">Enregistrer la citation</button>
                        <button name="Effacer" type="reset">Annuler</button>
                    </div>
                    </tbody>
                    </table>
                </form>
        </main>
    </body>
<?php } ?>

</html>