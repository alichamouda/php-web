<?php 
require_once( __DIR__."/../entities/User.php");


function insertUser(
    $connection,
    $user
) {
    try {
        $statement = $connection->
            prepare('
                INSERT INTO USER 
                    (LOGIN, EMAIL, PASSWORD)
                VALUES
                    (:login, :email, :pass) 
            ');
        $rs = $statement->execute(
            array(
                ':login'=> $user->getLogin(),
                ':email'=> $user->getEmail(),
                ':pass'=> $user->getPassword()));
                echo "coucou";
        return $rs;

    }catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return false;
    }catch(Exception $ep){
        die("error: $ep");
        return $ep;
    }
    echo "ghio";
}