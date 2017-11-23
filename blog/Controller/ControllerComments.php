<?php
class ControllerComments
{
	//Méthode d'ajout de commentaire
	public function addComment(Request $request)
	{
		$manager = new CommentsManager();
		$data =['comment_id_user' => $request->get('userId'), 'comment_id_article' => $request->get('arId'), 'com' => $request->get('comment')];
		$comment = new Comment($data);
		$manager->create($comment);
		header('Location:index.php?action=article&controller=Controller&id='.$request->get('arId'));
	}
	//Méthode de validation d'un commentaire signalé
	public function validComment(Request $request)
	{
		$id = (int)$id;
		$manager = new CommentsManager();
		$comment = $manager->read($request->get('id'));
		$comment->setComment_report('0');
		$manager->update($comment);
		header('Location:index.php?action=admin&controller=ControllerAdmin');
	}
	//Méthode de signalisation d'un commentaire
	public function alertComment(Request $request)
	{
		$id = (int)$id;
		$manager = new CommentsManager();
		$comment = $manager->read($request->get('id'));
		$comment->setComment_report('1');
		$manager->update($comment);
		header('Location:index.php?action=article&controller=Controller&id='.$comment->comment_id_article());
	}
	//Méthode de recherche de commentaires
	public function searchComments($id_page)
	{
		$manager = new CommentsManager();
		$comments = $manager->CommentsPage($id_page);
		return $comments;
	}
	//Méthode de supprésion d'un commentaire
	public function removeCom(Request $request)
	{
		$manager = new CommentsManager();
		$manager->delete($request->get('id'));
		header("Location:index.php?action=admin&controller=ControllerAdmin");
	}
}

