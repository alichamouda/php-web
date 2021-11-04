<html>

<body>
    <h1>Bienvenue sur l'appli de multiplication</h1>
    <a href="/multi/tablesMultiplications.php">
        Tables de multiplication
    </a>
    <br>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        $url = "/multi/tableMultiplication.php?numero=" . $i . "&taille=10";
        print("<a href=\"$url\"> Table de multiplication $i</a><br>");
    }
    ?>

</body>

</html>