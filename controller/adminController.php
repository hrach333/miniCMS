<?php
include_once('controller.php');

class adminController extends controller{
    function __construct($model){
		$this->mod = $model;
		$this->option = $this->getOption();
		$this->model($model);
		
	}
    private function conectTwig(){
		require_once 'Twig/autoloader.php';
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem("admin");
		return $twig = new Twig_Environment($loader);
	}
    protected function getTempl($name){
		$twig = $this->conectTwig();
		$file = $name;
		return $template = $twig->loadTemplate($file);

	}
    public function index(){
        $const["themeurl"]= THEMEURL;
        $const["url"]= HOMEURL;
        if($_GET[id]=="saite"){
            $this->obj->getSaite();
            //$this->debug($this->obj->row);
            $saite = $this->obj->row;
            echo $this->getTemp("saite.php",array('saite'=>$saite,'const'=>$const));
        }else{
            echo $this->getTemp("index.php",array('const'=>$const));
        }
        
        
    }
    
}