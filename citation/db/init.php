<?php
require_once(__DIR__."/DBConnection.php");
require_once(__DIR__."/../entities/Quote.php");
require_once(__DIR__."/../entities/User.php");

try {
    $dbConnection = DBConnection::getConnection();
    $dbConnection->exec('DROP TABLE IF EXISTS ' . DBConnection::DB_NAME . '.' . QUOTE::TABLE_NAME);
    $dbConnection->exec('DROP TABLE IF EXISTS ' . DBConnection::DB_NAME . '.' . User::TABLE_NAME);
    $dbConnection->exec(User::CREATION_QUERY);
    $dbConnection->exec(Quote::CREATION_QUERY);
    header("Location: " . "/index.php");
    die();
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
