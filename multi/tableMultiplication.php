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

        // aficher une table de taille 15
        require __DIR__ . '/function.php';

        $numero = (isset($_GET['numero']) &&
            is_numeric($_GET['numero'])) ? intval($_GET['numero']) : -1;
        $taille = (isset($_GET['taille']) &&
            is_numeric($_GET['taille'])) ? intval($_GET['taille']) : -1;

        echo tableMult($numero, $taille);
        ?>
    </div>
</body>

</html>