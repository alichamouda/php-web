<?php

class Quote {
    public  $id;
    public  $authour;
    public  $login;
    public  $quote;
    public  $date;
    public  $createdAt;
    public const TABLE_NAME ="QUOTE";
    public const CREATION_QUERY = 'CREATE TABLE '.DBConnection::DB_NAME.'.'.Quote::TABLE_NAME.' (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        LOGIN   VARCHAR(64),
        AUTHOR  VARCHAR(128),
        DATE    DATE,
        QUOTE    TEXT,
        CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (LOGIN)
            REFERENCES USER(LOGIN)
            ON DELETE CASCADE
    )';

    function __construct() {}

    public static function create(
        $author,
        $login,
        $quote,
        $date
    ) {
        $instance = new Quote();
        $instance ->author = $author;
        $instance ->login = $login;
        $instance ->quote = $quote;
        $instance ->date = $date;
        return $instance ;
    }



    public static function fromForm(
        $author,
        $login,
        $quote,
        $date
    ) {
        
        $instance =  Quote::create(
            $author,
            $login,
            $quote,
            $date
        );
        return $instance;
    }

    public static function withIdAndCreationDate(
        $id,
        $createdAt,
        $author,
        $login,
        $quote,
        $date
    ) {
        $instance = Quote::create(
            $author,
            $login,
            $quote,
            $date
        );
        $instance->id = $id;
        $instance->createdAt = $createdAt;
        return $instance;
    }

    public function validate()
    {
        $errors = array("", "", "", "");
        $hasErrors = false;
        if (strlen($this->get_author()) < 10 || strlen($this->get_author()) > 15) {
            $errors[0] = "Nom d'author doit être entre 10 et 15 chars";
            $hasErrors = true;
        }

        if (strlen($this->get_login()) < 10) {
            $errors[1] = "Login doit dépasser les 10 caractères";
            $hasErrors = true;
        }

        if ((time() - (60 * 60 * 24)) < strtotime($this->get_date())) {
            $errors[2] = "Date de quote doit être avant " . Date("d-m-Y");
            $hasErrors = true;
        }

        if (strlen($this->get_quote()) < 10) {
            $errors[3] = "Une quote doit dépasser les 10 caractères";
            $hasErrors = true;
        }

        return array("errors" => $errors, "hasErrors" => $hasErrors);
    }

    /**
     * Get the value of _id
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Get the value of _author
     */
    public function get_author()
    {
        return $this->author;
    }

    /**
     * Get the value of _login
     */
    public function get_login()
    {
        return $this->login;
    }

    /**
     * Get the value of _quote
     */
    public function get_quote()
    {
        return $this->quote;
    }

    /**
     * Get the value of _createdAt
     */
    public function get_createdAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of _date
     */
    public function get_date()
    {
        return $this->date;
    }
}
