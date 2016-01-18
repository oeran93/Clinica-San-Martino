<?php

include_once './models/database.php';

class Ambulatory{

	public $id;
	public $name;
	public $image;
	public $acronim;
	protected $db;

	/*
	* Creates a connection to the database
	* @param DataBase $db, database object
	*/
	function __construct($db){
		$this->db = $db;
	}

	/*
	* retrieves all the information about an ambulatory given its ID
	* @param int $id
	*/
	public function get_by_id($id){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("CALL get_ambulatory_by_id(?,?)");
			$query->execute(array($id,$this->db->lang));
		}catch(PDOException  $e){
			echo "Error: " . $e;
		}
		$this->update_class($query->fetch(PDO::FETCH_ASSOC));
	}

	/*
	* saves the row representing a ambulatory in the class variables.
	* @param array $ambulatory, associative array representing a ambulatory
	*/
	protected function update_class($ambulatory){
		$this->id = $ambulatory['ID'];
		$this->name = $ambulatory['Name'];
		$this->image = $ambulatory['Image'];
		$this->acronim = $ambulatory['Acronim'];
	}
}
?>