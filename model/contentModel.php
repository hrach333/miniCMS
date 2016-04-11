<?php 
include_once('model.php');
	class contentModel extends model{
		public $id;
		private $model;
		function __construct($model){
			
			$this->model = $this->plural($model);
			$this->table = $this->model;
			

		}
		
//		public function setID($id){
//			$this->id = $id;
//		}
		public function getContent(){

			$this->select(array('*'), array('id'=>$this->id));
			
		}
	}
?>