<?php
include '../config/connection.php';
$SalesId = $_POST['salesId'];
$response = [];
$sql = "SELECT S.assignDate,RM.source,RM.destination,SM.fname,SM.lname,S.AssignId FROM salesManAssign S
LEFT JOIN RouteMaster RM ON RM.RouteId = S.RouteId
LEFT JOIN SalesManMaster SM ON SM.salesManId = S.salesManId
WHERE S.salesManId = $SalesId ORDER BY S.assignDate DESC";
if($result = mysqli_query($con,$sql)){
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'AssignDate' => $row['assignDate'],
            'RouteName' => ucwords($row['source'].' '.$row['destination']),
            'SallerName' => ucwords($row['fname'].' '.$row['lname']),
            'assignId' => $row['AssignId']

        ]);
    }
}
}
echo json_encode($response);
?>
