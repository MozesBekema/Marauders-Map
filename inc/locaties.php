<?php 
var_dump($_POST);
$dbhost = "localhost";
$dbname = "harrypotter";
$dbusername = "root";
$dbpassword = "";
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$link = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);



$statement = $link->prepare("INSERT INTO markers(lat, lng) VALUES(:lat, :lng)");
$statement->execute(array(
    "lat" => $lat,
    "lng" => $lng
));
?>
