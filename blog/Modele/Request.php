<?php
class Request
{
	public function get($parametre)
	{
		if(isset($_POST[$parametre])){
			return $_POST[$parametre];
		}elseif(isset($_GET[$parametre])){
			return $_GET[$parametre];
		}elseif(isset($_FILES[$parametre])){
			return $_FILES[$parametre];
		}
		
	}
}