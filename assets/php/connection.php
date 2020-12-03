<?php
session_start();

if($_SERVER['HTTP_HOST'] == 'sandbox-devices.ignition633.org'){
	error_reporting(E_ALL);
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'root';
	$db_db = 'mburton9_ign633';
}else{
	error_reporting(0);
	$db_host = 'localhost';
	$db_user = 'ignition_ign633';
	$db_pass = 'nObi%Lzvo#Fl';
	$db_db = 'ignition_ign633';
}

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_db) or die('DB Connection Error: ' . $conn->error);
