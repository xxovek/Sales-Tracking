<?php
include '../config/connection.php';
session_start();
$response   = [];
$Emp_id     = $_REQUEST['routeassignid'];
$admin_id   = $_SESSION['admin_id'];
$lat        = $_REQUEST['latitude'];
$long       = $_REQUEST['longitude'];
$shop = 0;
if(isset($_REQUEST['shopid'])){
  $shopid       = $_REQUEST['shopid'];
  $shop = implode(',',$shopid);
}
$sql1 = "SELECT flag FROM salesManAssignTransaction where salesAssignId='$Emp_id' and shopid='$shop'  ORDER BY Id DESC LIMIT 1;";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($result1);
$sql2 = "SELECT shopid FROM salesManAssignTransaction where salesAssignId='$Emp_id' ORDER BY Id DESC LIMIT 1;";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($result2);

$shopid = $row2['shopid'];
$flag = $row1['flag'];

if($shop==$shopid){

}
else {
  $flag = $flag +1;

}


$sql = "INSERT INTO salesManAssignTransaction(salesAssignId,latitude,longitude,shopid,flag) VALUES ($Emp_id,'$lat','$long','$shop','$flag')";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['true'] = 'true';

}
else{

    $response['false'] = 'false';
}

mysqli_close($con);
exit(json_encode($response));
?>
