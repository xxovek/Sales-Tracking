<?php

require "conn.php";

$uid = $_POST["uid"];

//$selectedcountry = 'India';

$myArr = [];
$mysql_qry = "SELECT S.status,S.RouteId,S.salesManId,DATE_FORMAT(S.assignDate,'%e %M %Y') AS assignDate,S.AssignId,concat(R1.source,' to ',R1.destination) routeName,
  count(DISTINCT R2.routeDetailId) as shops FROM RouteMaster R1 LEFT JOIN salesManAssign S
  ON S.RouteId = R1.RouteId LEFT JOIN RouteDetails R2 ON R2.RouteId = R1.RouteId where S.salesManId = $uid
   AND S.assignDate = CURRENT_DATE()  GROUP BY routeName order by S.AssignId";
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
