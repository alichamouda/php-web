<?php
require_once(__DIR__."/../services/UserService.php");
require_once(__DIR__."/../services/redirect.php");
require_once(__DIR__."/../ui_components/signupForm.php");
require_once(__DIR__."/../ui_components/htmlWrapper.php");
require_once(__DIR__."/../entities/User.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $res = UserService::getInstance()->insertUser($_POST);
   !$res["hasError"]? redirect('/index.php'): htmlRender('signupForm', $res);
} else {
    htmlRender('signupForm');
}
