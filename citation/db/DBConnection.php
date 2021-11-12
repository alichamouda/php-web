<?php
class DBConnection {
    public const DB_NAME = "QUOTE_DB";
    private static $_instance = null;
    private function __construct() {  
    }

    public static function getConnection() {
        $DB_USERNAME = "QUOTE_USER";
        $DB_PASSWORD = "QUOTE0000";
        $DB_HOSTNAME = "quote-db";
      if(is_null(self::$_instance)) {
        self::$_instance = new PDO(
            "mysql:host=$DB_HOSTNAME;dbname=".DBConnection::DB_NAME,
            $DB_USERNAME,
            $DB_PASSWORD,
            array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
      }
  
      return self::$_instance;
    }
    public static function closeConnection() {
      self::$_instance = NULL;
    }

    public static function executeStatement($query, $parameters) {
     $connection = DBConnection::getConnection();
     $stmt = $connection->prepare($query);
     return $stmt->execute($parameters);
    }
}
