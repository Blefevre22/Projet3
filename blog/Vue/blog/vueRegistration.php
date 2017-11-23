<?php ob_start(); ?>
<div class="container">
  <div class="row">
	<div class="col-lg-8 col-md-10 mx-auto">
	<h2>Création de compte</h2>
	  <form action = "index.php?action=submitRegistration&controller=Controller" method = "POST" enctype="multipart/form-data">
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Prénom</label>
			<input type="text" class="form-control" placeholder="Prénom*" name="firstName" required>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Nom</label>
			<input type="text" class="form-control" placeholder="Nom*" name="lastName" required>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Identifiant</label>
			<input type="text" class="form-control" placeholder="Identifiant*" name="login" required>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Mot de passe</label>
			<input type="password" class="form-control" placeholder="Mot de passe*" name="password" required>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="control-group">
		  <div class="form-group col-xs-12 floating-label-form-group controls">
			<label>Email</label>
			<input type="tel" class="form-control" placeholder="Email*" name="email" required>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="control-group">
		<label>Avatar</label>
		  <div class="form-group col-xs-12 floating-label-form-group controls">
			<label>Avatar</label>
			<input type="file" class="form-control" name="uploadAvatar" placeholder="avatar">
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<br>
		<div id="success"></div>
		<div class="form-group">
		  <button type="submit" class="btn btn-secondary" name="submit">Création</button>
		</div>
	  </form>
	</div>
  </div>
</div>
<?php $page = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>