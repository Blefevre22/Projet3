<!DOCTYPE html>
	
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jean Forteroche le blog</title>

    <!-- Bootstrap core CSS -->
    <link href="Web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="Web/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="Web/css/clean-blog.css" rel="stylesheet">

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Jean Forteroche le blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageArticles&controller=Controller&id=1">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=contact&controller=Controller">Contact</a>
            </li>
			<?php
			if(isset($_SESSION['user_login'])){
				if($_SESSION['user_group'] == 'admin'){
					?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=admin&controller=ControllerAdmin">Admin</a>
					</li>
					<?php
				}else{
					?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=manageAccount&controller=ControllerAdmin">Mon compte</a>
					</li>
				<?php
				}
				?>
				<li>
					<a class="nav-link" style='color: white; font-weight: bold;' href="index.php?action=deconnexion&controller=Controller">Déconnexion</a>
				</li>
			<?php
			}else{
			?>
			<a class="nav-link" style='color: white; font-weight: bold;' href="index.php?action=connexion&controller=Controller">Connexion</a>
			<?php
			}
			?>
          </ul>
        </div>
      </div>
    </nav>
	
		<!-- Page Header -->
	<header class="masthead" style="background-image: url('Web/pictures/img/home-bg.jpg')">
	  <div class="container">
		<div class="row">
		  <div class="col-lg-8 col-md-10 mx-auto">
			<div class="site-heading">
			  <h1>Billet simple pour l'Alaska</h1>
			</div>
		  </div>
		</div>
	  </div>
	</header>
	<div class="row">
		<div class="identifiant col-lg-11 col-md-11 col-xs-11 col-ms-9">
			<?php
			if(isset($_SESSION['user_login'])){
				echo "Bonjour, ".$_SESSION['user_firstName'].' '.$_SESSION['user_lastName'];
			}
			?>
		</div>
	</div>
	
		<?php echo $page //Contenu de la page ?>
<hr>

	<!-- Footer -->
	<footer>
	  <div class="container">
		<div class="row">
		  <div class="col-lg-8 col-md-10 mx-auto">
			<ul class="list-inline text-center">
			  <li class="list-inline-item">
				<a href="#">
				  <span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
				  </span>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a href="#">
				  <span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
				  </span>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a href="#">
				  <span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-github fa-stack-1x fa-inverse"></i>
				  </span>
				</a>
			  </li>
			</ul>
		  </div>
		</div>
	  </div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="Web/vendor/jquery/jquery.min.js"></script>
	<script src="Web/vendor/popper/popper.min.js"></script>
	<script src="Web/vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="Web/js/clean-blog.min.js"></script>

	</body>

</html>