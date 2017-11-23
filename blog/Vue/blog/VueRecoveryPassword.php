<?php ob_start(); ?>
<div class="container">
  <div class="row">
	<div class="col-lg-8 col-md-10 mx-auto">
	<h2>Récupération mot de passe</h2>
	  <form action = "index.php?action=submitForgetPassword&controller=Controller" method = "POST">
		<div class="control-group">
		  <div class="form-group col-xs-12 floating-label-form-group controls">
			<label>Email</label>
			<input type="tel" class="form-control" placeholder="Email*" name="email" required>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="form-group">
		  <button type="submit" class="btn btn-secondary" name="submit">Récupération</button>
		</div>
	  </form>
	</div>
  </div>
</div>
<?php $page = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>