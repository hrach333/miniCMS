<?php
include_once('function/function.php');
class model {
	protected $res;
	public $table;
	public $row;
	private function conect(){
		include_once('config.php');
		try{
			return $pdo = new PDO("mysql:dbname=".DB.";host=".HOST.";charset=UTF8",USER,PASS);
		}catch(PDOException $e){
			echo "Ошибка при подключение";
		}
		
		//$this->db = mysqli_connect(HOST,USER,PASS,DB);
		//mysqli_query($this->db,"SET NAMES 'UTF8'");
	}
	function __construct(){

	}
	public function plural($word){
		$word2 = $word.'s';
		return $word2;
	}	
	public function select($array,$where=null,$limit=null){
		$pdo=$this->conect();
		$i=0;
		$query="";
		$sql = "SELECT ";
		$count = count($array);
		$w='';
		foreach ($array as $key=>$val) {
			if($i==0) {$query .= $val;
				if($val=='*'){
					break;
				}
			}
			else $query .= ", ".$val;
			$i++;
			}
		$sql .= $query." FROM `".$this->table."`";
		if($where!=null){
			
			foreach ($where as $key => $value) {
				$sql .= " WHERE `$key`=$value";
			}
			
		}
		if($limit!=null) $sql .= " LIMIT $limit";
		
		$this->res = $pdo->query($sql);
		$this->row = $this->res->fetchAll(PDO::FETCH_ASSOC);
	}
}
 ?>