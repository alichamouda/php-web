
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'){ ?>


<body style="font-family: sans-serif;">
    <nav><a href="/citation/ajoutCtrl.php">Retour</a></nav>
    <main style="padding:32px 64px;">
        <article>
            <header>
                <h2><?php echo htmlspecialchars($_POST["auteur"]); ?></h2>
                <h4><?php echo htmlspecialchars($_POST["login"]); ?></h4>
                <span>Date: <?php echo htmlspecialchars($_POST["date-citation"]); ?></span>
                <p><?php echo htmlspecialchars($_POST["citation"]); ?></p>
            </header>
        </article>
    </main>
</body>

<?php } else { ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>ajout de citation </title>
    <meta charset="UTF-8">
</head>
<body>
    <main>
        <article>
            <header>
                <h1>Formulaire de création de citations</h1>
            </header>
            <form method="post" name="FrameCitation"
             action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table border="1" bgcolor="#ccccff" frame="apbove">
                    <tbody>
                        <tr>
                            <th><label for="login">Login*</label></th>
                            <td><input name="login" minlength="10" maxlength="64" size="32" required></td>
                        </tr>
                        <tr>
                            <th><label for="citation">Citation*</label></th>
                            <td><textarea minlength="10" cols="128" rows="5" name="citation"></textarea></td>
                        </tr>
                        <tr>
                            <th><label for="auteur">Auteur*</label></th>
                            <td><input name="auteur"  maxlength="128" size="64" required></td>
                        </tr>
                        <tr>
                            <th><label for="date-citation">Date*</label></th>
                            <td><input name="date-citation" type="date" value="<?php echo date('Y-m-d')?>" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button name="Envoyer" value="Enregistrer la citation" type="submit">Envoyer</button>
                                <input name="Effacer" value="Annuler" type="reset"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </article>
    </main>
</body>

</html>

<?php } ?>