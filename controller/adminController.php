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
        if($_GET['type']=="saite"){
            
            if(isset($_GET['id'])){
                $this->obj->getSaite($_GET['id']);
                $saite = $this->obj->row[0];
               //$this->debug($this->obj->row);
                echo $this->getTemp("formsaite.php",array('saite'=>$saite,'const'=>$const));
            }else{
                $this->obj->getSaite();
                //$this->debug($this->obj->row);
                $saites = $this->obj->row;
                echo $this->getTemp("saite.php",array('saites'=>$saites,'const'=>$const));
            }
            
        }else{
            if(isset($_POST['submit'])){

                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $key = $_POST['key'];
                $text = $_POST['text'];
                $id = $_POST['id'];
                 $this->obj->db->update("contents",[
                     "title"=>$title,
                     "description"=>$desc,
                     "key"=>$key,
                     "text"=>$text,
                     "#date"=>"NOW()"
                   ],["id"=>$id]);
                 print_r ($this->obj->db->error());
            }
            echo $this->getTemp("index.php",array('const'=>$const));
        }
        
        
    }
    
}