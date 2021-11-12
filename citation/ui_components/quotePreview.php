<?php function quotePreview($quote, $backUrl){?>
<nav><a href="<?php echo $backUrl; ?>">Retour</a></nav>
<main>
    <article>
        <h2><?php echo $quote->get_author(); ?></h2>
        <h4><?php echo $quote->get_login(); ?></h4>
        <span>Date: <?php echo $quote->get_date(); ?></span>
        <p><?php echo $quote->get_quote(); ?></p>
    </article>
</main>
<?php }?>