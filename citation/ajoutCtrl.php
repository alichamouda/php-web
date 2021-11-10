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
            padding: 0 16px ;
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
$hasErrors = false;
$errors = array("", "", "", "");
$auteur = "";
$login = "";
$dateCitation = "";
$citation = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $auteur = htmlspecialchars($_POST["auteur"]);
    $login = htmlspecialchars($_POST["login"]);
    $dateCitation = htmlspecialchars($_POST["date-citation"]);
    $citation = htmlspecialchars($_POST["citation"]);


    if (strlen($auteur) < 10 || strlen($auteur) > 15) {
        $errors[0] = "Nom d'auteur doit être entre 10 et 15 chars";
        $hasErrors = true;
    }

    if (strlen($login) < 10) {
        $errors[1] = "Login doit dépasser les 10 caractères";
        $hasErrors = true;
    }

    if ((time() - (60 * 60 * 24)) < strtotime($dateCitation)) {
        $errors[2] = "Date de citation doit être avant " . Date("d-m-Y");
        $hasErrors = true;
    }

    if (strlen($citation) < 10) {
        $errors[3] = "Une citation doit dépasser les 10 caractères";
        $hasErrors = true;
    }
}

if (!$hasErrors && $_SERVER['REQUEST_METHOD'] === 'POST') { ?>


    <body>
        <nav><a href="/citation/ajoutCtrl.php">Retour</a></nav>
        <main>
            <article>
                <header>
                    <h2><?php echo $auteur; ?></h2>
                    <h4><?php echo $login; ?></h4>
                    <span>Date: <?php echo $dateCitation; ?></span>
                    <p><?php echo $citation; ?></p>
                </header>
            </article>
        </main>
    </body>

<?php } else { ?>

    <body>
        <main>
            <article>
                <header>
                    <h1>Formulaire de création de citations</h1>
                </header>
                <form method="post" name="FrameCitation" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="form-section">
                        <label for="login">Login*</label>
                        <input name="login" maxlength="64" size="32" value="<?php echo $login ?>">
                        <p class="form-error"><?php echo $errors[1] ?></p>
                    </div>
                    <div class="form-section">

                        <label for="citation">Citation*</label>
                        <textarea minlength="10" cols="128" rows="5" name="citation"><?php echo $citation ?></textarea>
                        <p class="form-error"><?php echo $errors[3] ?></p>
                    </div>
                    <div class="form-section">
                        <label for="auteur">Auteur*</label>
                        <input name="auteur" maxlength="128" size="64" value="<?php echo $auteur ?>">
                        <p class="form-error"> <?php echo $errors[0] ?></p>

                    </div>
                    <div class="form-section">
                        <label for="date-citation">Date*</label>
                        <input name="date-citation" type="date" value="<?php echo strlen($dateCitation) > 0 ? $dateCitation : date('Y-m-d') ?>">
                        <p class="form-error"> <?php echo $errors[2] ?></p>
                    </div>
                    <div class="form-section button-ctr">
                        <button name="Envoyer" type="submit">Enregistrer la citation</button>
                        <button name="Effacer" type="reset">Annuler</button>
                    </div>
                    </tbody>
                    </table>
                </form>
            </article>
        </main>
    </body>
<?php } ?>

</html>