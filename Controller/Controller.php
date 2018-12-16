<?php
class Controller
{
	//page d'accueil
	public function accueil() 
	{
		require 'Vue/blog/VueAccueil.php';
	}
	//Page des articles
	public function pageArticles(Request $request)
	{
		require_once 'Modele/ArticlesManager.php';
		$manager = new ArticlesManager();
		$articles = $manager->getPageArticle($request->get('id'));
		$nbArticlesBdd = $manager->nbArticlesBdd();
		require 'Vue/blog/VueArticles.php';
	}
	//Page de l'article
	public function article(Request $request)
	{
		$manager = new ArticlesManager();
		$article = $manager->get($request->get('id'));
		try {
			if($article == false){
				throw new Exception("Vous essayez d'afficher un article qui n'éxiste pas ou plus.");
			}else{
				$comments = new ControllerComments();
				$dispayComment = $comments->searchComments($request->get('id'));
				require 'Vue/blog/VueArticle.php';
			}
		}catch(Exception $e) {
			$msgErreur=$e->getMessage();
			$controller = new Controller();
			$controller->erreur($msgErreur);
		}

	}
	//Page de contact
	public function contact()
	{
		require 'Vue/blog/VueContact.php';
	}
	//Page de connexion
	public function connexion()
	{
		require 'Vue/blog/VueConnexion.php';
	}
	//Déconnexion de l'utilisateur
	public function deconnexion()
	{
		unset($_SESSION['user_login']);
		unset($_SESSION['user_firstName']);
		unset($_SESSION['user_lastName']);
		unset($_SESSION['user_group']);
		header("Location:index.php?action=connexion");
	}
	//Méthode d'identification de l'utilisateur
	public function identification(Request $request)
	{
		require_once 'Modele/UserManager.php';
		$manager = new UserManager();
		if(is_object($manager->connexion($request->get('login'), $request->get('password')))){
			$user = $manager->connexion($request->get('login'), $request->get('password'));
			$_SESSION['user_id'] = $user->user_id();
			$_SESSION['user_login'] = $user->user_login();
			$_SESSION['user_firstName'] = $user->user_firstName();
			$_SESSION['user_lastName'] = $user->user_lastName();
			$_SESSION['user_group'] = $user->user_group();
			header("Location:index.php");
		}else{
			$errorConnexion = "error";
			require 'Vue/blog/VueConnexion.php';
		}
		
	}
	//Page d'enregistrement d'un nouvel utilisateur
	public function registration()
	{
		require 'Vue/blog/vueRegistration.php';
	}
	//Méthode de validation d'un nouvel utilisateur
	public function submitRegistration(Request $request)
	{
		$data =[
			'user_mail' => $request->get('email'),
			'user_login' => $request->get('login')
		];
		$searchUser = new User($data);
		$manager = new UserManager();
		$searchUser = $manager->searchByEmail($searchUser);
		if(!empty($searchUser)){
			$this->registration();
		}else{
			if(empty($request->get('uploadAvatar')['name'])){
				$avatar = 'Web/pictures/avatar/default-avatar.jpg';
			}else{
				$avatar= array($request->get('uploadAvatar'));
			}
			$data =[
				'user_login' => $request->get('login'),
				'user_firstName' => $request->get('firstName'), 
				'user_lastName' => $request->get('lastName'), 
				'user_password' => $request->get('password'), 
				'user_mail' => $request->get('email'),
				'avatar' =>$avatar,
				'user_group' => "lecteur"
			];
			$user = new User($data);
			$manager->add($user);
			$managerMail = new Mail();
			$managerMail->sendMail($user, "newAccount");
			$this->accueil();
		}
	}
	//Page de demande de récupération du mot de passe
	public function forgetPassword(Request $request)
	{
		require 'Vue/blog/VueRecoveryPassword.php';
	}
	//Méthode de validation de la demande de récupération de mot de passe
	public function submitForgetPassword(Request $request)
	{
		$data = [
			"user_mail" =>$request->get('email')
		];
		$searchUser = new User($data);
		$manager = new UserManager();
		$user = $manager->searchByEmail($searchUser);
		if(isset($user)){
			$managerMail = new Mail();
			$managerMail->sendMail($user, "recoveryPassword");
			$this->accueil();
		}else{
			$this->forgetPassword();
		}
	}
	//Page de changement de mot de passe
	public function changePassword()
	{
		require 'Vue/blog/vueChangePassword.php';
	}
	//Méthode de validation du changement de mot de passe
	public function submitChangePassword(Request $request)
	{
		if(file_exists("phpmailer/".$request->get('id'))){
			$recoveryFile = fopen("phpmailer/".$request->get('id'),"r" );
			$mail = fgets($recoveryFile);
			fclose($recoveryFile);
			unlink("phpmailer/".$request->get('id'));
			$data = [
					"user_mail" =>$mail
			];
			$searchUser = new User($data);
			$manager = new UserManager();
			$user = $manager->searchByEmail($searchUser);
			$user->setUser_password($request->get('password'));
			$manager->update($user);
			$this->accueil();
		}
	}
	//Méthode d'envoi d'un mail par la page contact
	public function sendMailContact(Request $request)
	{
		$data = [
			"user_login"=>$request->get('login'),
			"user_mail"=>$request->get('mail'),
		];
		$user = new User($data);
		$managerMail = new Mail();
		$managerMail->sendMail($user, $request->get('msg') );
		$this->accueil();
	}
	//Gestion des erreurs
	public function erreur($msgErreur) 
	{
		require 'Vue/blog/vueErreur.php';
	}
}