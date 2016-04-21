<?php
/*
* Communicates with the database for every action on the Doctors table.
* Requires database.php to obtain a connection with the database.
*/

include_once './models/database.php';

class Doctor {

	public $id;
	public $first_name;
	public $last_name;
	public $birthday;
	public $gender;
	public $image;
	public $curriculum;
	protected $db;

	/*
	* Creates a connection to the database
	* @param DataBase $db, database object
	*/
	function __construct($db){
		$this->db = $db;
	}

	/*
	* retrieves all the information about a doctor given its ID
	* @param int $id
	*/
	public function get_by_id($id){
		$conn = $this->db->conn;
		try{
			$query = $conn->prepare("
										SELECT D.ID, D.FirstName , D.LastName, D.Curriculum, D.Birthday, D.Gender, D.Image
										FROM Doctors as D
										WHERE D.ID = ? AND D.Active = 1
									");
			$query->execute(array($id));
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
		$this->image = $doctor['Image'];
		$this->curriculum = $doctor['Curriculum'];
	}

	/*
	* saves all changes made to doctor in the database.
	*/
	public function save(){

	}

}

?>