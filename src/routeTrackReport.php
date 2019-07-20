<?php 
include '../config/connection.php';
$assignid = 53;//$_POST['salesId'];
$response = [];
$sql = "SELECT S.latitude,S.longitude,S.shopid FROM salesManAssignTransaction S WHERE S.salesAssignId = $assignid ORDER BY S.Id DESC";
if($result = mysqli_query($con,$sql)){
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'shopid' => $row['shopid']
           
        ]);
    }
}
}
echo json_encode($response);
?>