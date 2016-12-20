<?php 
//var_dump($_POST);
include('php_myadmin.php');
$lat = @$_POST['x'];
$lng = @$_POST['y'];
$name = @$_POST['name'];

$link = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);

if(isset($_POST['name'])){

$statement = $link->prepare("INSERT INTO markers(lat, lng, name) VALUES(:lat, :lng, :name)");
$statement->execute(array(
    "lat" => $lat,
    "lng" => $lng,
    "name" => $name
));
};


?>
