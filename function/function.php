<?php

function getID()
{
    if (isset($_GET['id']))
    {
        return $id = $_GET['id'];
    }
    else
    {
        return $id = 1;
    }
}

function postUpdateSite()
{

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $key = $_POST['key'];
    $text = $_POST['text'];

    $post = array(
        "title" => $title,
        "description" => $desc,
        "key" => $key,
        "text" => $text,
        "#date" => "NOW()");
    return $post;
}

function request_url($name=null)
{
  $result = ''; // Пока результат пуст
  $default_port = 80; // Порт по-умолчанию
 
  // А не в защищенном-ли мы соединении?
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
    // В защищенном! Добавим протокол...
    if($name==null || $name != "get")$result .= 'https://';
    // ...и переназначим значение порта по-умолчанию
    $default_port = 443;
  } else {
    // Обычное соединение, обычный протокол
    if($name==null || $name != "get")$result .= 'http://';
  }
  // Имя сервера, напр. site.com или www.site.com
  if($name==null || $name!="get")  $result .= $_SERVER['SERVER_NAME'];
 
  // А порт у нас по-умолчанию?
  if ($_SERVER['SERVER_PORT'] != $default_port) {
    // Если нет, то добавим порт в URL
    $result .= ':'.$_SERVER['SERVER_PORT'];
  }
  // Последняя часть запроса (путь и GET-параметры).
  if($name==null || $name != "url") $result .= $_SERVER['REQUEST_URI'];
  return $result;
}
