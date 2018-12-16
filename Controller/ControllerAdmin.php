<?php
class ControllerAdmin
{
	//Page de dashboard
	public function admin()
	{
		if($_SESSION['user_group'] == 'admin'){
			$displayReported = $this->alertComments();
			require 'Vue/admin/vueDashboard.php';
		}
	}
	//Méthode d'affichage des commentaires reportés
	public function alertComments()
	{
		if($_SESSION['user_group'] == 'admin'){
			$manager = new CommentsManager();
			$displayReported = $manager->searchReport();
			return $displayReported;
		}
	}
	//Page des commentaires reportés
	public function listAlertComments()
	{	
		if($_SESSION['user_group'] == 'admin'){
			$displayReported = $this->alertComments();
			require 'Vue/admin/vueListAlertComments.php';
		}
	}
	//Page de création d'un article
	public function createArticle()
	{
		if($_SESSION['user_group'] == 'admin'){
			require 'Vue/admin/vueArticle.php';
		}
	}
	//Méthode d'enregistrement d'un article
	public function modifArticle(Request $request)
	{
		if($_SESSION['user_group'] == 'admin'){
			$manager = new ArticlesManager();
			$article = $manager->get($request->get('id'));
			require 'Vue/admin/vueArticle.php';
		}
	}
	//Méthode de validation de modification d'un article
	public function submitModifArticle(Request $request)
	{
		if($_SESSION['user_group'] == 'admin'){
			$data =[
				'ar_id' => $request->get('id'),
				'ar_titre' => $request->get('titleArticle'),
				'ar_article' => $request->get('textArticle')
			];
			$data['ar_id'] = (int) $data['ar_id'];
			$article = new Article($data);
			$manager = new ArticlesManager();
			$manager->update($article);
			require 'Vue/admin/vueArticle.php';
		}
	}
	//Méthode de validation de création d'un article
	public function submitNewArticle(Request $request)
	{
		if($_SESSION['user_group'] == 'admin'){
			$data =[
				'ar_titre' => $request->get('titleArticle'),
				'ar_article' => $request->get('textArticle')
			];
			$article = new Article($data);
			$manager = new ArticlesManager();
			$manager->add($article);
			require 'Vue/admin/vueArticle.php';
		}
	}
	//Méthode de suppréssion d'un article
	public function deleteArticle(Request $request)
	{
		if($_SESSION['user_group'] == 'admin'){
			$data =[
				'ar_id' => $request->get('id')
			];
			$article = new Article($data);
			$managerComment = new CommentsManager();
			$managerComment->deleteAllCommentsArticle($article->ar_id());
			$managerArticle = new ArticlesManager();
			$managerArticle->delete($article);
			header('Location:index.php?action=listArticles&controller=ControllerAdmin&id=1');
		}
	}
	//Page des articles
	public function listArticles(Request $request)
	{
		if($_SESSION['user_group'] == 'admin'){
			require_once 'Modele/ArticlesManager.php';
			$manager = new ArticlesManager();
			$articles = $manager->getPageArticle($request->get('id'));
			$nbArticlesBdd = $manager->nbArticlesBdd();
			require 'Vue/admin/vueListArticles.php';
		}
	}
	//Page de management des utilisateurs
	public function manageUser()
	{
		if($_SESSION['user_group'] == 'admin'){
			$manager = new UserManager();
			$listUsers = $manager->listUsers();
			require 'Vue/admin/vueListUtilisateurs.php';
		}
	}
	//Méthode de validation des modifications utilisateurs
	public function submitUser(Request $request)
	{
		if($_SESSION['user_group'] == 'admin'){
			$data =[
				'user_id' => $request->get('id'),
				'user_login' => $request->get('login'),
				'user_firstName' => $request->get('firstName'),
				'user_lastName' => $request->get('lastName'),
				'user_password' => $request->get('password'),
				'user_mail' => $request->get('email'),
				'user_group' => $request->get('group')
			];
			if(empty($request->get('uploadAvatar')['name'])){
				$data['avatar']= $request->get('avatar');
			}else{
				$data['avatar']= $request->get('uploadAvatar');
			}
			$user = new User($data);
			$manager = new UserManager();
			$manager->update($user);
			if(empty($request->get('account'))){
				header("Location:index.php?action=manageUser&controller=ControllerAdmin");
			}else{
				header("Location:index.php?action=manageAccount&controller=ControllerAdmin");
			}
		}
	}
	//Méthode de suppréssion d'un utilisateur
	public function deleteUser(Request $request)
	{
		if($_SESSION['user_group'] == 'admin'){
			$data =['user_id' => $request->get('id')];
			$user = new User($data);
			$managerComment = new CommentsManager();
			$managerComment->deleteAllCommentsUser($user->user_id());
			$managerUser = new UserManager();
			$managerUser->delete($user);
			if(empty($request->get('account'))){
				header("Location:index.php?action=manageUser&controller=ControllerAdmin");
			}else{
				header("Location:index.php?action=deconnexion&controller=Controller");
			}
		}
	}
	//Page de gestion du compte
	public function manageAccount()
	{
		$manager = new UserManager();
		$data = ['user_id'=>$_SESSION['user_id']];
		$userData = new User($data);
		$user = $manager->read($userData);
		$_SESSION['user_login'] = $user->user_login();
		$_SESSION['user_firstName'] = $user->user_firstName();
		$_SESSION['user_lastName'] = $user->user_lastName();
		require 'Vue/admin/vueAccount.php';
	}
}

