<?php

class rauter
{

    private $redirect;

    private function config()
    {

        $action = filter_input(INPUT_GET, "action");
        if ($action === null)
        {
            $action = 'index';
        }
        $this->redirect = array(
            'home' => array('class' => 'content', 'action' => $action),
            'page' => array('class' => 'page', 'action' => $action),
            'blog' => array('class' => 'blog', 'action' => $action),
            'admin' => array('class' => 'admin', 'action' => $action));
    }

    public function __construct()
    {
        require_once 'function/function.php';
        $urls = request_url("get");
        $urls = explode('/', $urls);
        $class = $urls[1];
        $this->config();
        if (array_key_exists($class, $this->redirect))
        {
            $red = $this->redirect[$class];
            if (!require_once $red['class'] . 'Controller.php')
            {
                echo 'Ошибка при подключение';
            }
            //require_once $red['class'].'Controller.php'
            $className = $red['class'] . 'Controller';

            $object = new $className($red['class']);
            $action = $red['action'];
            $object->$action();
        }
        else
        {
            //будет страницы 404.html 
            echo ' no page';
        }
    }

}
