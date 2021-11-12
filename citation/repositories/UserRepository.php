<?php
require_once(__DIR__."/../db/DBConnection.php");
require_once(__DIR__."/../entities/User.php");

class UserRepository
{
    public const className = 'User';
    public const selectQuery = '
        SELECT ID as id, 
            LOGIN as login,
            EMAIL as author,
            PASSWORD as date,
            CREATED_AT as createdAT  
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
            return DBConnection::executeStatement(
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
        } catch (PDOException $e) {
            if($e->errorInfo[1]==1062 ) {
                return "Username and/email already exists";
            }
            return "DB Error";
        }
    }

    public function geUserByLogin($login)
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
