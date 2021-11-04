<?php

$input = (isset($_GET['n']) && is_numeric($_GET['n'])) ? intval($_GET['n']): -1;
if ($input < 1) {
    print ("{\"error\":\"Please provide us a positive number\"}");
    return;
}

$factorial=1;
for ($i=1;$i <=$input; $i++) {
    $factorial = $factorial*$i;
    print("<p>Factoriel de $i est $factorial</p>");
}
?>
