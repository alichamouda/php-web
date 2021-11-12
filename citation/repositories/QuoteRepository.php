<?php
require_once(__DIR__."/../db/DBConnection.php");
require_once(__DIR__."/../entities/Quote.php");

class QuoteRepository
{
    public const className = 'Quote';
    public const selectQuery = '
        SELECT ID as id, 
        LOGIN as login,
        AUTHOR as author,
        DATE as date,
        QUOTE as quote,
        CREATED_AT as createdAT  
        FROM QUOTE    ';


    private static $_instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new QuoteRepository();
        }
        return self::$_instance;
    }

    public function insertQuote($quote)
    {
        try {
            DBConnection::executeStatement(
                '
                INSERT INTO QUOTE 
                    (LOGIN, AUTHOR, DATE, QUOTE)
                VALUES
                    (:login, :author, :quote_date, :quote) 
            ',
                array(
                    ':login' => $quote->get_login(),
                    ':author' => $quote->get_author(),
                    ':quote_date' => $quote->get_date(),
                    ':quote' => $quote->get_quote()
                )
            );
            return true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

    // last 5 days quotes
    public function getLastFiveDaysQuotes()
    {
        $connection =  DBConnection::getConnection();
        try {
            $statement = $connection->prepare(
                QuoteRepository::selectQuery . '
                WHERE  CREATED_AT >= DATE_SUB(NOW(), INTERVAL 5 DAY)'
            );
            $statement->setFetchMode(PDO::FETCH_CLASS, 'Quote');
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }
    }


    // fetch all quotes
    public function getAllQuotes()
    {
        $connection =  DBConnection::getConnection();
        try {
            $statement = $connection->prepare(QuoteRepository::selectQuery);
            $statement->setFetchMode(PDO::FETCH_CLASS, QuoteRepository::className);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

    public function getQuoteByID($id)
    {
        $connection =  DBConnection::getConnection();
        try {
            $statement = $connection->prepare(
                QuoteRepository::selectQuery .
                    ' WHERE ID = :id'
            );
            $statement->setFetchMode(PDO::FETCH_CLASS, QuoteRepository::className);
            $statement->execute(array(':id' => $id));
            return $statement->fetch();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

    // fetch quote by login
    public function getAllQuotesByLogin($login)
    {
        $connection =  DBConnection::getConnection();
        try {
            $statement = $connection->prepare(
                QuoteRepository::selectQuery .
                    ' WHERE LOGIN = :login'
            );
            $statement->setFetchMode(PDO::FETCH_CLASS, QuoteRepository::className);
            $statement->execute(array(':login' => $login));
            return $statement->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

    // fetch quote by Author
    public function getAllQuotesByAuthor($author)
    {
        $connection =  DBConnection::getConnection();
        try {
            $statement = $connection->prepare(
                QuoteRepository::selectQuery .
                    ' WHERE AUTHOR = :author'
            );
            $statement->setFetchMode(PDO::FETCH_CLASS, QuoteRepository::className);
            $statement->execute(array(':author' => $author));
            return $statement->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
}
