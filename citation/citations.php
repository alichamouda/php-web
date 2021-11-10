<?php
include "db/db-config.php";
include "db/dbFunctions.php";
$connection = getConnection();
$citations = getAllQuotes($connection);
?>
<nav>
    <a href="/citation/">Retour</a>
</nav>
<h2>Toutes les citations</h2>
<table>
<thead>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>auteur</th>
        <th>date citation</th>
        <th>date creation</th>
        <th>citation</th>
    </tr>
</thead>
<tbody>
<?php
foreach($citations as $citation) {
?>
<tr>
    <td><?php echo $citation["ID"] ?></td>
    <td><?php echo $citation["LOGIN"] ?></td>
    <td><?php echo $citation["AUTEUR"] ?></td>
    <td><?php echo $citation["DATE_DE_CITATION"] ?></td>
    <td><?php echo $citation["DATE_ENREGISTREMENT"] ?></td>
    <td>
    <a href="/citation/viewOneCitation.php?id=<?php echo $citation["ID"] ?>">Afficher citation</a>    
    </td>
</tr>


<?php
}

?>
</tbody>
</table>