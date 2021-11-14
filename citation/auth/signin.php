<?php
require_once(__DIR__."/../services/UserService.php");
require_once(__DIR__."/../services/redirect.php");
require_once(__DIR__."/../ui_components/signinForm.php");
require_once(__DIR__."/../ui_components/htmlWrapper.php");
require_once(__DIR__."/../entities/User.php");


function authenticate($user) {
    session_start();
    $_SESSION["login"]=$user->getLogin();
    $_SESSION["lastConnection"]=Date("Y-m-d H:i:s");
    $_SESSION['loggedin'] = true;
    redirect('/index.php');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $res = UserService::getInstance()->canLogin($_POST);
   !$res["hasError"]? authenticate($res["user"]): htmlRender('signinForm', $res);

} else {
    session_start();
    (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ?  redirect('/index.php'): htmlRender('signinForm');
}
