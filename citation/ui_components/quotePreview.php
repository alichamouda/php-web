<?php function quotePreview($citation, $backUrl){?>
<nav><a href="<?php echo $backUrl; ?>">Retour</a></nav>
<main>
    <article>
        <h2><?php echo $citation->get_auteur(); ?></h2>
        <h4><?php echo $citation->get_login(); ?></h4>
        <span>Date: <?php echo $citation->get_dateCitation(); ?></span>
        <p><?php echo $citation->get_citation(); ?></p>
    </article>
</main>
<?php }?>