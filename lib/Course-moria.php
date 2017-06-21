<?php 

class Course implements ISavable {
    private static $tableName = 'courses';
    private static $imagePrefix = 'img/courses_img';
    public $id;
    public $name;
    public $description;
    public $image;
    private $students;
            
    function __construct($id, $name, $description , $image) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->students = $id?count(self::student($id)):'0';
    }

     public function save() {
        $stmt = DB::getConnection()->prepare("INSERT INTO ".self::$tableName." (name, description, image, students) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sssi', $this->name, $this->description, $this->image, $this->students);
        
        $stmt->execute();
    }
        
    public function edit() {
        $stmt = DB::getConnection()->prepare("UPDATE " . self::$tableName . " SET name=?, description = ?, image=?, students = ? where id = ?");
        $stmt->bind_param('sssii', $this->name, $this->description, $this->image, $this->students, $this->id);

        $stmt->execute();
    }
    
    public function delete() { 
        $stmt = DB::getConnection()->prepare("DELETE FROM " . self::$tableName . " where id = ?");
        $stmt->bind_param('i', $this->id);

        $stmt->execute();
    }
    
    public static function selectAll() {
        $result = DB::getConnection()->query("SELECT * FROM " . self::$tableName . " limit 1000");
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows []= new self($row['id'], $row['name'], $row['description'], $row['image'], $row['students']);
        }
        return $rows;
    }
    
    public static function selectRow($id){
        $result = DB::getConnection()->query("SELECT * FROM ".self::$tableName. " WHERE id = $id");
        //$result->bind_param('i', $id);
        return $result->fetch_assoc();
    }

    public static function printList() {
        $courses = self::selectAll();

        for ($i=0, $count = count($courses); $i < $count; $i++) { 
             include 'views/html/courseListHtml.php';
        }

    }
    
     public static function student($id){
        $result = DB::getConnection()->query("SELECT students.name FROM students JOIN " . self::$tableName . " ON students.course = " . self::$tableName ." .name WHERE " . self::$tableName ." .id = $id");
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students []= $row;
        }
        return $students;
    }
    
     public static function printDetails($id){
        
        include 'views/html/coursetDetailsHtml.php';

        
    }
    

}