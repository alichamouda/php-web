<?php
    $input = (isset($_POST['input']) && is_numeric($_POST['input'])) ? intval($_POST['input']): -1;

    if ($input < 1) {
        $factorial="";
    } else {
        $factorial=1;
        for ($i=1;$i <=$input; $i++) {
            $factorial = $factorial*$i;
        }
    }
?>

<html>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Proposer un nombre: </h2>
        <label>Nombre:</label>
        <input type="number" name="input" step="1" min="1" />
        <button type="submit">Soumettre</button>
    </form>
</body>

</html>
<?php
    echo $factorial
?>