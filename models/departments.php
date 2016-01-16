<?php
include_once 'department.php';

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
	public function get_all_departments(){
		$ids = $this->get_all_departments_ids();
		foreach ($ids as $id) {
			$department = new Department($this->db);
			$department->get_department_by_id($id);
			array_push($this->departments, $department);
		}
	}

	/*
	*Retrieves all department's ids from the db.
	* @return $ids array
	*/
	private function get_all_departments_ids(){
		$conn = $this->db->conn;
		$ids = array();
		try{
			$query = $conn->prepare("SELECT D.ID FROM Departments as D");
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