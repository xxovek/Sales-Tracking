<?php
include '../config/connection.php';

$emailid        = $_REQUEST['emailid'];
$password       =  $_REQUEST['pwd'];
$varifycode       =  $_REQUEST['varifycode'];
$response = array();
$result_1 = mysqli_query($con, "SELECT email FROM `users` WHERE email='$emailid' and passwordreset='$varifycode';");

if(mysqli_num_rows($result_1)==1)
 {
$row = mysqli_fetch_array($result_1);
$id = $row['user_id'];

$sql = "UPDATE users SET upassword = '$password' , passwordreset='01' where email='$emailid' and passwordreset='$varifycode'";
mysqli_query($con,$sql);
$response['true'] = 'true';
}
else {
  $response['false']  = 'false';
}
mysqli_close($con);
exit(json_encode($response));
?>
