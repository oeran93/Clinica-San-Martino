<?php

class ContentExtractor{

	private $file_content;

	/*
	* takes all the content of the file and stores it in the $file_content global variable
	*/
	function __construct($file_path){
		$this->file_content = $this->get_text_from_file($file_path);
	}

	/*
	* extracts text from a file.
	* @param string $path path to the file.
	* @return string content of the file, or false if something goes wrong.
	*/
	private function get_text_from_file($path){
		if(!file_exists($path)){
			return "NO FILE";
		}
	 	if($file=fopen($path,"r")){
	 		return fread($file,filesize($path));
		}
		return false;
	}

	/*
	* given the name of a xml tag it will search for it in the file and return its content
	* @param string $tag_name, name of the xml tag
	* @param string $tag_not_found, message to display if tag not found
	* @return string content of the xml tag
	*/
	public function get_section($tag_name, $tag_not_found="match not found"){
		$match_found = preg_match("/(?<=\<$tag_name\>).*(?=\<\/$tag_name\>)/s", $this->file_content,$matches);
		return $match_found ? $matches[0] : $tag_not_found;
	}

}

?>