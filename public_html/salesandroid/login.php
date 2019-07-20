<?php

require "conn.php";
$user_name = $_POST["username"];
$user_pass = $_POST["password"];
// $user_name = 'neeraj@gmail.com';
// $user_pass = '123456';
$array = [];
$row = [];
$mysql_qry = "select * from SalesManMaster where email = '$user_name' and spassword = '$user_pass'";
// echo $mysql_qry;
$result = mysqli_query($con ,$mysql_qry) or die(mysqli_error($conn));

if(mysqli_num_rows($result) > 0)
{
	$row=mysqli_fetch_row($result);
	

	$myArr = array($row[0],$row[4],$row[5]);

     //print_r($myArr);

 	exit(json_encode($myArr));
   	// print_r($myJSON);

  	mysqli_free_result($result);


}
else
{
	//print_r("INVALID USERNAME AND PASSWORD");
	$result = null;

}

?>
