<?php
include_once('model.php');
class adminModel extends model{
   public $db;
   function __construct(){
       require_once("Medoo/medoo.php");
       $this->db = new medoo([
    'database_type' => 'mysql',
	'database_name' => DB,
	'server' =>HOST ,
	'username' => USER,
	'password' => PASS,
	'charset' => 'utf8'
    ]);
	}
    
    public function getSaite(){
       $this->row = $this->db->select('contents','*');
       
    }
}