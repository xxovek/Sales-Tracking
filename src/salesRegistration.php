
<?php
include '../config/connection.php';
session_start();
$response     = [];
$admin_id     = $_SESSION['admin_id'];
$fname        = $_REQUEST['firstname'];
$lname        = $_REQUEST['lastname'];
$email        = $_REQUEST['emailid'];
$spassword    = '123456';
$contactNumber       = $_REQUEST['mobileno'];
$contactNumber2       = $_REQUEST['mobileno1'];
$dob          = $_REQUEST['birthdate']  ;
$gender       = $_REQUEST['gender'];
$country      = $_REQUEST['country'];
$state        = $_REQUEST['state'];
$city         = $_REQUEST['city'];
$pincode      = $_REQUEST['salespincode'];
$address      = $_REQUEST['address'];
$address2      = $_REQUEST['address2'];
$status       = $_REQUEST['status'];
$account      = $_REQUEST['account'];
$ifsc         = $_REQUEST['ifsc'];
$branch       = $_REQUEST['branch'];
$latitude     = $_REQUEST['lat'];
$longitude    = $_REQUEST['long'];


  $ProfilePic = '../img/profiles/user.png';

$empid=$_POST['emp_id'];


function createThumbs( $pathToImages, $pathToThumbs,$file_name,$thumbWidth ){
  // open the directory
  $dir = opendir( $pathToImages );
  //$file_name="1.jpg";
// print_r($dir);
    $info = pathinfo($pathToImages . $file_name);
   if(strtolower($info['extension']) === 'jpg' || strtolower($info['extension'])==='jpeg')
   {
   $img = imagecreatefromjpeg( "{$pathToImages}{$file_name}" );
   $width = imagesx( $img );
   $height = imagesy( $img );

   $new_width = $thumbWidth;
   $new_height = floor( $height * ( $thumbWidth / $width ) );
   // create a new temporary image
   $tmp_img = imagecreatetruecolor( $new_width, $new_height );
   // copy and resize old image into new image
   imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
   // save thumbnail into a file
  imagejpeg( $tmp_img, "{$pathToThumbs}{$file_name}" );
 }


 if(strtolower($info['extension']) == 'png' )
 {
 $img = imagecreatefrompng( "{$pathToImages}{$file_name}" );
 $width = imagesx( $img );
 $height = imagesy( $img );

 $new_width = $thumbWidth;
 $new_height = floor( $height * ( $thumbWidth / $width ) );
 // create a new temporary image
 $tmp_img = imagecreatetruecolor( $new_width, $new_height );
 // copy and resize old image into new image
 imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
 // save thumbnail into a file
imagepng( $tmp_img, "{$pathToThumbs}{$file_name}" );
}

if(strtolower($info['extension']) == 'gif' )
{
$img = imagecreatefromgif( "{$pathToImages}{$file_name}" );
$width = imagesx( $img );
$height = imagesy( $img );

$new_width = $thumbWidth;
$new_height = floor( $height * ( $thumbWidth / $width ) );
// create a new temporary image
$tmp_img = imagecreatetruecolor( $new_width, $new_height );
// copy and resize old image into new image
imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
// save thumbnail into a file
imagegif( $tmp_img, "{$pathToThumbs}{$file_name}" );
}

}



if(empty($empid)){
$sqlInsert = "INSERT INTO `SalesManMaster` (`userId`, `fname`, `lname`, `email`, `spassword`, `contactNumber`,
`contactNumber2`, `profilePic`, `dob`, `Gender`, `country`, `state`, `city`, `pincode`, `address`, `address2`,
`AccountNo`, `IfscCode`, `branch`, `status`, `Latitude`, `Longitude`)";
$sqlInsert .= "VALUES ('$admin_id','$fname','$lname','$email','$spassword','$contactNumber','$contactNumber2',
 '$ProfilePic','$dob','$gender','$country','$state','$city','$pincode','$address','$address2',
  '$account','$ifsc', '$branch','$status','$latitude','$longitude')";

