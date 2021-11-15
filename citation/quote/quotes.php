<?php
require_once(__DIR__."/../repositories/QuoteRepository.php");
require_once(__DIR__."/../ui_components/quoteRow.php");
require_once(__DIR__."/../ui_components/quoteArray.php");
require_once(__DIR__."/../ui_components/htmlWrapper.php");

$quotes = QuoteRepository::getInstance()->getAllQuotes();
htmlRender('quoteArray', array(
    "quotes"=> $quotes,
    "title"=> "Toutes les citations"
));
?>
