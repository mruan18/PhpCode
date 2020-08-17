<?php
include('connection.php');
error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// http://localhost/jwelstime/jwelstime_api/loginapi.php?username=admin&&password=123
// fetch data with json api
$username =str_replace('%20', ' ',$_REQUEST['username']);
$password = str_replace('%20', ' ',$_REQUEST['password']);

$query = ("SELECT * FROM `admin_login` WHERE username='$username' && password='$password'");
$row=mysqli_fetch_array(mysqli_query($conn,$query),MYSQLI_ASSOC);
// echo $row['usertype'];
// print_r($row);
// die;
$count=count($row);

$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                     .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789!@#$%^&*()'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 10) as $k) 
	$rand .= $seed[$k];    
	//echo $rand;
// die;
if($count > 0)
{
  $updatequery=("UPDATE `admin_login` SET `access_token`='$rand' WHERE `username`='$username'");
  $conn->query($updatequery);
  $res['status'] ="success";
  $res['message'] ="Login Successfully";
  $res['username'] =$row['username'];
  $res['accesstoken']="$rand";
  $res['usertype']=$row['usertype'];
}
else{
  $res['status'] ="fail";
  $res['message'] ="Login Failed";
  $res['username'] ="Check Username or Password";
  $res['accesstoken']="Chal Bhag";
}
echo  json_encode($res);
?>