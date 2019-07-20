<?php

require "conn.php";

$uid = $_POST["uid"];

//$selectedcountry = 'India';

$myArr = [];
$mysql_qry = "SELECT shopKeeperMaster.contactPerson,shopKeeperMaster.shopKeeperId,shopKeeperMaster.contactNumber,shopKeeperMaster.contactNumber2,
shopKeeperMaster.country,shopKeeperMaster.state,shopKeeperMaster.city,shopKeeperMaster.pincode,
shopKeeperMaster.address,shopKeeperMaster.address2,shopKeeperMaster.email,shopKeeperMaster.latitude,shopKeeperMaster.longitude
FROM shopKeeperMaster,RouteMaster,RouteDetails
WHERE shopKeeperMaster.shopKeeperId = RouteDetails.shopKeeperId
AND RouteMaster.RouteId = RouteDetails.RouteId
AND RouteDetails.RouteId = '$uid'";
$result = mysqli_query($con ,$mysql_qry) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0)
{
	while ($row = mysqli_fetch_array($result)){
	$myArr[] = $row;
	// array_push($myArr,$row[0],$row[1]);
	}
	echo json_encode($myArr);
  	mysqli_free_result($result);
}
else
{

	$result = null;

}

?>
