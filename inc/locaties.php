<?php 
$con = new PDO('mysql:host=localhost;dbname=harrypotter', "root",""); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "error: " . $e->getMessage();
    }

$latitude = $_REQUEST['txtlat']; 
$longitude = $_REQUEST['txtlang']; 
$name = $_REQUEST['txt_name']; 

 

$con->prepare( "INSERT INTO `markers` (`lat`,`lng`,`name`) VALUES (''$latitude','$longitude','$name')"); 



?>
