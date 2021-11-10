<?php


function getConnection() {
    $DB_NAME = "CITATION_DB";
    $DB_USERNAME = "debian-sys-maint";
    $DB_PASSWORD = "R4mVDpkwirHqmPC7";
    $DB_HOSTNAME = "localhost";

    return new PDO(
        "mysql:host=$DB_HOSTNAME;dbname=$DB_NAME",
        $DB_USERNAME,
        $DB_PASSWORD,
        array(
            PDO::ATTR_PERSISTENT => true
        )
    );
}

?>