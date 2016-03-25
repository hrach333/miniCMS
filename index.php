<?php
require_once 'controller/rauting.php';
if(isset($_GET['option'])){
	
	$url = $_GET['option'];
	$redirect = new rauting($url);

}else{
	$redirect = new rauting('home');
}
 
?>