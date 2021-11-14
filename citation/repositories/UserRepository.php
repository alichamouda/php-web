<?php
require_once(__DIR__."/../db/DBConnection.php");
require_once(__DIR__."/../entities/User.php");

class UserRepository
{
    public const className = 'User';
    public const selectQuery = '
        SELECT ID as id, 
            LOGIN as login,
            EMAIL as email,
            PASSWORD as password,
            CREATED_AT as createdAt  
        FROM USER ';

    private static $_instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new UserRepository();
        }
        return self::$_instance;
    }

    public function insertUser($user)
    {
        try {
            DBConnection::executeStatement(
                '
                    INSERT INTO USER 
                        (LOGIN, EMAIL, PASSWORD)
                    VALUES
                        (:login, :email, :pass) 
                ',
                array(
                    ':login' => $user->getLogin(),
                    ':email' => $user->getEmail(),
                    ':pass' => $user->getPassword()
                )
            );
            array("message" => "User created successfully", "hasError"=> false);
        } catch (PDOException $e) {
            if($e->errorInfo[1]==1062 ) {
                return array("message" => "Username and/email already exists", "hasError"=> true);
            }
            return array("message" => "DB Error", "hasError" => true) ;
        }
    }

    public function getUserByLogin($login)
    {
        $connection =  DBConnection::getConnection();
        try {
            $statement = $connection->prepare(
                UserRepository::selectQuery .
                    ' WHERE LOGIN = :login'
            );
            $statement->setFetchMode(PDO::FETCH_CLASS, UserRepository::className);
            $statement->execute(array(':login' => $login));
            return $statement->fetch();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
}
