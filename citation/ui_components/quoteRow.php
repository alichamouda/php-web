<?php

function quoteRow($citation) {  ?>
<tr>
    <td><?php echo $citation->get_id() ;?></td>
    <td><?php echo $citation->get_login() ;?></td>
    <td><?php echo $citation->get_auteur(); ?></td>
    <td><?php echo $citation->get_dateCitation(); ?></td>
    <td><?php echo $citation->get_dateEnregistrement(); ?></td>
    <td>
    <a href="/citation/viewOneCitation.php?id=<?php echo $citation->get_id(); ?>">
    Afficher citation</a>    
    </td>
</tr>
<?php }?>
