<?php
class rauting {

	private $redirect;
	private function config(){
		$this->redirect = array(
			'home'=>array('class'=>'content','action'=>'index')
			,
			'page'=>array('class'=>'page','action'=>'getPage'));
	}
	public function __construct($url){
		$red = $this->config();
		if(array_key_exists($url,$this->redirect)){
			$red = $this->redirect[$url];
			if(!require_once $red['class'].'Controller.php'){
				echo 'Ошибка при подключение';
			}
			$className = $red['class'].'Controller';
			$object = new $className($red['class']);
			$action = $red['action'];
			$object->$action();

		}else{
			echo ' no page';
		}
	}
}