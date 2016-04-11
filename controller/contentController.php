<?php

include_once('controller.php');

class contentController extends controller
{

    protected $mod;
    private $array;
    private $option;
    private $id;

    function __construct($model, $id = null)
    {
        $this->mod = $model;
        $this->option = $this->getOption();
        $this->model($model);
        if ($id != null) $this->id = $id;
    }

    public function index()
    {

        if (!empty($this->id))
        {
            $this->obj->id=$this->id;
        }else{
            $this->obj->id=1;
        }
        
        $this->obj->getContent();
        $menu = $this->obj->menu();

        $this->obj->row[0]["themeurl"] = THEMEURL;
        $this->obj->row[0]["url"] = HOMEURL;
        $this->obj->row[0]["menus"] = $menu;
        //$this->debug($this->obj->row);
        echo $this->getTemp("index", $this->obj->row[0]);
    }

   

}
