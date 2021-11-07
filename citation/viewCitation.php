<?php




?>


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