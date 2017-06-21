<?php
include '..\lib\ISavable.php';
include '..\lib\Course.php';

include '..\lib\Person.php';
include '..\lib\Student.php';
include '..\lib\DB.php';
//include 'C:\xampp\htdocs\PhpProject2\lib\Course';

$courses = Course::read();
$students = Student::read();

$html = buildList($courses, $students);

function buildList($courses, $students)
{
    
    $html="";
    $maxRows = max(count($courses), count($students));
    for ($i = 0; $i < $maxRows; $i++) {
        $html .= "<div class=\"col-sm-6\">" . buildCourseLink($courses, $i) . "</div>
              <div class=\"col-sm-6\">" . buildStudentLink($students, $i) . "</div>";
    }
    $html .= "</div></div>";
    return $html;
}
function buildStudentLink($students, $i)
{
    $link = "";
    if ($i < count($students)) {
        $link .= "<a href=\"?action=show&type=student&id={$students[$i]['id']}\">";
        $link .= "<figure><img src=\"../img/students/{$students[$i]['image']}\" width=100% height=30%>";
        $link .= "<figcaption style=color:blue;>{$students[$i]["name"]}</figcaption>";
        $link .= "<figcaption style=color:blue;>{$students[$i]["phone"]}</figcaption></a></figure><br>";
    }
    return $link;
}
function buildCourseLink($courses, $i)
{
    $link = "";
    if ($i < count($courses)) {
        $link .= "<a href=\"?action=show&type=course&id={$courses[$i]['id']}\">";
        $link .= "<figure><img src=\"../img/courses/{$courses[$i]['image']}\" width=100% height=30%>";
        $link .= "<figcaption style=color:blue;>{$courses[$i]['name']}</figcaption>";
        $link .= "<figcaption style=color:blue;>{$courses[$i]['description']}</figcaption></a></figure><br>";
    }
    return $link;
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
       <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-5"><h4>Courses</h4></div>
                        <div class="col-sm-1"><a href="?action=insert&type=course"><button type="button" class="btn">+</button></a></div>
                        <div class="col-sm-5"><h4>Students</h4></div>
                        <div class="col-sm-1"><a href="?action=insert&type=student"><button type="button" class="btn">+</button></a></div>
                        <?php buildList($courses, $students)?>
                    </body>
    
</html>
