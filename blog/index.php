<?php
session_start();
//Ajout des controleurs
require('Controller/Controller.php');
require('Controller/ControllerAdmin.php');
require('Controller/ControllerComments.php');

require('Modele/modele.php');
//Autoload des classes
function loadClass($class)
{
	require 'Modele/'.$class.'.php';
}
spl_autoload_register('loadClass');




//Redirection
try {
	if(isset($_GET['controller']) AND isset($_GET['action'])){
		if(method_exists($_GET['controller'], $_GET['action'])){
			$request = new Request();
			$manager = new $_GET['controller']();
			$manager->$_GET['action']($request);
		}else{
			throw new Exception("Une erreur est survenue, merci de charger à nouveau la page. Si le problème persiste, fermez votre fenetre et ouvrez à nouveau le site");
		}
	}else{
		$controller = new Controller();
		$controller->accueil();
	}
}catch (Exception $e) {
	$msgErreur=$e->getMessage();
	$controller = new Controller();
	$controller->erreur($msgErreur);
}