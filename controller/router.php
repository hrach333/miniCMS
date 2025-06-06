<?php

class router
{

//    private $redirect;
    public $allId;
    private $exception = array('home' => 'content');

    private function config()
    {

        require_once 'function/function.php';

        $url = request_url("get");
        $urls = explode('/', $url);
        $class = $urls[1];
        if (!$class)
        {
            $class = "home";
        }
        if (array_key_exists($class, $this->exception))
        {
            $class = $this->exception[$class];
        }

        $action = $urls[2];
        if (isset($urls[3]))
        {
            $int = $urls[3];
            $this->allId = $int;
        }
        $int = (int) $action;

        if (!$action || $int > 0)
        {
            $action = "index";

            $this->allId = $int;
        }
        try {
            require_once __DIR__ . '/' . $class . 'Controller.php';
        } catch (Exception $ex) {
            echo 'Ошибка при подключение';
        }
        $className = $class . 'Controller';

        $object = new $className($class, $this->allId);
        $object->$action();
//        $this->redirect = array(
//            'home' => array('class' => 'content', 'action' => $action),
//            'page' => array('class' => 'page', 'action' => $action),
//            'blog' => array('class' => 'blog', 'action' => $action),
//            'admin' => array('class' => 'admin', 'action' => $action));
    }

    public function __construct()
    {
        $this->config();
    }

}
