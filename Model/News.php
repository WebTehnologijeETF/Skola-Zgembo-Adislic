<?php
	class News {
		public $id = "id";
		public $header = "header";
		public $text = "text";
		public $imageUrl = "imageUrl";
		public $time = "time";
		public $author = "author";
		public $more = "more";
		public $noOfComments = "noOfComments";

		public function __construct() {
     	}
 		//map json object and prevent xss
     	public function set($data) {
        	foreach ($data AS $key => $value) 
        		$this->{$key} = htmlentities($value, ENT_QUOTES);
    	}
	}
?>