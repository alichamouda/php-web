<?php function mainPage($params =array())
{
    $login = isset($params["login"]) ? $params["login"] : "";
    $queries = isset($params["queries"]) ? $params["queries"] : array();
?>
    <h1>Bienvenue <?php echo $login; ?> dans notre application de gestion de citations</h1>
    <h2>Citations des 5 derniers jours</h2>
    <p>Login: alichamouda, password: 00000000</p>
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
            <?php quoteRows($queries); ?>
        </tbody>
    </table>
<?php
}
