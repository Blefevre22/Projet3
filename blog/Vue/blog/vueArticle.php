<?php ob_start(); ?>
<!-- Post Content -->
<article>
  <div class="container">
	<div class="row">
	  <div class="col-lg-8 col-md-10 mx-auto">
		<h1 style='text-align:center;'> <?php echo $article->ar_titre();?></h1>
		
		<p><?php echo $article->ar_article();?></p>
		<blockquote class="blockquote">Date de publication : <?php echo $article->ar_date_ajout();?></blokquote>

	  </div>
	</div>
  </div>
</article>


<div class="container">
	<?php 
	if(isset($_SESSION['user_login'])) { 	
	?>
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<form action="index.php?action=addComment&controller=ControllerComments" id="addComment" method = "POST">
					<textarea name = 'comment' required="required" class="form-control" style="height: 200px; vertical-align: text-top;" placeholder="Taper votre message"></textarea>
					<input type="hidden" name="arId" value="<?php echo $article->ar_id(); ?>" >
					<input type="hidden" name="userId" value="<?php echo $_SESSION['user_id']; ?>" >
					<input class="form-control" type="submit">
				</form>
			</div>
		</div>
	<?php
	}
	?>
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<!-- Contenedor Principal -->
			<div class="comments-container">
				<h1>Commentaires</h1>
				<ul id="comments-list" class="comments-list">
					<?php
					if($dispayComment){
						foreach($dispayComment as $comment){
						?>
							<li>
								<div class="comment-main-level">
									<!-- Avatar -->
									<div class="comment-avatar"><img src="<?php echo $comment['avatar']; ?>" alt=""></div>
									<!-- Commentaire -->
									<div class="comment-box">
										<div class="comment-head">
											<h6><?php echo $comment['user_login']; ?><span class="comment-name by-author "><?php echo $comment['user_group']; ?></span></h6>
											<span><?php echo $comment['comment_date']; ?></span>
											<a href="index.php?action=alertComment&controller=ControllerComments&id=<?php echo $comment['comment_id'];?>">
											<?php 
											if($comment['comment_report'] == true){
												echo "<i>signalé</i></a>";
											}else{
												echo "<i class='fa fa-exclamation-triangle'></i></a>";
											}
											?>
										</div>
										<div class="comment-content">
											<?php echo $comment['com']; ?>
										</div>
									</div>
								</div>
							</li>
						<?php
						};
					}else{
						echo "Soyez le premier à ajouter un commentaire !";
					}
					?>
				</ul>
			</div>
		</div>
	</div>	
</div>
<?php $page = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>