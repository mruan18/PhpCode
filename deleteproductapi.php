<?php
include('connection.php');
error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// http://localhost/jwelstime/jwelstime_api/deleteproductapi.php?edit=
// Delete data with json api
  $editid =str_replace('%20', ' ',$_REQUEST['editid']);
  $deletequery=("UPDATE `add_product` SET `status`=0 WHERE ID='$editid'");
  // echo $fetchquery;
  $conn->query($deletequery);
  if($deletequery)
  {
    $res['status'] ="success";
    $res['message'] ="Product Deleted Successfully";
  }
  else
  {
    $res['status'] ="fail";
    $res['message'] ="Product Deleted Failed";
  }
  echo  json_encode($res);
?>