if(mysqli_query($con,$sqlInsert)or die(mysqli_error($con)) ){
  $SqlGetLastEntry = "SELECT salesManId FROM SalesManMaster ORDER BY salesManId DESC LIMIT 1";
  $result = mysqli_query($con,$SqlGetLastEntry)or die(mysqli_error());
  if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
    $sid = $row['salesManId'];
  }


    if(isset($_FILES["imgname"]["type"])){

    $target_dir = "../img/profiles/";
    $tumbnail_img = "../img/profiles/thums/";
    $target_file = $target_dir . basename($_FILES['imgname']["name"]);
    $original_file_name =   basename($_FILES['imgname']["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $newfilename =$admin_id."SMan".$empid.".".$imageFileType;

   // Target path where file is to be stored

      $find_prev_profile = "../img/profiles/".$admin_id."SMan".$empid.".*";
      $files = glob($find_prev_profile);
      foreach($files as $file){
        if(is_file($file)) {
          unlink($file);
        }
      }
      
      $find_prev = "../img/profiles/thumbs/".$admin_id."SMan".$empid.".*";
      $files = glob($find_prev);
      foreach($files as $file){
        if(is_file($file)) {
          unlink($file);
        }
      }
      move_uploaded_file($_FILES['imgname']['tmp_name'], $target_dir.$newfilename) ; // Moving Uploaded file
        createThumbs($target_dir,$tumbnail_img,$newfilename,100);
     
          $ProfilePic = $tumbnail_img.$newfilename;

        
          $file = $target_dir.$newfilename;
          if(file_exists($file)) {
            unlink($file);

          }
      //    unlink($target_dir.$newfilename);
      $sqlfileInsert = "INSERT INTO SalesManMaster(`profilePic`)";
      $sqlfileInsert .= "VALUES('$ProfilePic')";
      mysqli_query($con,$sqlfileInsert) or die(mysqli_error($con));


}


    $response['value'] = 'insert';

}

}

else if(!empty($empid)) {
   if(!isset($_FILES["imgname"]["type"])){
      $fetchdbimage = "SELECT profilePic from SalesManMaster WHERE salesManId = '$empid'";
       if(mysqli_query($con,$fetchdbimage)or die(mysqli_error($con)) ){
       $result = mysqli_query($con,$fetchdbimage)or die(mysqli_error($con));
       $row = mysqli_fetch_array($result);
       $ProfilePic = $row['profilePic'];
    }
  }
   else if(isset($_FILES["imgname"]["type"])){
    $target_dir = "../img/profiles/";
    $tumbnail_img = "../img/profiles/thums/";
    $target_file = $target_dir . basename($_FILES['imgname']["name"]);
    $original_file_name =   basename($_FILES['imgname']["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $newfilename=$admin_id."SMan".$empid.".".$imageFileType;


      $find_prev_profile = "../img/profiles/".$admin_id."SMan".$empid.".*";

      $files = glob($find_prev_profile);
      foreach($files as $file){
        if(is_file($file)) {
          unlink($file);
        }
      }
      move_uploaded_file($_FILES['imgname']['tmp_name'], $target_dir.$newfilename) ; // Moving Uploaded file
      createThumbs($target_dir,$tumbnail_img,$newfilename,100);

        $ProfilePic = $tumbnail_img.$newfilename; // Target path where file is to be stored
     
    //   $file = $target_dir.$newfilename;
    //   if(file_exists($file)) {
    //     unlink($file);
    //   }
     
  }
//   else{
//         $ProfilePic = '../img/profiles/user.png';
//   }

  $sqlUpdate= "UPDATE SalesManMaster SET fname='$fname',lname='$lname',email='$email',spassword ='$spassword',contactNumber='$contactNumber',contactNumber2='$contactNumber2',profilePic='$ProfilePic',
  dob='$dob',gender='$gender',address='$address',address2='$address2',country='$country',state='$state',city='$city',pincode='$pincode',AccountNo='$account',IfscCode='$ifsc',branch='$branch',
  status='$status',Latitude = '$latitude',Longitude= '$longitude' WHERE salesManId='$empid'";
    if(mysqli_query($con,$sqlUpdate)or die(mysqli_error($con)) ){
      $response['value'] = 'update';
    }
}

else
{
  $response['false'] = 'false';
}

mysqli_close($con);
exit(json_encode($response));

?>
