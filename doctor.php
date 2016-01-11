<?php
/*
* Communicates with the database for every action on the Doctors table.
* Requires database.php to obtain a connection with the database.
*/

require 'database.php';

class Doctor 
{

public $id;
public $first_name;
public $last_name;
public $birthday;
public $gender;
public $image_big;
public $image_small;
public $departments = array();
private $curriculum;
public $curriculum_path;
private $db;
private $lang;

/*
* Creates a connection to the database
* @param string $lang, language of content such as curriculum.
*/
function __construct($lang='it'){
	$this->db = new DataBase;
	$this->lang = $lang;
}

/*
* retrieves all the information about a doctor given its ID
* @param int $id
*/
public function get_doctor_by_id($id){
	$conn = $this->db->conn;
	try{
		$query = $conn->prepare("SELECT * 
		                        FROM  Doctors 
		                        INNER JOIN DepartmentsDoctors ON Doctors.ID = DepartmentsDoctors.DoctorID
		                        INNER JOIN Departments ON Departments.ID = DepartmentsDoctors.DepartmentID
		                        INNER JOIN Curricula ON Doctors.ID = Curricula.DoctorID
		                        WHERE Doctors.ID=? AND Curricula.Lang=?");
		$query->execute(array($id,$this->lang));
	}catch(PDOException  $e){
		echo "Error: " . $e;
	}
	$this->update_class($query->fetch(PDO::FETCH_ASSOC));
}

/*
* retrieves all the information about a doctor given its first and last name
* @param string $first first name
* @param string $last last name
*/
public function get_doctor_by_name($first,$last){
	$conn = $this->db->conn;
	try{
		$query = $conn->prepare("SELECT * 
		                        FROM  Doctors 
		                        INNER JOIN DepartmentsDoctors ON Doctors.ID = DepartmentsDoctors.DoctorID
		                        INNER JOIN Departments ON Departments.ID = DepartmentsDoctors.DepartmentID
		                        INNER JOIN Curricula ON Doctors.ID = Curricula.DoctorID 
		                        WHERE Doctors.FirstName=? AND Doctors.LastName=? AND Curricula.Lang=?");
		$query->execute(array($first,$last,$this->lang));
	}catch(PDOException  $e){
		echo "Error: " . $e;
	}
	$this->update_class($query->fetch(PDO::FETCH_ASSOC));
}

/*
* saves the row representing a doctor in the class variables.
* @param array $doctor, associative array representing a doctor
*/
protected function update_class($doctor){
	$this->id = $doctor['ID'];
	$this->first_name = $doctor['FirstName'];
	$this->last_name = $doctor['LastName'];
	$this->birthday = $doctor['Birthday'];
	$this->gender = $doctor['Gender'];
	$this->image_big = $doctor['ImageBig'];
	$this->image_small = $doctor['ImageSmall'];
	$this->department = $doctor['Name'];
	$this->curriculum_path = $doctor['Content'];
}

/*
* extracts text from a file.
* @param string $path path to the file.
* @return string content of the file, or false if something goes wrong.
*/
private function get_text_from_file($path){
 	if($file=fopen($path,"r")){
 		return fread($file,filesize($path));
	}
	return false;
}

/*
* saves all changes made to doctor in the database.
*/
public function save(){

}

}

?>