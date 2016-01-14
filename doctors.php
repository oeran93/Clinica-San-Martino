<?php
require 'doctor.php';

/*
* Allows to hold multiple doctors and perform operation on multiple doctors.
* It extends the class doctor to easily access all its methods and constructor.
* This could be chang ein the future because it does not make total logical sense
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
	public function get_all_doctors(){
		$ids = $this->get_all_doctors_ids();
		foreach ($ids as $id) {
			$doctor = new Doctor($this->db);
			$doctor->get_doctor_by_id($id);
			array_push($this->doctors, $doctor);
		}
	}

	/*
	*Retrieves all doctor's ids from the db.
	* @return $ids array
	*/
	private function get_all_doctors_ids(){
		$conn = $this->db->conn;
		$ids = array();
		try{
			$query = $conn->prepare("SELECT D.ID FROM Doctors as D");
			$query->execute();
		}catch(PDOException  $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			array_push($ids, $row['ID']);
		}
		return $ids;
	}

}
?>