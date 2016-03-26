<?php
include_once('controller.php');
class blogController extends controller{
	function __construct($model){
		$this->mod = $model;
		$this->option = $this->getOption();
		$this->model($model);
		
	}
	public function index(){
		
		$menu = $this->obj->menu();
		$this->obj->getBlogs();
		
		$blog['blog'] = $this->obj->row;
		//$this->debug($blog);
		$blog["themeurl"]= THEMEURL;
     	$blog["url"]= HOMEURL;
     	$blog["menus"] = $menu;
     	echo $this->getTemp("blog",$blog);
	}

}