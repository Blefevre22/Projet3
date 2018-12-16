<?php ob_start(); ?>
<div class="container">
  <div class="row">
	<div class="col-lg-8 col-md-10 mx-auto">
	<h2>Nouveau mot de passe</h2>
		<?php $security = $_GET['id'];?>
	  <form action = "index.php?action=submitChangePassword&controller=Controller&id=<?php echo $security;?>" method = "POST">
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Mot de passe</label>
			<input type="password" class="form-control" placeholder="Mot de passe*" name="password" required>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="form-group">
		  <button type="submit" class="btn btn-secondary" name="submit">Modifier</button>
		</div>
	  </form>
	</div>
  </div>
</div>
<?php $page = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>