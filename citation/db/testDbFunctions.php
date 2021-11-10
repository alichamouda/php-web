<?php

include "dbFunctions.php";
include "dbConfig.php";

$connection = getConnection();
$login="alichamouda";
$author="victor hugo";
$quote="bla bla bla bla bla bla";
$quoteDate="2021-04-02";

insertQuote(
    $connection,
    $login,
    $author,
    $quote,
$quoteDate
    
);

print_r(getAllQuotes($connection));
print("<br><br>");
print_r(getAllQuotesByLogin($connection, $login) );
print("<br><br>");
print_r(getAllQuotesByAuthor($connection, $author));
print("<br><br>");