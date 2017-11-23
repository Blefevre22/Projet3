<?php
class Article//Création de la classe Article
{
	private $ar_id;
	private $ar_titre;
	private $ar_date_ajout;
	private $ar_article;
	
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
	
	public function ar_id()
	{
		return $this->ar_id;
	}
	public function ar_titre()
	{
		return $this->ar_titre;
	}
	public function ar_date_ajout()
	{
		$date = date_create($this->ar_date_ajout);
		return date_format($date, 'd/m/Y H:i:s');
	}
	public function ar_article()
	{
		return $this->ar_article;
	}
	
	public function setAr_id($ar_id)
	{
		$this->ar_id = $ar_id;
	}
	public function setAr_titre($ar_titre)
	{
		$this->ar_titre = $ar_titre;
	}
	public function setAr_date_ajout($ar_date_ajout)
	{
		$this->ar_date_ajout = $ar_date_ajout;
	}
	public function setAr_article($ar_article)
	{
		$this->ar_article = $ar_article;
	}
}