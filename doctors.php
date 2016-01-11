<?php
	require 'doctor.php';

	class Doctors extends Doctor{

		private $db;
		public $doctors = array();

		/*
		* Creates a connection to the database
		* @param string $lang, language of content such as curriculum.
		*/
		function __construct($lang='it'){
			$this->db = new DataBase;
			$this->lang = $lang;
		}

		/*
		* retrieves all doctors from the database and saves them in the
		* $doctors array class variable as Doctor objects.
		*/
		public function get_all_doctors(){
			$conn = $this->db->conn;
			try{
				$query = $conn->prepare("SELECT * 
		                        FROM  Doctors 
		                        INNER JOIN DepartmentsDoctors ON Doctors.ID = DepartmentsDoctors.DoctorID
		                        INNER JOIN Departments ON Departments.ID = DepartmentsDoctors.DepartmentID
		                        INNER JOIN Curricula ON Doctors.ID = Curricula.DoctorID");
				$query->execute();
			}catch(PDOException  $e){
				echo "Error: " . $e;
			}
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$doctor = new Doctor;
				$doctor->update_class($row);
				array_push($this->doctors, $doctor);
			}
		}

	}
?>