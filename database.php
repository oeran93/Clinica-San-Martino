<?php

class DataBase{

private $username = "clinica_db";
private $password = "pG63MU7VP2B74Vzw";
private $hostname = "localhost";
private $dbname = "clinicasmartino";
public $conn;

public function __construct(){
	try{
		$this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
}

}

?>