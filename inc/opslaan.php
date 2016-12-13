<?php

include("connect.php");
var_dump($_POST);


?>
    <!doctype>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Registreer</title>
        <link href="../style.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <form action="" method="POST">
            <label for="txt_name">Gebruikersnaam</label>
            <input type="text" id="txt_name" name="name" placeholder="Een name"> 
            <br/>
            <input type="submit" name="submit" value="Registreren">
            </form>
        </body>

    </html>