<?php
require_once(__DIR__."/repositories/QuoteRepository.php");
require_once(__DIR__."/ui_components/quoteRow.php");
?>

<nav>
    <a href="/addQuoteForm.php">Nouvelle Citation</a>
    <a href="/citations.php">Citations</a>
    <a href="#" onclick="confirmDbInit();">Initialiser BD</a>
</nav>

<h1>Bienvenue dans notre application de gestion de citations</h1>
<h2>Citations des 5 derniers jours</h2>
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
        <?php quoteRows(QuoteRepository::getInstance()->getLastFiveDaysQuotes());?>
    </tbody>
</table>

<script>
    function confirmDbInit() {
        var answer = confirm("Vous voulez vraiment reinitialiser votre Base de Données ?");
        if (answer) {
            window.location.href = "/db/init.php";
        }
    }
</script>