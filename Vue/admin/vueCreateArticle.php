<?php ob_start(); ?>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12 panel-warning">
			<div class="content-box-large">
				<div class="panel-heading">
					<h2 class="panel-title">Création d'un article</h2>
				</div>
				<div class="panel-body">
					<form action="index.php?action=submitArticle&controller=ControllerAdmin" method="POST">
						<input class="form-control" type="text" name = "titleArticle" placeholder="Titre de l'article">
						<textarea name= "textArticle" rows="30" id="tinymce_full"></textarea>
						<input class="form-control" type="submit" name = "submit">
					</form>
				</div>
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