<?php

require_once(__DIR__."/../repositories/QuoteRepository.php");

class QuoteService {
    private static $_instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new QuoteService();
        }
        return self::$_instance;
    }

    public function insertQuote($postObject) {
        $quote = Quote::fromForm(
            htmlspecialchars($postObject["auteur"]),
            htmlspecialchars($postObject["login"]),
            htmlspecialchars($postObject["citation"]),
            htmlspecialchars($postObject["date-citation"])
        );
        
        $validation = $quote->validate();

        $dbError=false;
        if(!$validation["hasErrors"]) {
            $dbError = !QuoteRepository::getInstance()->insertQuote($quote);
        } else {
            $validation["quote"] = $quote;
            return $validation;
        }

        return array("hasError"=> $dbError, "quote"=> $quote);
    }
}