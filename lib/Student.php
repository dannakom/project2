<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Student {
	private $name;
	private $email;
	private $image;
	
	function __construct($name, $email, $image) {
		$this->$name = $$name;
		$this->email = $email;
		$this->image = $image;		
	}
}