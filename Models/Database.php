<?php
    
    //This singleton class is used to make the connection to the database easier 
    //and to avoid multiple connections
    
    class Database
    {
        //Properties required for the connection to the database
        
        private static $userName = 'habmcs45_Diarra';    //Username
        private static $passWord = 'T}fLH[E!G}YY';        //Password
        private static $dsn = 'mysql:host=192.99.199.128; dbname=habmcs45_PHP_Project'; //Data source
        // private static $userName = 'root';    //Username
        // private static $passWord = '';        //Password
        // private static $dsn = 'mysql:host=localhost;dbname=your_wellbeing_db'; //Data source
        private static $dbcon;
        
        private function __construct()
        {
        }
        
        //Method used to make the connection
        public static function getDb(){
            
            //Only if the connection does not already exist
            if(!isset(self::$dbcon)) {
                try {
                    //Creation of PDO object to establish the connection
                    self::$dbcon = new PDO(self::$dsn, self::$userName, self::$passWord);
                    
                    //Enable error messages during the development step, not in production
                    self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    //Return the database element as PHP objects
                    self::$dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    
                    } catch (PDOException $e) {
                    $msg = $e->getMessage();
                    include 'custom-error.php';
                    exit();
                }
            }
            
            return self::$dbcon;
        }
    }
    
?>
