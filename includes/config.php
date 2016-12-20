<?php

 class dbConn{
   protected static $db;
   private function __construct(){
   ob_start();
   session_start();
   //application address
   define('DIR','https://web.njit.edu/~la95/is218final/loginregister/');
   define('SITEEMAIL','la95@njit.edu');
   
   //set timezone
   date_default_timezone_set('America/New_York');
   
   try {
      //create PDO connection
     self::$db= new PDO('mysql:host=sql1.njit.edu;dbname=la95', 'la95', '1uPHeSMbW' );    
       self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } 
   catch(PDOException $e) {
      //show error
   echo '<p class="bg-danger">'.$e->getMessage().'</p>';
   exit;
   }
   }
   public static function getConnection() {
     
     //Guarantees single instance, if no connection object exists then create one.
     if (!self::$db) {
     //new connection object.
     new dbConn();
     }
      
      //return connection.
      return self::$db;
      }
      }

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$dbs = dbConn::getConnection();
$user = new User($dbs);
?>

