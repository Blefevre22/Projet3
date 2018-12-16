<?php
class User//Création de la classe Article
{
	private $user_id;
	private $user_login;
	private $user_firstName;
	private $user_lastName;
	private $user_password;
	private $user_mail;
	private $user_registration;
	private $avatar;
	private $user_group;
	
	public function hydrate(array $data)//Hydratation de la classe par la BDD
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	public function __construct(array $data){
		$this->hydrate($data);
	}
	
	public function user_id()
	{
		return $this->user_id;
	}
	
	public function user_login()
	{
		return $this->user_login;
	}
	public function user_firstName()
	{
		return $this->user_firstName;
	}
	public function user_lastName()
	{
		return $this->user_lastName;
		}
	public function user_password()
	{
		return $this->user_password;
	}
	public function user_mail()
	{
		return $this->user_mail;
	}
	public function user_registration()
	{
		return $this->user_registration;
	}
	public function avatar()
	{
		return $this->avatar;
	}
	public function user_group()
	{
		return $this->user_group;
	}
	
	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;
	}
	public function setUser_login($user_login)
	{
		$this->user_login = $user_login;
	}
	public function setUser_firstName($user_firstName)
	{
		$this->user_firstName = $user_firstName;
	}
	public function setUser_lastName($user_lastName)
	{
		$this->user_lastName = $user_lastName;
	}
	public function setUser_password($user_password)
	{
		$this->user_password = $user_password;
	}
	public function setUser_mail($user_mail)
	{
		$this->user_mail = $user_mail;
	}
	public function setUser_registration($user_registration)
	{
		$this->user_registration = $user_registration;
	}
	public function setAvatar($avatar)
	{
		$this->avatar = $avatar;
	}
	public function setUser_group($user_group)
	{
		$this->user_group = $user_group;
	}
}