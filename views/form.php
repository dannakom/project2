
<?php

    include '../lib/ISavable.php';
    include '../lib/Person.php';
    include '../lib/Student.php';
    include '../lib/Course.php';
    include '../lib/DB.php';
    
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $student = Student::get($id);
        //echo $student;
        $json = json_decode($student, true);
    }
?>

<header>
    <h1>Add Student /Edit Student Name</h1>
<!--    <button id="save_btn" type="button">Save</button>
    <button id="delete_btn" type="button">Delete</button>
    <hr>-->
</header>
<main>
      
    <form action='POST' >
        <input type='submit' id="save_btn" value='Save'>
        <button id="delete_btn" type="button" >Delete</button>
        <label>Name</label><input type="text" value="<?php echo $json['name']?>">
        <label>Phone</label><input type="text" value="<?php echo $json['phone']?>">
        <label>Email</label><input type="text" value="<?php echo $json['email']?>">
    <form>
    <figure>
         <img id="image_s" src="<?php echo 'img/'.$json['image']?>" alt=""  width="200" height="200">
    </figure>
    <div>
        <h1>Courses</h1>
    </div>
</main>

