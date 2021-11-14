<?php
require_once(__DIR__ . "/repositories/QuoteRepository.php");
require_once(__DIR__ . "/ui_components/quoteRow.php");

session_start();
$login = (isset($_SESSION["login"]) ? $_SESSION["login"] : "");
$isLogged = (isset($_SESSION["loggedin"]) ? $_SESSION["loggedin"] : false);
?>

<nav style="width: calc(100% - 64px) ; display: flex;flex-direction: row; justify-content: space-between;padding: 0 32px;">

    <a href="/quotes.php">Citations</a>
    <?php if ($isLogged) { ?>
        <a href="/addQuoteForm.php">Nouvelle Citation</a>
        <a href="/logout.php">Se déconnecter</a>
    <?php } else { ?>
        <a href="/signup.php">Inscription</a>
        <a href="/signin.php">Login</a>
    <?php } ?>
    <?php if ($isLogged && $login == "alichamouda") { ?>
        <a href="#" onclick="confirmDbInit();">Initialiser BD</a>
    <?php } ?>
</nav>

<h1>Bienvenue <?php echo $login; ?> dans notre application de gestion de citations</h1>
<h2>Citations des 5 derniers jours</h2>
<p>Login: alichamouda, password: 00000000</p>
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
        <?php quoteRows(QuoteRepository::getInstance()->getLastFiveDaysQuotes()); ?>
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