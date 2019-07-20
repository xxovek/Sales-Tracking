<?php

require "conn.php";

// $cid = $_POST["cid"];
 $uid = $_POST["uid"];
//$uid=4;
$cid=2;

//$selectedcountry = 'India';

$myArr = [];
$mysql_qry = "SELECT fname,lname,email,contactNumber FROM users where userId = (SELECT userId FROM SalesManMaster WHERE salesManId = '$uid')
";
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
