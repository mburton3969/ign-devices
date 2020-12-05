<?php
header('Content-Type: application/json');
error_reporting(0);
include 'connection.php';

//Load Variables...
$mode = $_REQUEST['mode'];
$category = $_REQUEST['category'];
$brand = $_REQUEST['brand'];


#Main Functions...
if($mode == 'manufacturers'){
  $q = "SELECT DISTINCT `device_brand` 
        FROM `apple_device_values` 
        WHERE `inactive` != 'Yes' 
        AND `device_category` = '" . mysqli_real_escape_string($conn,$category) . "'";
  if($g = mysqli_query($conn, $q)){
    $x->brands = [];
    while($r = mysqli_fetch_array($g)){
      array_push($x->brands, $r['device_brand']);
    }
    $x->response = 'GOOD';
  }else{
    $x->response = 'Error';
    $x->message = 'No device brands found';
  }
}

if($mode == 'models'){
  $q = "SELECT DISTINCT `device_name` 
        FROM `apple_device_values` 
        WHERE `inactive` != 'Yes' 
        AND `device_category` = '" . mysqli_real_escape_string($conn,$category) . "'
        AND `device_brand` = '" . mysqli_real_escape_string($conn,$brand) . "'";
  if($g = mysqli_query($conn, $q)){
    $x->models = [];
    while($r = mysqli_fetch_array($g)){
      array_push($x->models, $r['device_name']);
    }
    $x->response = 'GOOD';
  }else{
    $x->response = 'Error';
    $x->message = 'No device models found';
  }
}


//Setup Response Output...
$response = json_encode($x,JSON_PRETTY_PRINT);
echo $response;