<?php function quoteArray($params)
{
    $quotes = isset($params["quotes"]) ? $params["quotes"] : array();
    $tableTitle = isset($params["title"]) ? $params["title"] : array();
    echo "<h2>$tableTitle</h2>";
?>
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
            <?php quoteRows($quotes); ?>
        </tbody>
    </table>
<?php
}
