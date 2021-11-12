<?php
function quoteRow($quote)
{      ?>
    <tr>
        <td><?php echo $quote->get_id(); ?></td>
        <td><?php echo $quote->get_login(); ?></td>
        <td><?php echo $quote->get_author(); ?></td>
        <td><?php echo $quote->get_date(); ?></td>
        <td><?php echo $quote->get_createdAt(); ?></td>
        <td>
            <a href="/viewOneCitation.php?id=<?php echo $quote->get_id(); ?>">Afficher citation</a>
        </td>
    </tr>
<?php }


function quoteRows($quotes)
{
    foreach ($quotes as $quote) {
        quoteRow($quote);
    }
} ?>