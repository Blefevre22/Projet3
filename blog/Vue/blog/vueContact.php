<?php ob_start(); ?>
<!-- Main Content -->
<div class="container">
  <div class="row">
	<div class="col-lg-8 col-md-10 mx-auto">
	  <p>Si vous avez une demande particlulère. Vous pouvez me contacter par mail en remplissant les champs ci-dessous :</p>
	  <form action = "index.php?action=sendMailContact&controller=Controller" method = "POST">
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Nom</label>
			<input type="text" class="form-control" placeholder="Votre Nom" name="login">
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Email</label>
			<input type="email" class="form-control" placeholder="Email Address" name="mail">
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<div class="control-group">
		  <div class="form-group floating-label-form-group controls">
			<label>Message</label>
			<textarea rows="5" class="form-control" placeholder="Message" name="msg"></textarea>
			<p class="help-block text-danger"></p>
		  </div>
		</div>
		<br>
		<div id="success"></div>
		<div class="form-group">
		  <button type="submit" class="btn btn-secondary" id="sendMessageButton">Send</button>
		</div>
	  </form>
	</div>
  </div>
  </div>
<?php $page = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>