<?php
require_once(__DIR__."/ui_components/quotePreview.php");
require_once(__DIR__."/repositories/QuoteRepository.php");

$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']): -1;
$quote =QuoteRepository::getInstance()->getQuoteByID($id);
quotePreview($quote, "/");

?>