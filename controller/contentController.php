<?php
include_once('controller.php');
class contentController extends controller{
	protected $mod;
	private $array;
	private $option;
	private $id;
	function __construct($model){
		$this->mod = $model;
		$this->option = $this->getOption();
		$this->model($model);
		
	}
  public function index(){
  		$this->id = getID();
  		$this->obj->setID($this->id);
     	$this->obj->getContent();
     	$this->obj->row[0]["themeurl"]= THEMEURL;
     	$this->obj->row[0]["url"]= HOMEURL;
     	echo $this->getTemp("index",$this->obj->row[0]);

	 	
}	
	

}