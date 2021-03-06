<?php

class User {
    public $id;
    public $login;
    public $email;
    public $password;
    public $dateEnregistrement;

    function __construct() {}

    public static function create(
    
        $login,
        $email,
        $password
    ) {
        $instance = new User();
        $instance ->login = $login;
        $instance ->email = $email;
        $instance ->password = $password;
        return $instance ;
    }

    public static function fromForm(
        $login,
        $email,
        $password
    ) {
        
        $instance =  User::create(
            $login,
            $email,
            $password
        );
        return $instance;
    }

    public static function withIdAndCreationDate(
        $id,
        $dateEnregistrement,
        $login,
        $email,
        $password
    ) {
        $instance = User::create(
            $login,
            $email,
            $password
        );
        $instance->id = $id;
        $instance->dateEnregistrement = $dateEnregistrement;
        return $instance;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of dateEnregistrement
     */ 
    public function getDateEnregistrement()
    {
        return $this->dateEnregistrement;
    }
}