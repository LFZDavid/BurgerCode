<?php

class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "davidweb_burgers";
    private static $dbUser = "davidweb_user";
    private static $dbUserPassword = "Wweendo412294$";

    private static $connection = null;
    

    public static function connect()
    {
        try
        {
            self::$connection = new PDO("mysql:host=" .self::$dbHost . ";dbname=" .self::$dbName,self::$dbUser,self::$dbUserPassword);    
        
        }
    catch(PDOException $e)
        {
        die($e->getMessage());
        }
    return self::$connection;
        
    }
    
    
    public static function disconnect()
    {
        self::$connection = null;
    }  
        
}

    
?>