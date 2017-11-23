<?php ob_start(); ?>


<div class="container col-md-10 col-mx-10">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>	
					<th>Identifiant</th>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Mot de passe</th>
					<th>Email</th>
					<th>Groupe</th>
					<th>Avatar</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<form action='index.php?action=submitUser&controller=ControllerAdmin&id=<?php echo $user->user_id();?>&account=account' method='POST' enctype="multipart/form-data">
					<tr>
						<td><input type="text" name="login" value="<?php echo $user->user_login();?>"></td>
						<td><input type="text" name="firstName" value="<?php echo $user->user_firstName();?>"></td>
						<td><input type="text" name="lastName" value="<?php echo $user->user_lastName();?>"></td>
						<td><input type="password" name="password" value="<?php echo $user->user_password();?>"></td>
						<td><input type="email" name="email" value="<?php echo $user->user_mail();?>"></td>
						<?php
						if($_SESSION['user_group'] == "admin"){
						?>
							<td>
								<select name="group">
									<option value="<?php echo $user->user_group();?>"><?php echo $user->user_group();?></option>
									<option value="admin">admin</option>
									<option value="lecteur">lecteur</option>
								</select>
							</td>
						<?php
						}else{
							echo "<td>".$user->user_group()."</td>";
						}
						?>
						<td>
							<input type="file" name="uploadAvatar" class="col-md-8">
							<img src='<?php echo $user->avatar();?>' height="42" width="42"  class="col-md-4">
						</td>
						<input type="hidden" name="avatar" value="<?php echo $user->avatar();?>">
						<td>
							<button type="submit" name="<?php echo $user->user_id();?>">
								<span class="glyphicon glyphicon-ok"></span>
							</button>
							<button type="button" onclick="javascript:location.href='index.php?action=deleteUser&controller=ControllerAdmin&id=<?php echo $user->user_id();?>&account=account'">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>
				</form>
			</tbody>
		</table>
	</div>
</div>

<?php 
$page = ob_get_clean();
require 'gabaritAdmin.php'; 
?>