<?php

namespace Database;

class databaseConnexion {
    private static string $user = "root";
    private static string $pass = "";
    private static string $dbName = "footclub";
    
    
    public static function connexionDatabase() {
        try {
	        $connexion = new \PDO("mysql:host=127.0.0.1;dbname=".self::$dbName.";charset=UTF8", self::$user, self::$pass);
            return $connexion;
        } catch (\Exception $exception) {
	        echo 'Erreur lors de la connexion à la base de données.<br>';
	        echo $exception->getMessage();
	        exit;
        }
    }
}

?>