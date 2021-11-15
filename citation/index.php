<?php
require_once(__DIR__ . "/repositories/QuoteRepository.php");
require_once(__DIR__ . "/ui_components/quoteRow.php");
require_once(__DIR__."/ui_components/main.php");
require_once(__DIR__."/ui_components/htmlWrapper.php");

session_start();
$login = (isset($_SESSION["login"]) ? $_SESSION["login"] : "");
$isLogged = (isset($_SESSION["loggedin"]) ? $_SESSION["loggedin"] : false);
$queries = QuoteRepository::getInstance()->getLastFiveDaysQuotes();
htmlRender('mainPage', array(
    'queries' => $queries,
    'login'=> $login
));

?>




