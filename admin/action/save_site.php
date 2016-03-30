<?php
if(isset($_POST['submit'])){
   require_once("../model/adminModel.php");
   $obj = new adminModel();
   $title = $_POST['title'];
   $desc = $_POST['desc'];
   $key = $_POST['key'];
   $text = $_POST['text'];
   $id = $_POST['id'];
   $obj->db->update("contents",[
                     "title"=>$title,
                     "description"=>$desc,
                     "key"=>$key,
                     "text"=>$text,
                     "#date"=>"NOW()"
   ],["id"=>$id]);
   print_r ($obj->db->error());
}
