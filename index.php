<?php
include 'lib/DB.php';
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: lib/LogIn.php");
    
    
} 

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link type="text/css" rel="stylesheet" href="css/indexStyle.css"/>
        <meta charset="UTF-8">
        <title>Hogwarts</title>
    </head>
    <body>
        <div class="body_container">
            <header>
                <?php include 'views/header.php';?>
            </header>
            <main>
             <!--?php include 'views/main.php';?-->
            </main>
        </div>
    </body>
</html>


