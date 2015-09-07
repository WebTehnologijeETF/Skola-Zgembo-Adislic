<?php
	class Comment {
		public $id = "id";
		public $newsid = "newsid";
		public $text = "text";
		public $email = "email";
		public $visitor = "visitor";
		public $time = "time";

		public function __construct() {
     	}
 		//map json object and prevent xss
     	public function set($data) {
        	foreach ($data AS $key => $value) 
        		$this->{$key} = htmlentities($value, ENT_QUOTES);
    	}
	}
?>