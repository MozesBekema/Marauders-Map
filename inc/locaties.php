<?php 
//var_dump($_POST);
include('php_myadmin.php');
$lat = @$_POST['x'];
$lng = @$_POST['y'];
$name = @$_POST['name'];

$link = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);

if(@$_POST['name'] == "") {

}else{

$statement = $link->prepare("INSERT INTO markers(lat, lng, name, date) VALUES(:lat, :lng, :name, NOW())");
$statement->execute(array( "lat" => $lat, "lng" => $lng, "name" => $name));

}

?>
