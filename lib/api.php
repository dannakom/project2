    <?php 

    

    session_start();
    
include 'ISavable.php';
    include 'Person.php';
    include 'Student.php';
    include 'Course.php';
    include 'DB.php';

   // $dataObj=$_POST['dataObj'];
    
    if(!isset($_SESSION["user_id"])){
        verifyLogin($user,$pass);
    } 
    if(isset($_POST['id']) && !empty($_POST['id'])){
     $id=$_POST['id'];
    }

    if(isset($_POST['func']) && !empty($_POST['func'])) {
       // echo "func".$_POST['func'];
        $func = $_POST['func'];
        switch($func) {
            case 'getCoursesJason': echo getCoursesJason();
                break;
            case 'getStudentJason': echo getStudentJason();
                break;
            case 'getCoursesNumber': echo getCoursesNumber();
                break;
            case 'getStudentsNumber': echo getStudentsNumber();
                break;
             case 'showStudent': echo getStudent($id);
                break;
             case 'update': if(isset($_POST['dataObj']) && !empty($_POST['dataObj'])){
                                $dataObj=$_POST['dataObj'];
                                //$json = json_encode($dataObj);
                           // echo $dataObj['name'];
                              echo $dataObj[2];
                            }
     echo 'updateEdit($id, $dataObj[1],$dataObj[2], $dataObj[3])';
                break;
            default :
        }
    }
    
    function getStudent($id){
        echo $student = Student::get($id);
         
    }
    
    function getStudentsNumber(){
        echo Student::count();
       
    }
    function updateEdit($id, $name, $phone, $email){
       echo $Student::updateEdit($id, $name, $phone, $email);
       
    }
    
    
    function getCoursesNumber(){
        $courses = Course::count();
        echo $courses;   
    }
    function getCoursesJason(){
        $courses = Course::read();
        echo $courses;   
    }
    function getStudentJason(){
        $students = Student::read();
        echo $students;   
    }
    
    function  verifyLogin(){

        $user = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $conn = DB::getInstance()->getConnection();
        if ($conn->errno) {echo $conn->error; die();}
        $result = $conn->query("SELECT * FROM administrators INNER JOIN roles on roles.id = administrators.role WHERE email = '{$user}' ");

        $row  = mysqli_fetch_array($result);
       //echo("row".$row);
        if(is_array($row)){
            if(password_verify($pass,$row['password'])){
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_img"] = $row['image'];
                $_SESSION["user_name"] = $row['name'];
                $_SESSION["user_role"] = $row['role_name'];
                $_SESSION["role"] = $row['role'];
                
                header('Location: ..\index.php');
            } 
            else {
                $_SESSION["massege"]= "Invalid Password or Username";
                echo $_SESSION["massege"];
                header('Location: login.php');
            } 
        }
        else {
            $_SESSION["massege"]= "Invalid Password or Username";
            header('Location: login.php');
            echo $_SESSION["massege"];
        } 
    }
?>
