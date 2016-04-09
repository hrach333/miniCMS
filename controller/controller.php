<?php

abstract class controller {

    protected $obj;
    public $error;
    public $info;

    function __construct() {
        /*
          if(empty($this->error)){echo '<div class="error">'.$this->error.'</dvi>'; }
          if(empty($this->info)){echo '<div class="info">'.$this->info.'</div>';}
         */
    }

    function model($model) {
        $className = $model . "Model";
        $url = "model/" . $model . "Model.php";
        include_once($url);
        $this->obj = new $className($model);
    }

    protected function debug($mass) {
        echo '<pre>';
        print_r($mass);
        echo '</pre>';
    }

    public function get_content() {
        $mass = $this->obj->set();
        $this->debug($mass);
    }

    public function getOption() {
        if (isset($_GET['option'])) {
            return $option = $_GET['option'];
        } else {
            return $option = 'home';
            $this->error = "Нет пораметра или такой страницы нет";
        }
    }

    private function conectTwig() {
        require_once 'Twig/autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("theme/" . THEME);
        return $twig = new Twig_Environment($loader);
    }

    protected function getTempl($name) {
        $twig = $this->conectTwig();
        $file = $name . ".html";
        return $template = $twig->loadTemplate($file);
        
    }

    public function getTemp($name, $array = array()) {
        $template = $this->getTempl($name);
        return $template->render($array);
    }

}


