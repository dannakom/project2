<?php 

class Administrator extends Person implements ISavable {
    private static $tableName = 'administrators';
    private static $imagePrefix = 'img/administrators_img';
    public $id;
    public $name;
    public $phone;
    public $email;
    public $password;
    public $image;
    public $role;

    function __construct($id, $name, $phone, $email, $password, $image, $role) {
        parent::__construct($id, $name, $phone, $email, $image);
        
        $this->password = $password;
        $this->role = $role;
    }

     public function save() {
        $stmt = DB::getConnection()->prepare("INSERT INTO " .self::$tableName." (name, phone, email, password, image, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sisssi', $this->name, $this->phone, $this->email, password_hash($this->password, PASSWORD_DEFAULT), $this->image, $this->role);

        $stmt->execute();
    }
        
    public function edit() {
        $stmt = DB::getConnection()->prepare("UPDATE " .self::$tableName. " SET name=?, phone=?, email=?, password=?, image=?, role = ? where id = ?");
        $stmt->bind_param('sisssii', $this->name, $this->phone, $this->email, password_hash($this->password, PASSWORD_DEFAULT), $this->image, $this->role, $this->id);

        $stmt->execute();
    }
    public function delete($id) { 
        $stmt = DB::getConnection()->prepare("DELETE FROM " .self::$tableName. " where id = ?");
        $stmt->bind_param('i', $this->id);

        $stmt->execute();
    }

    private static function selectAll() {
        $result = DB::getConnection()->query("SELECT * FROM " . self::$tableName . " limit 1000");
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows []= new self($row['id'], $row['name'], $row['phone'], $row['email'], $row['password'], $row['image'], $row['role']);
        }
        return $rows;
    }
    
    public static function selectRow($id){
        $result = DB::getConnection()->query("SELECT * FROM " . self::$tableName . " WHERE id = $id");
        return $result->fetch_assoc();
    }

    public static function printList() {
        $administrators = self::selectAll();

//        $html  = '';
        for ($i=0, $count = count($administrators); $i < $count; $i++) {
            include 'views/html/personListHtml.php';
            
        }
    }
    
    public static function role($id){
        $result = DB::getConnection()->query("SELECT roles.name FROM roles JOIN " . self::$tableName . " ON roles.id = " . self::$tableName ." .role WHERE " . self::$tableName ." .id = $id");
        $role = $result->fetch_assoc();
        return $role['name'];

    }

    public static function printDetails($id){
//        $administrators = self::selectRow($id);
//       //$role = DB::getConnection()->query("SELECT roles.name FROM roles JOIN " . self::$tableName . " ON roles.id = " . self::$tableName .".role WHERE id = $id");
        $role = self::role($id);
//        
        
         include 'views/html/adminDetailsHtml.php';
        
    }
}