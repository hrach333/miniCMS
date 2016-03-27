<?php
include_once('controller.php');
class adminController extends controller{
    function __construct($model){
		
		
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
        echo $this->getTemp("index.php",array('const'=>$const));
    }
    
}