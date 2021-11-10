<?php 
require_once( __DIR__."/../entities/Citation.php");
// insert new quote
function insertQuote(
    $connection,
    $citation
) {
    try {
        $statement = $connection->
            prepare('
                INSERT INTO CITATION 
                    (LOGIN, AUTEUR, DATE_DE_CITATION, CITATION)
                VALUES
                    (:login, :author, :quote_date, :quote) 
            ');
        $statement->execute(
            array(
                ':login'=> $citation->get_login(),
                ':author'=> $citation->get_auteur(),
                ':quote_date'=> $citation->get_dateCitation(),
                ':quote'=> $citation->get_citation()));
        return true;

    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }
}

// last 5 days quotes
function getLastFiveDaysQuotes($connection) {
    try {
        $statement = $connection->
            prepare('
                SELECT ID as id, 
                LOGIN as login,
                AUTEUR as auteur,
                DATE_DE_CITATION as dateCitation,
                CITATION as citation,
                DATE_ENREGISTREMENT as dateEnregistrement  
                FROM CITATION
                WHERE DATE_ENREGISTREMENT >= DATE_SUB(NOW(), INTERVAL 5 DAY)');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Citation');
        $statement->execute();
        return $statement->fetchAll();
    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }
}


// fetch all quotes
function getAllQuotes($connection) {
    try {
        $statement = $connection->
            prepare('SELECT ID as id, 
            LOGIN as login,
            AUTEUR as auteur,
            DATE_DE_CITATION as dateCitation,
            CITATION as citation,
            DATE_ENREGISTREMENT as dateEnregistrement  FROM CITATION');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Citation');
        $statement->execute();
    return $statement->fetchAll();

    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }
}
function getQuoteByID($connection, $id) {
    try {
        $statement = $connection->
            prepare('
                SELECT ID as id, 
                    LOGIN as login,
                    AUTEUR as auteur,
                    DATE_DE_CITATION as dateCitation,
                    CITATION as citation,
                    DATE_ENREGISTREMENT as dateEnregistrement
                FROM CITATION
                WHERE ID = :id');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Citation');
        $statement->execute(array(':id'=> $id));
        return $statement->fetch();
    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }
}
// fetch quote by login
function getAllQuotesByLogin($connection, $login) {
    try {
        $statement = $connection->
            prepare('
                SELECT ID as id, 
                LOGIN as login,
                AUTEUR as auteur,
                DATE_DE_CITATION as dateCitation,
                CITATION as citation,
                DATE_ENREGISTREMENT as dateEnregistrement 
                FROM CITATION
                WHERE LOGIN = :login');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Citation');
        $statement->execute(array(':login'=> $login));
        return $statement->fetchAll();
    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }
}

// fetch quote by Author
function getAllQuotesByAuthor($connection, $author) {
    try {
        $statement = $connection->
            prepare('
                SELECT 
                ID as id, 
                LOGIN as login,
                AUTEUR as auteur,
                DATE_DE_CITATION as dateCitation,
                CITATION as citation,
                DATE_ENREGISTREMENT as dateEnregistrement  
                FROM CITATION
                WHERE AUTEUR = :author');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Citation');
        $statement->execute(array(':author'=> $author));
        return $statement->fetchAll();
    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }
}
