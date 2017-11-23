<?php
class Comment//Création de la classe Article
{
	private $comment_id;
	private $comment_id_user;
	private $comment_id_article;
	private $com;
	private $comment_date;
	private $comment_report;
	
	public function hydrate(array $donnees)//Hydratation de la classe par la BDD
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	public function __construct(array $donnees){
		$this->hydrate($donnees);
	}
	
	
	public function comment_id()
	{
		return $this->comment_id;
	}
	public function comment_id_user()
	{
		return $this->comment_id_user;
	}
	public function comment_id_article()
	{
		return $this->comment_id_article;
	}
	public function com()
	{
		return $this->com;
	}
	public function comment_date()
	{
		$date = date_create($this->comment_date);
		return date_format($date, 'd/m/Y H:i:s');
	}
	public function comment_report()
	{
		return $this->comment_report;
	}
	public function setComment_id($comment_id)
	{
		$this->comment_id = $comment_id;
	}
	public function setComment_id_user($comment_id_user)
	{
		$this->comment_id_user = $comment_id_user;
	}
	public function setComment_id_article($comment_id_article)
	{
		$this->comment_id_article = $comment_id_article;
	}
	public function setCom($com)
	{
		$this->com = $com;
	}
	public function setComment_date($comment_date)
	{
		$this->comment_date = $comment_date;
	}
	public function setComment_report($comment_report)
	{
		$this->comment_report = $comment_report;
	}
}