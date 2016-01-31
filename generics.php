<?php
	$lang = 'it';

	/*
	* extracts text from a file.
	* @param string $path path to the file.
	* @return string content of the file, or false if something goes wrong.
	*/
	function get_text_from_file($path){
	 	if($file=fopen($path,"r")){
	 		return fread($file,filesize($path));
		}
		return false;
	}
?>