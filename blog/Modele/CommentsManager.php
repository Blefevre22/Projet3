<?php
class CommentsManager extends Modele
{
											//-- MISE EN PLACE DU CRUD --
	//AJOUT D'UN COMMENTAIRE DANS LA BDD
	public function create(Comment $comment)
	{
		$requete = $this->db()->prepare('INSERT INTO comments(comment_id_user, comment_id_article, com, comment_date, comment_report) VALUES(:id_user, :id_article, :com, NOW(), :report)');
		$requete->bindValue(':id_user', $comment->comment_id_user());
		$requete->bindValue(':id_article', $comment->comment_id_article());
		$requete->bindValue(':com', $comment->com());
		$requete->bindValue(':report', '0');
		$requete->execute();
	}
	
	public function read($id)
	{
		$requete = $this->db()->prepare('SELECT * FROM comments WHERE comment_id = :id');
		$requete->bindValue(':id', $id, PDO::PARAM_INT);
		$requete->execute();
		$data = $requete->fetch(PDO::FETCH_ASSOC);
		$comment = new Comment($data);
		return new Comment($data);
	}
	
	//MISE À JOUR D'UN COMMENTAIRE DANS LA BDD
	public function update(Comment $comment)
	{
		$requete = $this->db()->prepare('UPDATE comments SET comment_id_user = :user, comment_id_article = :article, com = :comment, comment_report = :comReport WHERE comment_id = :id');
		$requete->bindValue(':id', $comment->comment_id());
		$requete->bindValue(':user', $comment->comment_id_user());
		$requete->bindValue(':article', $comment->comment_id_article());
		$requete->bindValue(':comment', $comment->com());
		$requete->bindValue(':comReport', $comment->comment_report());
		$requete->execute();
	}
	
	//SUPPRESSION D'UN ARTICLE DANS LA BDD
	public function delete($id)
	{
		$id = (int) $id;
		$requete = $this->db()->prepare('DELETE FROM comments WHERE comment_id = :id');
		$requete->bindValue(':id', $id);
		$requete->execute();
	}
	
												//-- REQUETES PERSONNALISÉES DANS LA BDD -- 
	//RECHERCHE COMMENTAIRES D'UNE PAGE
	public function CommentsPage($id_page)
	{
		$requete = $this->db()->prepare('SELECT c.comment_id, c.com, c.comment_date, c.comment_report, u.user_login, u.avatar, u.user_group FROM comments as c INNER JOIN users as u ON c.comment_id_user = u.user_id WHERE c.comment_id_article = :id_page');
		$requete->bindValue(':id_page', $id_page, PDO::PARAM_INT);
		$requete->execute();
		$comment=[];
		$tabComments = [];
		
		while($data = $requete->fetch(PDO::FETCH_ASSOC)){
			$comment = $data;
			array_push($tabComments, $comment);
		}
		return $tabComments;
	}
	
	public function searchReport()
	{
		$tabReports = [];
		$report = [];
		$requete = $this->db()->query('SELECT * FROM comments as c INNER JOIN users as u ON c.comment_id_user = u.user_id WHERE c.comment_report = 1');
		while($data = $requete->fetch()){
			$report = $data;
			array_push($tabReports, $report);
		}
		return $tabReports;
	}
	public function deleteAllCommentsUser($id){
		$id = (int) $id;
		$requete = $this->db()->prepare('DELETE FROM comments WHERE comment_id_user = :id');
		$requete->bindValue(':id', $id);
		$requete->execute();
	}
	public function deleteAllCommentsArticle($id){
		$id = (int) $id;
		$requete = $this->db()->prepare('DELETE FROM comments WHERE comment_id_article = :id');
		$requete->bindValue(':id', $id);
		$requete->execute();
	}
}