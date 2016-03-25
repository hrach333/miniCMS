<?php
require_once 'controller.php';
class pageController extends controller{
	public function __construct($model){
		//$this->model($model);

	}
	public function index(){
		$mass = array("conten"=>"ffgh");
		echo $this->getTemp("page",$mass);
	}
}