<?php

class Citation {
    public  $id;
    public  $auteur;
    public  $login;
    public  $citation;
    public  $dateEnregistrement;
    public  $dateCitation;

    function __construct() {}

    public static function create(
        $auteur,
        $login,
        $citation,
        $dateCitation
    ) {
        $instance = new Citation();
        $instance ->auteur = $auteur;
        $instance ->login = $login;
        $instance ->citation = $citation;
        $instance ->dateCitation = $dateCitation;
        return $instance ;
    }



    public static function fromForm(
        $auteur,
        $login,
        $citation,
        $dateCitation
    ) {
        
        $instance =  Citation::create(
            $auteur,
            $login,
            $citation,
            $dateCitation
        );
        return $instance;
    }

    public static function withIdAndCreationDate(
        $id,
        $dateEnregistrement,
        $auteur,
        $login,
        $citation,
        $dateCitation
    ) {
        $instance = Citation::create(
            $auteur,
            $login,
            $citation,
            $dateCitation
        );
        $instance->id = $id;
        $instance->dateEnregistrement = $dateEnregistrement;
        return $instance;
    }

    public function validate()
    {
        $errors = array("", "", "", "");
        $hasErrors = false;
        if (strlen($this->get_auteur()) < 10 || strlen($this->get_auteur()) > 15) {
            $errors[0] = "Nom d'auteur doit être entre 10 et 15 chars";
            $hasErrors = true;
        }

        if (strlen($this->get_login()) < 10) {
            $errors[1] = "Login doit dépasser les 10 caractères";
            $hasErrors = true;
        }

        if ((time() - (60 * 60 * 24)) < strtotime($this->get_dateCitation())) {
            $errors[2] = "Date de citation doit être avant " . Date("d-m-Y");
            $hasErrors = true;
        }

        if (strlen($this->get_citation()) < 10) {
            $errors[3] = "Une citation doit dépasser les 10 caractères";
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
     * Get the value of _auteur
     */
    public function get_auteur()
    {
        return $this->auteur;
    }

    /**
     * Get the value of _login
     */
    public function get_login()
    {
        return $this->login;
    }

    /**
     * Get the value of _citation
     */
    public function get_citation()
    {
        return $this->citation;
    }

    /**
     * Get the value of _dateEnregistrement
     */
    public function get_dateEnregistrement()
    {
        return $this->dateEnregistrement;
    }

    /**
     * Get the value of _dateCitation
     */
    public function get_dateCitation()
    {
        return $this->dateCitation;
    }
}
