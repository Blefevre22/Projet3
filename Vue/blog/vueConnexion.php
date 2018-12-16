<?php ob_start(); ?>

<div class="container">
	<?php
	if(isset($errorConnexion)){
	?>
		<div class='row'>
			<div class="col-lg-3 col-md-5 col-sm-6 mx-auto">
				<strong>L'identifiant ou le mot de passe et incorrect !</strong>
			</div>
		</div>
		<div class='row'>
			<div class="col-lg-3 col-md-5 col-sm-6 mx-auto">
				<strong>Veuillez recommencer</strong>
			</div>
		</div>
	<?php
	}
	?>
	<div class="row">
		<div class="col-lg-3 col-md-5 col-sm-6 mx-auto">
			<form action = "index.php?action=identification&controller=Controller" method = "POST">
				<input type = 'text' name = 'login' value="" placeholder = "Identifiant"  required="required" autofocus></br>
				<input type = 'password' name = 'password' value = "" placeholder ="Mot de passe"  required="required" ></br></br>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 mx-auto">
						<input type = 'submit' value = "Connexion">
						</div>
				</div>
			</form>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mx-auto">
					<a href = 'index.php?action=forgetPassword&controller=Controller'>Récupérer vos identifiants</a></br>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 mx-auto">
					<a href ='index.php?action=registration&controller=Controller'>Créer un compte</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $page = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>