<?php
include_once '../config.php';
include_once 'classAdmin.php';
$type = filter_input(INPUT_GET, "type");
if ($type != null)
{
    $file = 'class' . $type.'.php';
    include_once $file;
}
else
{
    $type = "Home";
    $file = 'class' . $type.'.php';
    include_once $file;
}
$nameClass = 'class' . $type;
$obj = new $nameClass();
$obj->main($type);