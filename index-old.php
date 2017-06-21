<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FullStack Academy</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    
</head>
<body>
    <!--//change to include header--> 
     <header class="header">
        <img class="school-logo" src="img/logo.jpg" alt="school_img"/>
        <hr>
     </header> 
    <div class="loginform">
        <h1>User Login</h1>
        <div class="err" id="add_err"></div>
            <div class="form" >
                <form  action="api.php" class="login-form" method="POST" name="Login Form">
                 <input type="text" class="form-control" value="Elvis@gmail.com" required name="user" id="user"/>
                 <input type="password"  class="form-control" value="1" required name="pass" id="pass"/>
                <button type="Submit" id="login" name="login">Login</button>  
               </form>
            </div>
        </div>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>

