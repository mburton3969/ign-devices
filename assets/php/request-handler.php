<?php
header('Content-Type: application/json');
error_reporting(0);
include 'connection.php';

//Load Variables...
$device_category = $_REQUEST['device_category'];
$device_brand = $_REQUEST['device_brand'];
$device_model = $_REQUEST['device_model'];
$device_condition = $_REQUEST['device_condition'];
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$street_address = $_REQUEST['street_address'];
$street_address_2 = $_REQUEST['street_address_2'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$zip = $_REQUEST['zip'];
$phone = $_REQUEST['phone'];
$alt_phone = $_REQUEST['alt_phone'];


#Main Functions...
$q = "INSERT INTO `device_donation_requests`
      (
      
      )
      VALUES
      (
      
      )";


//Setup Response Output...
$response = json_encode($x,JSON_PRETTY_PRINT);
echo $response;