<?php

abstract class Modele {

	protected $db;
	
	//CONNEXION À LA BDD
	public function bdd()
	{
		$db = new PDO('mysql: host=localhost; dbname=blog; charset=utf8', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$this->setDb($db);
	}
			
	//SETTER DE LA CONNEXION À LA BDD
	public function setDb(PDO $db)
	{
		$this->db = $db;
	}
	
	//GETTER DE LA CONNEXION À LA BDD
	public function db()
	{
		$this->bdd();
		return $this->db;
	}	
}