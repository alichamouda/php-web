
<?php


include "dbConfig.php";

try {
    $dbh = getConnection();

    $dbh->exec(
        'DROP TABLE CITATION'
    );
    $res = $dbh->exec(
        'CREATE TABLE CITATION (
            ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            LOGIN   VARCHAR(64),
            AUTEUR  VARCHAR(128),
            DATE_DE_CITATION    DATE,
            CITATION    TEXT,
            DATE_ENREGISTREMENT TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )'
    );
    $dbh = NULL;
    header("Location: "."/citation/index.php");
    die();


} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
