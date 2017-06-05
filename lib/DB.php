<?php 


class DB {
	private static $conn;
	
	public function getConnection() {
		if (empty(static::$conn)) {
			return static::$conn = new mysqli('localhost', 'root', '', 'schooldb');
		} else {
			return static::$conn;
		}
	}

	private function __construct() {}
}