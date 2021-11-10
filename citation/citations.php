<?php
include "db/dbConfig.php";
include "db/dbFunctions.php";
$connection = getConnection();
$citations = getAllQuotes($connection);
?>
<nav>
    <a href="/citation/">Retour</a>
</nav>
<h2>Toutes les citations</h2>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>login</th>
            <th>auteur</th>
            <th>date citation</th>
            <th>date creation</th>
            <th>citation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "ui_components/quoteRow.php";
        foreach ($citations as $citation) {
            quoteRow($citation);
        }
        ?>
    </tbody>
</table>