<?php
require_once(__DIR__."/../repositories/UserRepository.php");
require_once(__DIR__."/../entities/User.php");
class UserService {

    private static $_instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new UserService();
        }
        return self::$_instance;
    }

    public function insertUser($postObject) {
        $user = User::fromForm(
            htmlspecialchars($postObject["login"]),
            htmlspecialchars($postObject["email"]),
            htmlspecialchars($postObject["password"])
        );
        $res =  UserRepository::getInstance()->insertUser($user);
        return array(
            "user"=> $user,
            "hasError"=> $res["hasError"],
            "message"=> $res["message"]
        );
    }

    public function canLogin($postObject) {

        $login = isset($postObject["login"]) ?$postObject["login"]:"";
        $password = isset($postObject["password"]) ? $postObject["password"]:"";

        $userByLogin =  UserRepository::getInstance()->getUserByLogin($login);



        if($userByLogin == NULL){
            return array(
                "user"=>$userByLogin,
                "hasError" => true,
                "message"=>"Login Failed",
            );
        }
        //use hash
        return array(
            "user"=>$userByLogin,
            "hasError" => !($userByLogin->getPassword() == $password),
            "message"=> ($userByLogin->getPassword() == $password) ? "DONE" : "Login Failed",
        );
    }
}