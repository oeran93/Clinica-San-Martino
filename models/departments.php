<?php
include_once './models/department.php';

/*
* Allows to hold multiple departments and perform operation on multiple departments.
* It extends the class department to easily access all its methods and constructor.
* This could be changed in the future because it does not make total logical sense
* for the class Departments to extend department and create instances of department.
*/
class Departments extends Department{

	public $departments = array();

	/*
	* Creates a connection to the database
	* @param DataBase $db, database object
	*/
	function __construct($db){
		parent::__construct($db);
	}

	/*
	* retrieves all departments from the database and saves them in the
	* $departments array class variable as Department objects.
	*/
	public function get_all(){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("SELECT D.Acronim, D.ID, D.Image, C.Content as Name
FROM Departments as D 
INNER JOIN Contents as C 
ON D.NameContentID = C.ID 
WHERE C.Lang = ?");
			$query->execute(array($this->db->lang));
		}catch(PDOException $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$department = new Department($this->db);
			$department->update_class($row);
			array_push($this->departments, $department);
		}	
	}

	/*
	* Gets all the departments a doctor belongs to
	* @param $id id of the doctor
	*/
	public function get_by_doctor($id){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("SELECT De.Acronim, De.ID, De.Image, C.Content as Name
FROM Departments as De 
INNER JOIN DepartmentsDoctors as DD ON De.ID = DD.DepartmentID
INNER JOIN Doctors as D ON DD.DoctorID = D.ID
INNER JOIN Contents as C 
ON De.NameContentID = C.ID 
WHERE D.ID = ? AND C.Lang = ?");
			$query->execute(array($id, $this->db->lang));
		}catch(PDOException $e){
			echo "Error: " . $e;
		}
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$department = new Department($this->db);
			$department->update_class($row);
			array_push($this->departments, $department);
		}	
	}

}
?>