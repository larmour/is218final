<?php
//db connection class using singleton pattern
ob_start();
session_start();

//set timezone
date_default_timezone_set('America/New_York');

//database credentials
define('DBHOST','sql1.njit.edu');
define('DBUSER','la95');
define('DBPASS','1uPHeSMbW');
define('DBNAME','la95');

//application address
define('DIR','https://web.njit.edu/~la95/is218final/loginregister/');
define('SITEEMAIL','la95@njit.edu');

try {

	//assign PDO object to db variable
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//output error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>

