<?php



session_start();
include 'DB.php';
/*
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'verifyLogin' :echo verify_Login();
        
            break;
        default :
    }
}
*/
verify_Login();

function verify_Login(){ 
     echo 'hi';
   // $user = filter_var($_POST['user'], FILTER_SANITIZE_EMAIL);
   // $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    
    $uname='orit.shalom@gmail.com';
    $conn = DB::getInstance()->getConnection();
    if ($conn->errno) {echo $conn->error; die();}

    $stmt = $conn->prepare("SELECT role_id, image, name, password FROM admins  WHERE email = ? ");
    $stmt->bind_param('s',$uname);
   // $stmt = $conn->prepare("SELECT admins.role_id as role_id, admins.image as image, admins.name as name, admins.password as password, roles.name as role FROM admins INNER JOIN roles on roles.id = admins.role_id WHERE email = ?");
   

     $stmt->execute();
     var_dump($stmt->error);
//      $stmt->store_result();
   // $stmt->store_result();
   // $stmt->get_result();
 //$res = $stmt->get_result();
   // print_r($res);
   $stmt->bind_result($role_id, $image, $name, $ret_pwd);
   $stmt->fetch();
   var_dump($name);
   
}
