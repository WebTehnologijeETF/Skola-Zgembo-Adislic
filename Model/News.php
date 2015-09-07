<?php
	class News {
		public $header = "header";
		public $text = "text";
		public $imageUrl = "imageUrl";
		public $time = "time";
		public $author = "author";
		public $more = "more";

		public function __construct() {
     	}

     	public function getJsonData() {
     		return get_object_vars($this);
     	}
	}
?>