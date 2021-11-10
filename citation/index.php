<?php
include "db/dbConfig.php";
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
        include "ui_components/quoteRow.php";
        foreach ($citations as $citation) {

            quoteRow($citation);
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