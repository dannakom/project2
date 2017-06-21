<?php 

abstract class Person {
    
    protected $id;
    protected $name;
    protected $phone;
    protected $email;
    protected $image;
    
    
        function __construct($id, $name, $phone, $email, $image) {
            $this->id = $id;
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->image = $image;
        }
    
}



