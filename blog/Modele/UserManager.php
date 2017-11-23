<?php
class UserManager extends Modele
{
												//-- MISE EN PLACE DU CRUD --
												//AJOUT D'UN UTILISATEUR DANS LA BDD
	public function add(User $user)
	{
		if(isset($user->avatar()[0]["name"])){
			$contentDir = "Web/pictures/avatar/";
			$avatarName = $user->user_login().'-'.$user->avatar()[0]['name'];
			move_uploaded_file ($user->avatar()[0]["tmp_name"] , $contentDir.$avatarName);
			$user->setAvatar($contentDir.$avatarName);
		}
		$mdp = sha1($user->user_password());
		$requete = $this->db()->prepare('INSERT INTO users(user_login, user_firstName, user_lastName, user_password, user_mail, user_registration, avatar, user_group) VALUES(:pseudo, :first_name, :last_name, :password, :mail, Now(), :avatar, :group)');
		$requete->bindValue(':pseudo', $user->user_login());
		$requete->bindValue(':first_name', $user->user_firstName());
		$requete->bindValue(':last_name', $user->user_lastName());
		$requete->bindValue(':password', $mdp);
		$requete->bindValue(':mail', $user->user_mail());
		$requete->bindValue(':avatar', $user->avatar());
		$requete->bindValue(':group', $user->user_group());
		$requete->execute();
		
	}
	
	public function read(User $user)
	{
		$requete = $this->db()->prepare('SELECT * FROM users WHERE user_id = :id');
		$requete->bindValue(':id', $user->user_id());
		$requete->execute();
		$data = $requete->fetch(PDO::FETCH_ASSOC);
		if($data){
			return new User($data);
		}
	}
	//SUPPRESSION D'UN UTILISATEUR DANS LA BDD
	public function delete(User $user)
	{
		$id = (int) $user->user_id();
		$requete = 'DELETE FROM users WHERE user_id = '.$id;
		$this->db()->exec($requete);
	}
	
	//MISE À JOUR D'UN UTILISATEUR DANS LA BDD
	public function update(User $user)
	{
		if(!empty($user->avatar()["tmp_name"])){
			$contentDir = "Web/pictures/avatar/";
			$avatarName = $user->user_login().'-'.$user->avatar()['name'];
			move_uploaded_file ($user->avatar()["tmp_name"] , $contentDir.$avatarName);
			$user->setAvatar($contentDir.$avatarName);
			
		}
		$currentPassword = $this->searchPassword($user->user_id());
		if($currentPassword != $user->user_password()){
			$mdp = sha1($user->user_password());
		}else{
			$mdp = $user->user_password();
		}
		$requete = $this->db()->prepare('UPDATE users SET user_login = :pseudo, user_firstName = :first_name, user_lastName = :last_name, user_password = :password, user_mail = :mail, avatar = :avatar, user_group = :group WHERE user_id = :id');
		$requete->bindValue(':id', $user->user_id());
		$requete->bindValue(':pseudo', $user->user_login());
		$requete->bindValue(':first_name', $user->user_firstName());
		$requete->bindValue(':last_name', $user->user_lastName());
		$requete->bindValue(':password', $mdp);
		$requete->bindValue(':mail', $user->user_mail());
		$requete->bindValue(':avatar', $user->avatar());
		$requete->bindValue(':group', $user->user_group());
		$requete->execute();
	}
	
												//-- REQUETES PERSONNALISÉES DANS LA BDD -- 
												
	//RECHERCHE D'UN UTILISATEUR DANS LA BDD
	public function connexion($login, $password)
	{
		$mdp = sha1($password);
		$requete = $this->db()->prepare('SELECT * FROM users WHERE user_login =:login AND user_password = :password');
		$requete->bindValue(':login', $login);
		$requete->bindValue(':password', $mdp);
		$requete->execute();
		$data = $requete->fetch(PDO::FETCH_ASSOC);
		if($data){
			return new User($data);
		}
	}
	public function listUsers()
	{
		$tabUsers = [];
		$requete = $this->db()->query('SELECT * FROM users ORDER BY user_login');
		$requete->execute();
		while($data = $requete->fetch(PDO::FETCH_ASSOC)){
			$user = new User($data);
			array_push($tabUsers, $user);
		}
		return $tabUsers;
	}
	public function searchByEmail(User $user)
	{
		if(!empty($user->user_login())){
			$requete = $this->db()->prepare('SELECT * FROM users WHERE user_mail = :mail OR user_login = :login');
			$requete->bindValue(':mail', $user->user_mail());
			$requete->bindValue(':login', $user->user_login());
		}else{
			$requete = $this->db()->prepare('SELECT * FROM users WHERE user_mail = :mail');
			$requete->bindValue(':mail', $user->user_mail());
		}
		$requete->execute();
		$data = $requete->fetch(PDO::FETCH_ASSOC);
		if($data){
			return new User($data);
		}
	}
	public function searchPassword($id)
	{
		$requete = $this->db()->prepare('SELECT user_password FROM users WHERE user_id = :id');
		$requete->bindValue(':id', $id);
		$requete->execute();
		$password = $requete->fetch();
		return $password[0];
	}
}