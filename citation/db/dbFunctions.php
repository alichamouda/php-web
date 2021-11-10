<?php 

// insert new quote
function insertQuote(
    $connection,
    $login,
    $author,
    $quote,
    $quoteDate
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
                ':login'=> $login,
                ':author'=> $author,
                ':quote_date'=> $quoteDate,
                ':quote'=> $quote));
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
                SELECT * 
                FROM CITATION
                WHERE DATE_ENREGISTREMENT >= DATE_SUB(NOW(), INTERVAL 5 DAY)');
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
            prepare('SELECT * FROM CITATION');
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
                SELECT * 
                FROM CITATION
                WHERE ID = :id');
        $statement->execute(array(':id'=> $id));
        return $statement->fetchAll();
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
                SELECT * 
                FROM CITATION
                WHERE LOGIN = :login');
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
                SELECT * 
                FROM CITATION
                WHERE AUTEUR = :author');
        $statement->execute(array(':author'=> $author));
        return $statement->fetchAll();
    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }
}
