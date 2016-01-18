<?php
include_once './models/doctor.php';

/*
* Allows to hold multiple doctors and perform operation on multiple doctors.
* It extends the class doctor to easily access all its methods and constructor.
* This could be changed in the future because it does not make total logical sense
* for the class Doctors to extend doctor and create instances of doctor.
*/
class Doctors extends Doctor{

	public $doctors = array();

	/*
	* Creates a connection to the database
	* @param DataBase $db, database object
	*/
	function __construct($db){
		parent::__construct($db);
	}

	/*
	* retrieves all doctors from the database and saves them in the
	* $doctors array class variable as Doctor objects.
	*/
	public function get_all(){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("CALL get_all_doctors(?)");
			$query->execute(array($this->db->lang));
		}catch(PDOException $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$doctor = new Doctor($this->db);
			$doctor->update_class($row);
			array_push($this->doctors, $doctor);
		}	
	}

	/*
	* retrieves all doctors in a certain department and saves them in the
	* $doctors array class variable as Doctor objects.
	* @param string $dep id of the department
	*/
	public function get_by_department($dep){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("CALL get_doctors_by_department(?,?)");
			$query->execute(array($dep,$this->db->lang));
		}catch(PDOException  $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$doctor = new Doctor($this->db);
			$doctor->update_class($row);
			array_push($this->doctors, $doctor);
		}
	}

	/*
	* retrieves all doctors in a certain ambulatory and saves them in the
	* $doctors array class variable as Doctor objects.
	* @param string $dep id of the ambulatory
	*/
	public function get_by_ambulatory($amb){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("CALL get_doctors_by_ambulatory(?,?)");
			$query->execute(array($amb,$this->db->lang));
		}catch(PDOException  $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$doctor = new Doctor($this->db);
			$doctor->update_class($row);
			array_push($this->doctors, $doctor);
		}
	}

}
?>