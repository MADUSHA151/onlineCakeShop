<?php

class Database {

    public static $connection;

    public static function setUpConnection(){
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost","root","#Apeamma2001","akshi-cake-2023-05-09","3306");   // please make sure to add your personal dbms deatils and if you want remove them before commiting to the git
        }
    }

    public static function iud($q){
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q){
        Database::setUpConnection();
        $resultset =  Database::$connection->query($q);
        return $resultset;  
    }
}

?>