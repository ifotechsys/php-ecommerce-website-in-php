<?php 
	date_default_timezone_set('Asia/Kolkata');
	
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'batch5_ecommerce';

	$db = new mysqli($server,$user,$password,$database);
    
	if ($db->connect_errno > 0) {
	  echo "Failed to connect to MySQL: " . $db->connect_errno; //connect_error
	}
?>