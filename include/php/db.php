<?php
define("HOST","127.0.0.1");
define("DBNAME","db1008");
define("NAME","root");
define("PASSWORD","");

$db = new MysqlDatabase(HOST,DBNAME,NAME,PASSWORD);

class MysqlDatabase{
	function __construct($host,$dbname,$name,$password){
		try{
			$this->db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8",$name,$password,array(PDO::ATTR_EMULATE_PREPARES,PDO::ERRMODE_EXCEPTION)); 
		}catch(PDOException $ex){
			echo $ex;
		}
	}
	function mq($q,$bind=array()){
		$query = $this->db->prepare($q);
		$query->execute($bind);
		return $query;
	}
	function mf($query){
		$res = $query->fetch();
		return $res;
	}
	function mfs($q,$bind=array()){
		$query = $this->mq($q,$bind);
		$res = $this->mf($query);
		return $res;
	}
	function mn($query){
		$res = $query->rowCount();
		return $res;
	}
	function mns($q,$bind=array()){
		$query = $this->mq($q,$bind);
		$res = $this->mn($query);
		return $res;
	}
	function query($type,$table,$column,$bind=array()){
		switch($type){
			case 'insert':
				$query = "insert into {$table} set ";
			break;
			case 'update':
				$query = "update {$table} set ";
			break;
			case 'delete':
				$query = "delete from {$table} where ";
			break;
		}
		$query .= $column;
		$this->mq($query,$bind);
	}
}
