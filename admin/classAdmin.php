<?php

//include_once('controller.php');

class classAdmin
{

    private $const = array();
    private $id;

    function __construct()
    {
        
    }

    private function conectTwig()
    {
        require_once '../Twig/autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("../admin/tmpl/");
        return $twig = new Twig_Environment($loader);
    }

    protected function getTempl($name)
    {
        $twig = $this->conectTwig();
        $file = $name;
        return $template = $twig->loadTemplate($file);
    }

    public function getTemp($name, $array = array())
    {
        $template = $this->getTempl($name);
        return $template->render($array);
    }

    private function updateSaite()
    {
        $post = postUpdateSite();
        $id = $this->id;
        $this->obj->db->update("contents", $post, ["id" => $id]);
        $error = $this->obj->db->error();
        if (!empty($error[2]))
        {
            return $error[2];
        }
        $success = "Обнавлено";
        return $success;
    }

    private function getSaite()
    {
        if (!empty($this->id))
        {
            $id = $this->id;
            $this->obj->getSaite($id);
            $saite = $this->obj->row[0];
            //$this->debug($this->const);
            $const = $this->const;
            echo $this->getTemp("formsaite.php", array('saite' => $saite, 'const' => $const));
        }
        else
        {
            $this->obj->getSaite();
            //$this->debug($this->obj->row);
            $saites = $this->obj->row;
            echo $this->getTemp("saite.php", array('saites' => $saites, 'const' => $this->const));
        }
    }

    private function deleteSaite()
    {
        $id = filter_input(INPUT_POST, "id");
        $this->obj->db->delete("contents", ["id" => $id]);
        $this->obj->db->delete("menu", ["AND" =>
            [ "id_name" => $id,
                "type" => "saite"]
        ]);
        $error = $this->obj->db->error();
        if (empty($error[2]))
        {
            echo $id;
        }
    }

    private function get_edit_delete()
    {
        $submit = filter_input(INPUT_POST, "submit");

        if ($submit === "edit_saite")
        {
            echo $this->updateSaite();
        }
        $delete = filter_input(INPUT_POST, "delete");
        if ($delete === "delete_saite")
        {
            $this->deleteSaite();
        }
        if (isset($submit) || isset($delete))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    private function getBlog()
    {

        if (!empty($this->id))
        {
            $this->obj->getBlogs($this->id);
            $blog = $this->obj->row[0];
            //$this->debug($blogs);
            echo $this->getTemp("formblog.php", array('blog' => $blog, 'const' => $this->const));
        }
        else
        {
            $this->obj->getBlogs();
            $blogs = $this->obj->row;
            //$this->debug($blogs);
            echo $this->getTemp("blog.php", array('blogs' => $blogs, 'const' => $const));
        }
    }

    public function saite()
    {
        $this->getSaite();
    }

    public function blog()
    {
        $this->getBlog();
    }

    public function main($type)
    {
        $this->const["themeurl"] = THEMEURL;
        $this->const["url"] = HOMEURL;
        switch ($type){
        case "site":
        echo $this->getTemp("site.html", array('const' => $this->const));
        break;
        default :
            echo $this->getTemp("main.html", array('const' => $this->const));
            break;
        }
        
    }

}
