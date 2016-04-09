<?php

include_once('controller.php');

class adminController extends controller
{

    private $const=array();

    function __construct($model)
    {
        $this->mod = $model;
        $this->option = $this->getOption();
        $this->model($model);
    }

    private function conectTwig()
    {
        require_once 'Twig/autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem("admin");
        return $twig = new Twig_Environment($loader);
    }

    protected function getTempl($name)
    {
        $twig = $this->conectTwig();
        $file = $name;
        return $template = $twig->loadTemplate($file);
    }

    private function updateSaite()
    {
        $post = postUpdateSite();
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
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
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id)
        {
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
    }

    private function getBlog()
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        if ($id)
        {
            $this->obj->getBlogs($id);
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

    public function index()
    {
        $this->const["themeurl"] = THEMEURL;
        $this->const["url"] = HOMEURL;
        $type = filter_input(INPUT_GET, "type", FILTER_SANITIZE_STRING);

        if ($type == "saite")
        {
            /* @var $id индификатор для открытие одного строницы */
            $this->getSaite();
        }
        elseif ($type === "blog")
        {
            $this->getBlog();
        }
        else
        {
            // Получаем нажатую кнопку submit с типом edit_saite
            $this->get_edit_delete();
            if ($submit === null && $delete === null)
            {
                echo $this->getTemp("index.php", array('const' => $this->const));
            }
        }
    }

}
