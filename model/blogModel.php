<?php
include_once('model.php');
class blogModel extends model{
	public $id;
	private $model;
		function __construct($model){
			
			$this->model = $this->plural($model);
			$this->table = $this->model;
			

		}
		public function getBlogs(){
			$limit = '0 , 5';
			$this->select(array('*'),null,$limit);
			
		}
		public function getBlog($id){
			
			$this->select(array('date','title','text'),array('id'=>$id));
		}
}