<?php
include "db/db-config.php";
include "db/dbFunctions.php";
$connection = getConnection();
$citations = getLastFiveDaysQuotes($connection);
?>

<nav>
    <a href="/citation/ajoutCtrl.php">Nouvelle Citation</a>
    <a href="/citation/citations.php">Citations</a>
    <a href="#" onclick="confirmDbInit();">Initialiser BD</a>
</nav>

<h1>Bienvenue dans notre application de gestion de citations</h1>
<h2>Citations des 5 derniers jours</h2>
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
<script>

function confirmDbInit() {
    var answer = confirm("Vous voulez vraiment reinitialiser votre Base de Données ?");
if(answer) {
window.location.href="/citation/db/init.php";
}

}



</script>