<?php
include('connection.php');
error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// http://localhost/jwelstime/jwelstime_api/addproductapi.php?productname=ring&productquality=good
// Insert data with json api
$productname =str_replace('%20', ' ',$_REQUEST['productname']);
$productquality = str_replace('%20', ' ',$_REQUEST['productquality']);
$productquantity = str_replace('%20', ' ',$_REQUEST['productquantity']);
$productdate = str_replace('%20', ' ',$_REQUEST['productdate']);
$productimage = str_replace('%20', ' ',$_REQUEST['productimage']);
$insertedby= str_replace('%20', ' ',$_REQUEST['admin']);


  $insertquery=("INSERT INTO `add_product`(`insertedby`, `productname`, `productquality`, `productquantity`, `productdate`, `productimage`) VALUES ('$insertedby','$productname','$productquality','$productquantity','$productdate','$productimage')");

  $conn->query($insertquery);
  if($insertquery)
  {
    $res['status'] ="success";
    $res['message'] ="Product Added Successfully";
  }
  else
  {
    $res['status'] ="fail";
    $res['message'] ="Product Added Failed";
  }
  echo  json_encode($res);
?>