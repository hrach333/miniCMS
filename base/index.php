<?php
require_once 'controller/rauting.php';
if(isset($_GET['option'])){
	
	$url = $_GET['option'];
	echo 'Есть Get - '.$url;
	$redirect = new rauting($url);

}else{
	echo 'no GETs';

	$redirect = new rauting('home');
}
 
?>