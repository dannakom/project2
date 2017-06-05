<?php 

interface ISavable {
	function save();
	function edit();
	function delete();
	public static function printList();
}