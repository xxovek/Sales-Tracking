<?php
$geolocation ='18.53328805'.','.'73.84951526';
// $request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false';
$request = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false&key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA';
$file_contents = file_get_contents($request);
$json_decode = json_decode($file_contents);
echo $json_decode->results[0]->formatted_address;

?>
