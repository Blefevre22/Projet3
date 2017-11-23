<?php ob_start(); ?>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12 panel-warning">
			<div class="content-box-large">
				<div class="panel-heading">
					<h2 class="panel-title">Articles publiés</h2>
				</div>
			</div>
			<?php
			foreach($articles as $article){
			?>
			<div class="row">
				<a href="index.php?action=deleteArticle&controller=ControllerAdmin&id=<?php echo $article->ar_id();?>" class="glyphicon glyphicon-remove"></a>
				<a class= "listArticles" href="index.php?action=modifArticle&controller=ControllerAdmin&id=<?php echo $article->ar_id();?>">
				<div class="content-box-large">
					<div class="row col-md-6">
						<div class="row">
							<h3><?php echo $article->ar_titre();?></h3>
						</div>
						<div class="row">
							<div class = "col-md-6"><?php echo $article->ar_date_ajout();?></div>
						</div>
					</div>
					<div class="row">
						
						<div class = "col-md-6"><?php echo substr($article->ar_article(), 0, 400)."...";?></div>
					</div>
				</div>
				</a>
			</div>
			<?php
			}
			?>
			  <!-- Pager -->
	  <div class="clearfix">
		<?php
		if(isset($_GET['nbpage'])){
			$page = $_GET['nbpage'];
			
		}else{
			$page = 1;
		}
		echo "<a class='btn btn-secondary float-left' href='index.php?action=listArticles&controller=ControllerAdmin&id=".$page."'>".$page."</a>";
		$currentPage = $page * 5;
		for($i = 0; $i < 5 ; $i++){
			if($currentPage <= $nbArticlesBdd){
				$page++;
				echo "<a class='btn btn-secondary float-left' href='index.php?action=listArticles&controller=ControllerAdmin&id=".$page."'>".$page."</a>";
			}
			$currentPage += 5;
		}
		?>
	  </div>
		</div>
	</div>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="admin/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
	<script src="admin/js/editors.js"></script>
</div>
<?php 
$page = ob_get_clean();
require 'gabaritAdmin.php'; 
?>