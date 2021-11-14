<?php
require_once(__DIR__."/../repositories/QuoteRepository.php");
require_once(__DIR__."/../ui_components/quoteRow.php");
?>

<nav>
    <a href="/">Retour</a>
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
    <?php quoteRows(QuoteRepository::getInstance()->getAllQuotes());?>
    </tbody>
</table>