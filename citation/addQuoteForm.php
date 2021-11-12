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
require_once( __DIR__."/entities/Quote.php");
require_once( __DIR__."/repositories/QuoteRepository.php");
require_once( __DIR__."/ui_components/dbError.php");
require_once( __DIR__."/ui_components/quotePreview.php");

$hasErrors = false;
$errors = array("", "", "", "");
$quote = Quote::fromForm("", "", "", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quote = Quote::fromForm(
        htmlspecialchars($_POST["auteur"]),
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["citation"]),
        htmlspecialchars($_POST["date-citation"])
    );

    $validation = $quote->validate();
    $errors = $validation["errors"];
    $hasErrors = $validation["hasErrors"];
}

if (!$hasErrors && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!QuoteRepository::getInstance()->insertQuote($quote)) { 
        dbError("Quote is not inserted");
    } else {
        quotePreview($quote, "/addQuoteForm.php");
    }
} else { ?>
    <body>
        <nav>
            <a href="/">Accueil</a>
            <a href="/citations.php">Citations</a>
        </nav>
        <main>
            <h2>Formulaire de création de citations</h1>
                <form method="post" name="FrameCitation" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-section">
                        <label for="login">Login*</label>
                        <input name="login" maxlength="64" size="6" value="<?php echo $quote->get_login(); ?>">
                        <p class="form-error"><?php echo $errors[1] ?></p>
                    </div>
                    <div class="form-section">

                        <label for="citation">Citation*</label>
                        <textarea minlength="10" cols="128" rows="5" name="citation"><?php echo $quote->get_quote(); ?></textarea>
                        <p class="form-error"><?php echo $errors[3] ?></p>
                    </div>
                    <div class="form-section">
                        <label for="auteur">Auteur*</label>
                        <input name="auteur" maxlength="128" size="64" value="<?php echo $quote->get_author(); ?>">
                        <p class="form-error"> <?php echo $errors[0] ?></p>

                    </div>
                    <div class="form-section">
                        <label for="date-citation">Date*</label>
                        <input name="date-citation" type="date" value="<?php echo strlen($quote->get_date()) > 0 ? $quote->get_date() : date('Y-m-d') ?>">
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