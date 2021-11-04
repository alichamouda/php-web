
<html>
<head>
<style>
.multi-tables-ctr {
    width: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 8px;
}
.multi-table {
    font-size: 12px;
    width: calc(20% - 8px);
    border: 1px black solid;
    padding: 8px 16px;
    box-sizing: border-box;
}
</style>
</head>

<body>

<div class="multi-tables-ctr">
<?php

// tables de multiplication de 1 à 10
// aficher une table de taille 15
    require __DIR__ . '/function.php';
    for ($i=1;$i<=10;$i++) {
        echo tableMult($i, 10);
    }
?>
</div>
</body>

</html>