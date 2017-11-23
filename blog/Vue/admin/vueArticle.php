<?php ob_start(); ?>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12 panel-warning">
			<div class="content-box-large">
			<?php
			if(isset($article)){
			?>
				<div class="panel-heading">
					<h2 class="panel-title">Modification d'un article</h2>
				</div>
				<div class="panel-body">
					<form action="index.php?action=submitModifArticle&controller=ControllerAdmin&id=<?php echo $article->ar_id();?>" method="POST">
						<input class="form-control" type="text" name = "titleArticle" value ="<?php echo $article->ar_titre();?>">
						<textarea name= "textArticle" rows="30" id="tinymce_full"><?php echo $article->ar_article();?></textarea>
						<input class="form-control" type="submit" name = "submit">
					</form>
				</div>
			<?php
			}else{
			?>
			
				<div class="panel-heading">
					<h2 class="panel-title">Création d'un article</h2>
				</div>
				<div class="panel-body">
					<form action="index.php?action=submitNewArticle&controller=ControllerAdmin" method="POST">
						<input class="form-control" type="text" name = "titleArticle" placeholder="Titre de l'article">
						<textarea name= "textArticle" rows="30" id="tinymce_full"></textarea>
						<input class="form-control" type="submit" name = "submit">
					</form>
				</div>
			<?php
			}
			?>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="Web/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
	<script src="Web/js/editors.js"></script>
</div>
<?php 
$page = ob_get_clean();
require 'gabaritAdmin.php'; 
?>