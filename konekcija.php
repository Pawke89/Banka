<?php

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));


try { 

	$conn = new PDO('mysql: host=localhost; dbname=banka', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/*
$dsn = 'mysql:dbname='.banka.';host='.localhost.';port='.DB_PORT;
$dbh = new PDO($dsn, adminAeyqc8b , 9rJH41FXCSCe);
	*/
} catch (PDOException $e) {

	echo $e->getMessage();
	die();
	
}
/*

*/

	?>