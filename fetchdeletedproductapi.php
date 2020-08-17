<?php
include('connection.php');
error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// http://localhost/jwelstime/jwelstime_api/fetchdeleteproductapi.php?productname=ring&productquality=good
// fetch data with json api
  $fetchquery=("SELECT * FROM `add_product` WHERE status=0");
  $rowdata=mysqli_fetch_all(mysqli_query($conn,$fetchquery),MYSQLI_ASSOC);
  foreach ($rowdata as $row) 
    {
      $data[]=array("ID"=>$row['ID'],"InsertedBy"=>$row['insertedby'],"ProductName"=>$row['productname'],"ProductQuality"=>$row['productquality'],"ProductQuantity"=>$row['productquantity'],"ProductDate"=>$row['productdate'],"ProductImage"=>$row['productimage'],"CreatedDate"=>$row['createddate'],"UpdatedDate"=>$row['updateddate'],"Status"=>$row['status']);
    }
    echo  json_encode($data);
  
?>