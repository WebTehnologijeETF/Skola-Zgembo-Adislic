<?php
	include './../Model/News.php';

	$files = glob("./../News/*.txt");
	$news = [];
    foreach($files as $file) {
        $handle = fopen($file, "r");
        if($handle) {
        	$i=0;
        	$moreText = false;
        	$item = new News();
        	$item->text = "";
        	$item->more = "";
        	while (($line = fgets($handle)) !== false) {
		        if($i === 0) {
		        	$item->time = getStandardTimeFormat($line);
		        }
		        else if($i === 1) {
		        	$item->author = preg_replace('/\s+/', ' ', $line);
		        }
		        else if($i === 2) {
		        	$item->header = $line;
		        }
		        else if($i === 3 && $line !== "") {
	        		$item->imageUrl = $line;
		        }
		        else if($line === "--\r\n" ) {
		        	$moreText = true;
		        }
		        else if($moreText === false && $line !== "--") {
		        	$item->text .= $line;
		        }
		        else if($moreText === true) {
		        	$item->more .= $line;
		        }
		        $i++;
		    }
		    array_push($news, $item);
		    fclose($handle);
		   
        }
    }

    function getStandardTimeFormat($val) {
    	return substr($val, 3, 10) . ' ' . substr($val, 14, 9);
    }

    function sortFunction($a, $b) {
    	$v1 = strtotime($a->time);
    	$v2 = strtotime($b->time);

    	if($v1 == $v2) 
    		return 0;

    	return $v1 > $v2 ? -1 : 1;
    }

    usort($news, "sortFunction");

    echo json_encode($news);
?>