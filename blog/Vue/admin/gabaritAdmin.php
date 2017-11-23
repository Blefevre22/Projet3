<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Administration blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="Web/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<link href="Web/css/styles.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
				  <?php
					if($_SESSION['user_group'] == 'admin'){
						echo "<h1><a href='index.html'>Administration Blog</a></h1>";
					}else{
						echo "<h1><a href='index.html'>Gestion compte</a></h1>";
					}
					?>
	              </div>
	           </div>
	           <div class="col-md-5">

	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mon compte <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="index.php?action=manageAccount&controller=ControllerAdmin">Mon compte</a></li>
	                          <li><a href="index.php?action=deconnexion&controller=Controller">Déconnexion</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    
					<li class="current"><a href="index.php"><i class="glyphicon glyphicon-book"></i> Site</a></li>
					<?php
					if($_SESSION['user_group'] == 'admin'){
					?>
						<li class="current"><a href="index.php?action=admin&controller=ControllerAdmin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
						<li class="submenu">
							 <a href="#">
								<i class="glyphicon glyphicon-folder-open"></i>Gestion articles<span class="caret pull-right"></span>       
							 </a>
							 <!-- Sub menu -->
							 <ul>
							 <li class="dropdown">
								<li><a href="index.php?action=createArticle&controller=ControllerAdmin" >Création article</a></li>
								<li><a href="index.php?action=listArticles&controller=ControllerAdmin&id=1">Mes articles</a></li>
							</ul>
						</li>
						<li><a href="index.php?action=listAlertComments&controller=ControllerAdmin"><i class="glyphicon glyphicon-comment"></i>Commentaires signalés</a></li>
						<li><a href="index.php?action=manageUser&controller=ControllerAdmin"><i class="glyphicon glyphicon-th-large"></i>Utilisateurs</a></li>
                    <?php
					}
					?> 
					<li class="submenu">
						 <a href="#">
                            <i class="glyphicon glyphicon-user"></i> Mon compte<span class="caret pull-right"></span>       
                         </a>

                         <!-- Sub menu -->
                         <ul>
							  <li><a href="index.php?action=manageAccount&controller=ControllerAdmin">Mon compte</a></li>
							  <li><a href="index.php?action=deconnexion&controller=Controller">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
			<?php echo $page //Contenu de la page ?>
		</div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Web/bootstrap/js/bootstrap.min.js"></script>
    <script src="Web/js/custom.js"></script>
  </body>