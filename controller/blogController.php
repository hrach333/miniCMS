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
		//$this->debug($blog);
        $this->obj->row[0]["themeurl"]= THEMEURL;
        $this->obj->row[0]["url"]= HOMEURL;
        $this->obj->row[0]["menus"] = $menu; 
     	
     	echo $this->getTemp("post",array("blog"=>$this->obj->row[0]));


     	}else{
     	$menu = $this->obj->menu();
		$this->obj->getBlogs();
		
		$blog['blog'] = $this->obj->row;
		//$this->debug($blog);
        
        $const["themeurl"]= THEMEURL;
        $const["url"]= HOMEURL;
        $const["menus"] = $menu;
        //$this->debug( $this->obj->row);
        /*
		$blog["themeurl"]= THEMEURL;
     	$blog["url"]= HOMEURL;
     	$blog["menus"] = $menu;
         */
     		echo $this->getTemp("blog",array("blog"=>$this->obj->row,"const"=>$const));
     	}
     	
	}

}