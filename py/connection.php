<?php
/*
  define('HOST','localhost');
  define('USER','printerp_owen');
  define('PASS','2827OZ');
  define('DB','printerp_owen');
 */
global $dbhost, $dbname, $dbuser, $dbpass;

$dbhost 		= "localhost";
$dbname			= "balioffi_webim";	
$dbuser 		= "balioffi_webim";
$dbpass 		= "bali2000";

$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass ,$dbname	) or die('Unable to Connect');

date_default_timezone_set("Asia/Makassar");
  
  

?>