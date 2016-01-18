<?php
include_once './models/ambulatory.php';

/*
* Allows to hold multiple ambulatories and perform operation on multiple ambulatories.
* It extends the class ambulatory to easily access all its methods and constructor.
* This could be changed in the future because it does not make total logical sense
* for the class ambulatories to extend ambulatory and create instances of ambulatory.
*/
class Ambulatories extends Ambulatory{

	public $ambulatories = array();

	/*
	* Creates a connection to the database
	* @param DataBase $db, database object
	*/
	function __construct($db){
		parent::__construct($db);
	}

	/*
	* retrieves all ambulatories from the database and saves them in the
	* $ambulatories array class variable as ambulatory objects.
	*/
	public function get_all(){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("CALL get_all_ambulatories(?)");
			$query->execute(array($this->db->lang));
		}catch(PDOException $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$ambulatory = new ambulatory($this->db);
			$ambulatory->update_class($row);
			array_push($this->ambulatories, $ambulatory);
		}	
	}

	/*
	* Gets all the ambulatories a doctor belongs to
	* @param $id id of the doctor
	*/
	public function get_by_doctor($id){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("CALL get_ambulatories_by_doctor(?,?)");
			$query->execute(array($id, $this->db->lang));
		}catch(PDOException $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$ambulatory = new ambulatorie($this->db);
			$ambulatory->update_class($row);
			array_push($this->ambulatories, $ambulatory);
		}	
	}

}
?>