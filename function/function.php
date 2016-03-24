<?php

function getID(){
		if(isset($_GET['id'])){
			return $id=$_GET['id'];
		}else{
			return $id=1;
		}
	}