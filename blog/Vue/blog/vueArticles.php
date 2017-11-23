<?php ob_start(); ?>
<div class="container">
  <div class="row">
	<div class="col-lg-8 col-md-10 mx-auto">
	<!-- Main Content -->
	<?php
	
	foreach($articles as $article){
		  echo "<div class='post-preview'>
		  <a href='index.php?action=article&controller=Controller&id=".$article->ar_id()."'>
			  <h2 class='post-title'>".
				$article->ar_titre();
			  echo "</h2>
			  <h3 class='post-subtitle'>".
				substr($article->ar_article(), 0, 100).'...';
			  echo "</h3>
			</a>
			<p class='post-meta'>";
			  echo "Publié le ".$article->ar_date_ajout();
			echo "</p>
		  </div>
		  <hr>";
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
		echo "<a class='btn btn-secondary float-left' href='index.php?action=pageArticles&controller=Controller&id=".$page."'>".$page."</a>";
		$currentPage = $page * 5;
		for($i = 0; $i < 5 ; $i++){
			if($currentPage <= $nbArticlesBdd){
				$page++;
				echo "<a class='btn btn-secondary float-left' href='index.php?action=pageArticles&controller=Controller&id=".$page."'>".$page."</a>";
			}
			$currentPage += 5;
		}
		?>
	  </div>
	</div>
  </div>
</div>
<?php $page = ob_get_clean(); ?>
<?php require 'gabarit.php';?>
