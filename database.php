<?php

class DataBase{

	private $username = "clinica_db";
	private $password = "mWEQf5a4n5c2eQJx";
	private $hostname = "localhost";
	private $dbname = "clinicasmartino";
	public $conn;
	public $lang;

	function __construct($lang){
		$this->lang = $lang;
		try{
			$this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
}

}

