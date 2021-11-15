<?php

function htmlHeader()
{ 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $login = isset($_SESSION["login"]) ? $_SESSION["login"]:"";
    $isLogged =  isset($_SESSION["loggedin"]) ? $_SESSION["loggedin"]:false;
    ?>
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
                display: block;
            }

            input {
                display: block;
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

    <body>
        <nav style="width: calc(100% - 64px) ; display: flex;flex-direction: row; justify-content: space-between;padding: 0 32px;">
        <a href="/">Home</a>    
        <a href="/quote/quotes.php">Citations</a>
            <?php if ($isLogged) { ?>
                <a href="/quote/addQuoteForm.php">Nouvelle Citation</a>
                <a href="/auth/logout.php">Se déconnecter</a>
            <?php } else { ?>
                <a href="/auth/signup.php">Inscription</a>
                <a href="/auth/signin.php">Login</a>
            <?php } ?>
            <?php if ($isLogged && $login == "alichamouda") { ?>
                <a href="#" onclick="confirmDbInit();">Initialiser BD</a>
            <?php } ?>
        </nav>
    <?php }

function htmlFooter()
{ ?>
        <script>
            function confirmDbInit() {
                var answer = confirm("Vous voulez vraiment reinitialiser votre Base de Données ?");
                if (answer) {
                    window.location.href = "/db/init.php";
                }
            }
        </script>
    </body>

    </html>
<?php }

function htmlRender($renderFct, $params = array())
{
    htmlHeader();
    $renderFct($params);
    htmlFooter();
}
