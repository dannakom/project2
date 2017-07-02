<?php 

include 'lib/ISavable.php';
include 'lib/Person.php';
include 'lib/Student.php';
include 'lib/Course.php';
//include 'lib/Administrator.php';
include 'lib/DB.php';



session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: lib/logIn.php");
} 

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link type="text/css" rel="stylesheet" href="css/headerStyle.css"/>
        <meta ch <liarset="UTF-8">
        <title>School</title>
        <style>
            
              
		.list_container .list-item {list-style-type: none;margin-bottom: 1rem;}
		.list_container .list-item img[src] {width: 5rem;margin-right: 1rem;vertical-align: top;}
		.list_container .list-item .remove-btn {float: right;}
                
                #container {
                    position: relative;
                      display: flex; /* or inline-flex */
                    flex-flow: row wrap;
                    justify-content: space-around;
                }
                
		#lists_container {
                    position: relative;
                      display: flex; /* or inline-flex */
                    flex-flow: row wrap;
                    justify-content: space-around;
                }
		#back {
			position: absolute;
			right: 1rem;top: 0rem;
		}
	</style>
    </head>
    <body>
        <?php include 'views/header.php';?>
        
        <div id="container">
            <div id="lists_container"></div>    
            <div id="main_container"></div>
        </div>
       <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
          <script type="text/javascript" src="js/StudentForm.js"></script> 
       <script type="text/javascript" src="js/list.js"></script>
        <script type="text/javascript" src="js/item.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>


