<?php
include '../config/connection.php';

$emailid        =  $_REQUEST['emailid'];
$code = rand(1000, 1000000);

$response = [];
$result_1 = mysqli_query($con, "SELECT userId FROM `users` WHERE email='$emailid'");
require_once('../PHPMailer_5.2.0/class.phpmailer.php');
$sql = "UPDATE users SET passwordreset = '$code' WHERE email = '$emailid' ";
if(mysqli_num_rows($result_1)==1)
 {
$row = mysqli_fetch_array($result_1);
mysqli_query($con,$sql);

$body1= "Security Code For Password Reset: ".$code;
$subject1= "RESET Password";
$reply_to=" ";


$mail   = new PHPMailer(); // defaults to using php "mail()"

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Username = "salesman@xxovek.com";
$mail->Password = "salesman@xxovek";
$mail->Port = 587;
$mail->From = "salesman@xxovek.com";
$mail->FromName = "Xxovek Web Solution It Pvt Ltd Pune";
$mail->AddAddress($emailid);
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject =$subject1;

if($body1=="")
{
  $mail->Body    = ".";
}
else
{
$mail->Body   = $body1;
}

if(!$mail->Send()){

//   $uname     = $row[0];
  $response['success'] = false;
}
else {
  $response['success']  = true;
}
}
exit(json_encode($response));
?>
