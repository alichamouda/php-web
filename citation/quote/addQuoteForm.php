<?php
require_once( __DIR__."/../services/QuoteService.php");
require_once( __DIR__."/../ui_components/dbError.php");
require_once( __DIR__."/../ui_components/quotePreview.php");
require_once( __DIR__."/../ui_components/quoteForm.php");
require_once( __DIR__."/../ui_components/htmlWrapper.php");
require_once(__DIR__."/../services/redirect.php");

session_start();
if(!isset($_SESSION["login"])){
    redirect("index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

    if (!$token || $token !== $_SESSION['token']) {
        // return 405 http status code
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit;
    } 


    $res = QuoteService::getInstance()->insertQuote($_POST,$_SESSION["login"]);

    if (!$res["hasError"]) {
        htmlRender('quotePreview',array("quote"=> $res["quote"], "backUrl"=>"/quote/addQuoteForm.php"));
    } else {
        isset($res["errors"]) ? htmlRender('quoteForm', $res) : htmlRender('dbError',array("msg"=> "Quote is not inserted"));
    }
} else {htmlRender('quoteForm');}
