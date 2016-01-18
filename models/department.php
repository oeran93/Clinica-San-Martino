<?php

include_once './models/database.php';

class Department{

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
	* retrieves all the information about a department given its ID
	* @param int $id
	*/
	public function get_by_id($id){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("CALL get_department_by_id(?,?)");
			$query->execute(array($id,$this->db->lang));
		}catch(PDOException  $e){
			echo "Error: " . $e;
		}
		$this->update_class($query->fetch(PDO::FETCH_ASSOC));
	}

	/*
	* saves the row representing a department in the class variables.
	* @param array $department, associative array representing a department
	*/
	protected function update_class($department){
		$this->id = $department['ID'];
		$this->name = $department['Name'];
		$this->image = $department['Image'];
		$this->acronim = $department['Acronim'];
	}
}
?>