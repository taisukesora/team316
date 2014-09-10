<?php

define('IMAGES_DIR',dirname($_SERVER['SCRIPT_FILENAME']).'/images');
define('THUMBNAIL_DIR', dirname($_SERVER['SCRIPT_FILENAME']).'/thumbnails');

//var_dump(IMAGES_DIR);

define('THUMBNAIL_WIDTH', 72);
define('MAX_FILE_SIZE', 307200); //300KB

error_reporting(E_ALL & ~E_NOTICE);

if(!function_exists('imagecreatetruecolor')){
	echo "GDがインストールされていません";
	exit;
}