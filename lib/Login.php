<?php
include '../views/headerLogin.php';  
include 'DB.php';
session_start();

    if(isset($_SESSION["user_id"])){
    header("location: ../index.php");
    }
    $message="";
    
    
    if(!empty($_POST['login'])) {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $result = DB::getConnection()->query("SELECT * FROM administrators WHERE email = '{$user}' ");
        $row  = mysqli_fetch_array($result);
	if(is_array($row)) {      
            if(password_verify($pass,$row['password'])){
                $_SESSION["user_id"] = $row['id'];
                header('Location: ../index.php');
            } 
            else {
               
                       $message = "Invalid Username or Password!";
               
            }
	} 
    } 
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="../css/logInStyle.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
     
        <div class="form">
            <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
           <form class="login-form" method="post" name="Login Form">
            <input type="text" class="form-control" placeholder="username" required="" name="user"/>
            <input type="password"  class="form-control" placeholder="password" required="" name="pass"/>
            <button class="btn btn-lg btn-primary btn-block" value="Login" type="Submit" name="login">login</button>
          </form>
        </div>
    </body>
</html>