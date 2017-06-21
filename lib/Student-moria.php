<?php 


class Student extends Person implements ISavable {
    private static $tableName = 'students';
    private static $imagePrefix = 'img/students_img';
    public $id;
    public $name;
    public $phone;
    public $email;
    public $image;
    public $course;
    
   public $conn ;
  
    
    function __construct($id, $name, $phone, $email, $image, $course) {
        parent::__construct($id, $name, $phone, $email, $image);
        $this->course = $course;
        $conn = DB::getInstance()->getConnection();
        
    }

    public function save() {
        $stmt = $conn->prepare("INSERT INTO " .self::$tableName." (name, phone, email, image, course) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sisss', $this->name, $this->phone, $this->email, $this->image, $this->course);

        $stmt->execute();
    }
        
    public function edit() {
        $tableName = self::$tableName;
        $stmt = $conn->prepare("UPDATE " .self::$tableName." SET name=?, phone=?, email=?, image=?, course=? where id = ?");
        $stmt->bind_param('sisssi', $this->name, $this->phone, $this->email, $this->image, $this->course, $this->id);

        $stmt->execute();
    }
    public function delete() { 
        $stmt = $conn->prepare("DELETE FROM ".self::$tableName." where id = ?");
        $stmt->bind_param('i', $this->id);

        $stmt->execute();
    }


    private static function selectAll() {
        $result = $conn->query("SELECT * FROM " . self::$tableName . " limit 1000");
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows []= new self($row['id'], $row['name'], $row['phone'], $row['email'], $row['image'], $row['course']);
        }
        return $rows;
    }
    
    public function selectRow($id){
        $result = $conn->query("SELECT * FROM " . self::$tableName . " WHERE id = $id");
        return $result->fetch_assoc();
    }

    public static function printList() {
        $students = self::selectAll();

        for ($i=0, $count = count($students); $i < $count; $i++) { 
            include 'views/html/personListHtml.php';
        }
    }
    
    public static function printDetails($id){
//        $students = self::selectRow($id);
        include 'views/html/studentDetailsHtml.php';

        
    }
}