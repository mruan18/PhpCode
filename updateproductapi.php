<?php
include('connection.php');
error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// http://localhost/jwelstime/jwelstime_api/fetchproductapi.php?productname=ring&productquality=good
// fetch data with json api
$productname =str_replace('%20', ' ',$_REQUEST['productname']);
$productquality = str_replace('%20', ' ',$_REQUEST['productquality']);
$productquantity = str_replace('%20', ' ',$_REQUEST['productquantity']);
$productdate = str_replace('%20', ' ',$_REQUEST['productdate']);
$productimage = str_replace('%20', ' ',$_REQUEST['productimage']);
$insertedby= str_replace('%20', ' ',$_REQUEST['admin']);
$editid= str_replace('%20', ' ',$_REQUEST['editidforupdate']);

  $updatequery=("UPDATE `add_product` SET `insertedby`='$insertedby',`productname`='$productname',`productquality`='$productquality',`productquantity`='$productquantity',`productdate`='$productdate',`productimage`='$productimage' WHERE ID='$editid'");
   // echo $fetchquery;
   // die;
  $conn->query($updatequery);
  if($updatequery)
  {
    $res['status'] ="success";
    $res['message'] ="Product Updated Successfully";
  }
  else
  {
    $res['status'] ="fail";
    $res['message'] ="Product Updated Failed";
  }
  echo  json_encode($res);
?>