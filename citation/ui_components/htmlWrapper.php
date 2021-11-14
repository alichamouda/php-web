<?php

function htmlHeader()
{ ?>
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
        <nav>
            <a href="/">Accueil</a>
            <a href="/quotes.php">Citations</a>
        </nav>
<?php }

function htmlFooter()
{ ?>
    </body>
    </html>
<?php }

function htmlRender($renderFct, $params = array()) {
    htmlHeader();
    $renderFct($params);
    htmlFooter();
}
