<?php

include "db/dbFunctions.php";
include "db/db-config.php";

$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']): -1;

$connection = getConnection();
$citation = getQuoteByID($connection,$id)[0];

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
    <nav><a href="/citation/">Retour</a></nav>
    <main>
        <article>
            <h2><?php echo $citation["AUTEUR"]; ?></h2>
            <h4><?php echo $citation["LOGIN"]; ?></h4>
            <span>Date: <?php echo $citation["DATE_DE_CITATION"]; ?></span>
            <p><?php echo $citation["CITATION"]; ?></p>
        </article>
    </main>
</body>