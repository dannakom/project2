
<?php


$role_name =$_SESSION["user_role"];
$img =$_SESSION["user_img"];
$name =$_SESSION["user_name"] ;
$role =$_SESSION["role"];

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/headerStyle.css"/>
        <title>School Entry Page</title>
    </head>
    <body>
        <div class="header_container">
            
            <header class="header_logo">
                <img class="school-logo" src="img/logo.jpg" alt="school_img"/>
            </header> 
            
            <ul class="nav navbar-nav">
                <li class="headerlinks"><a href="?page=course&id=&action=">School</a></li>
                <li class="headerlinks"><a href="?page=course&id=&action=" style="<?php if($role  == 3){echo 'visibility: hidden';} ?>">Administration</a></li>
            </ul>
             <img src="<?php echo 'img/administrators_img/'.$img?>"/>
                <span >
                    <span ><?php echo $name.','.' '.$role_name?></span></br>
                    <form action = "lib/api.php" method="post">
                        <input type="submit" name="logout" value="Logout" class="logout-button r_flex_header logout">
                    </form>
                    
                </span>
            </nav>
     
        </div>
         <hr>
    </body>
</html>



