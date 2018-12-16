<?php
class ArticlesManager extends Modele
{
										//-- MISE EN PLACE DU CRUD --
	//AJOUT D'UN ARTICLE DANS LA BDD
	public function add(Article $article)
	{
		$requete = $this->db()->prepare('INSERT INTO articles(ar_titre, ar_date_ajout, ar_article) VALUES(:titre,  NOW(), :article)');
		$requete->bindValue(':titre', $article->ar_titre());
		$requete->bindValue(':article', $article->ar_article());
		$requete->execute();
	}
	
	//SUPPRESSION D'UN ARTICLE DANS LA BDD
	public function delete(Article $article)
	{
		$this->db()->exec('DELETE FROM articles WHERE ar_id = '.$article->ar_id());
	}
	
	//MISE À JOUR D'UN ARTICLE DANS LA BDD
	public function update(Article $article)
	{
		$requete = $this->db()->prepare('UPDATE articles SET ar_titre = :titre, ar_date_ajout = NOW(), ar_article = :article WHERE ar_id = :id');
		$requete->bindValue(':titre', $article->ar_titre());
		$requete->bindValue(':article', $article->ar_article());
		$requete->bindValue(':id', $article->ar_id());
		$requete->execute();
	}

												//-- REQUETES PERSONNALISÉES DANS LA BDD -- 
												
	//RECHERCHE D'UN ARTICLE DANS LA BDD
	public function get($id)
	{
		$id = (int) $id;
		$requete = $this->db()->prepare('SELECT * FROM articles WHERE ar_id =:id');
		$requete->bindValue(':id', $id, PDO::PARAM_INT);
		$requete->execute();
		if($data = $requete->fetch(PDO::FETCH_ASSOC)){
			return new Article($data);
		}
	}
	
	//RECHERCHE DANS D'UNE LISTE D'ARTICLE DANS LA BDD
	public function getPageArticle($paging)
	{
		if($paging == '1'){//Si première page d'articles
			$end = 5;
			$requete = $this->db()->prepare('SELECT * FROM articles ORDER BY ar_date_ajout DESC LIMIT :end');
			$requete->bindValue(':end', $end, PDO::PARAM_INT);
		}else { 
			$page = (int) $paging;
			$end = $page * 5;
			$start = $end - 5;
			$requete = $this->db()->prepare('SELECT * FROM articles ORDER BY ar_date_ajout DESC LIMIT :start, :end');
			$requete->bindValue(':start', $start, PDO::PARAM_INT);
			$requete->bindValue(':end', $end, PDO::PARAM_INT);
		}
		
		$requete->execute();
		$tabArticle = [];
		while ($data = $requete->fetch(PDO::FETCH_ASSOC)){
			$article = new Article($data);
			$tabArticle[] = $article;
		}
		return $tabArticle;
	}
	
	//NOMBRE D'ARTICLE DANS LA BDD POUR PAGINATION
	public function nbArticlesBdd()
	{
		$requete = $this->db()->query('SELECT COUNT(ar_id) FROM articles');
		$nbArticlesBdd = $requete->fetch();
		return $nbArticlesBdd[0];
	}
}