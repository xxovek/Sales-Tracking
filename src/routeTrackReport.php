<?php
include '../config/connection.php';
$assignid = $_POST['assignsalesId'];
$response = [];
$sql = "SELECT S.latitude,S.longitude,S.shopid,S.address,DATE_FORMAT(S.created_at,'%d %b %y, %I:%i %p') as created_at FROM salesManAssignTransaction S WHERE S.salesAssignId = $assignid ORDER BY S.Id DESC";
if($result = mysqli_query($con,$sql)){
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'address' => $row['address'],
            'created_at' => $row['created_at'],
            'shopid' => $row['shopid']

        ]);
    }
}
}
echo json_encode($response);
?>
