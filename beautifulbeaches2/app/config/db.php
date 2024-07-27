<?php
class DBConnection {
    private static $conn;

    static function getConnection(){
        if(!isset($conn)){
            try {
                self::$conn = new PDO("mysql:host=localhost:3306; dbname=beautiful_beaches", "root","");
                self::$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e){
                echo "get connection error".$e->getMessage();
            }
        }
        return self::$conn;
    }
}

?>