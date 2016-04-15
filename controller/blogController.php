<?php

include_once('controller.php');

class blogController extends controller
{
    private $id;
            function __construct($model,$id=null)
    {
        $this->mod = $model;
        $this->option = $this->getOption();
        $this->model($model);
        if ($id != null) $this->id = $id;
    }

    public function index()
    {
        $id = $this->id;
        if ($id!=null)
        {
            
            $menu = $this->obj->menu();
            
            $this->obj->getBlog($id);
            //$this->debug($blog);
            $this->obj->row[0]["themeurl"] = THEMEURL;
            $this->obj->row[0]["url"] = HOMEURL;
            $this->obj->row[0]["menus"] = $menu;

            echo $this->getTemp("post", array("blog" => $this->obj->row[0]));
        }
        else
        {
            $menu = $this->obj->menu();
            $this->obj->getBlogs();

            $blog['blog'] = $this->obj->row;
            //$this->debug($blog);

            $const["themeurl"] = THEMEURL;
            $const["url"] = HOMEURL;
            $const["menus"] = $menu;
            //$this->debug( $this->obj->row);
            /*
              $blog["themeurl"]= THEMEURL;
              $blog["url"]= HOMEURL;
              $blog["menus"] = $menu;
             */
            echo $this->getTemp("blog", array("blog" => $this->obj->row, "const" => $const));
        }
    }

 

}
