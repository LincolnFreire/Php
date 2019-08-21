<?php
class Conexao extends PDO{
	private $con;
	public function __construct() {
		
		$host = "localhost";
		$port = "5432";
		$name = "loja";
		$user = "postgres";
		$pass = "0123";
		
		//$dns = "pgsql:host=".$host.";port=".$port.";dbname=".$name;
		try{
			$this->con = parent::__construct("pgsql:host=$host;port=$port;dbname=$name", $user,$pass);
			//$this->con->select("SET DATESTYLE TO SQL, DMY");
		}catch(PDOException $e){
			echo $e->getMessagem();
		}
	}
	
	
	public function query($query, $parametros = array()) {
		$stmt = $this->con->prepare($query);
		
		$stmt->execute($parametros);
		
		//$stmt->debugDumpParams();
		return $stmt;
	}
	
	public function select($query, $params = array()) {
		$stmt = $this->query($query, $params);
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
}



