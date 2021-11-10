<?php

include "db/dbFunctions.php";
include "db/dbConfig.php";
include "ui_components/quotePreview.php";
$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']): -1;

$connection = getConnection();
$citation = getQuoteByID($connection,$id);
quotePreview($citation, "/citation/");
?>