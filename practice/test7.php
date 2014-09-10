<?php

$file = "test6.php";

if(file_exists($file)){
	echo "exist!";
	if(is_writable($file)){
		echo "writable";
	}
	else{
		echo "not writable";
	}

	if(is_readable($file)){
		echo "readable";
		$url ="http://google.com/";
		$text = file_get_contents($url);
		echo htmlentities($text);

	}
	else{
		echo "not readable";
	}
}else{
	echo "nothing...";
}
