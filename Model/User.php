<?php
	class User {
		public $id = "id";
		public $firstName = "firstName";
		public $lastName = "lastName";
		public $email = "email";
		public $role = "role";
		public $pass = "pass";

		public function __construct() {
     	}

     	public function set($data) {
        	foreach ($data AS $key => $value) 
        		$this->{$key} = htmlentities($value, ENT_QUOTES);
    	}
	}
?>