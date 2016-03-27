<?php
include_once('controller.php');
class blogController extends controller{
	function __construct($model){
		$this->mod = $model;
		$this->option = $this->getOption();
		$this->model($model);
		
	}
	public function index(){
		
		
     	if(isset($_GET['id'])){
     		$menu = $this->obj->menu();
     		$id=$_GET['id'];
		$this->obj->getBlog();
		
		$blog['blog'] = $this->obj->row[0];
		//$this->debug($blog);
		$blog["themeurl"]= THEMEURL;
     	$blog["url"]= HOMEURL;
     	$blog["menus"] = $menu;
        $blog["test"] = "test";
     		echo $this->getTemp("post",$blog);


     	}else{
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

}