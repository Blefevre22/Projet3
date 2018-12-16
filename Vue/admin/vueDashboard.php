<?php ob_start(); ?>
<div class="col-md-10">
<div class="row">
	<div class="col-md-12 panel-warning">
		<div class="content-box-header panel-heading">
			<div class="panel-title ">Commentaires signalés</div>
		</div>
		<div class="content-box-large box-with-header">
			<div class="comments-container">
				<ul id="comments-list" class="comments-list">
					<?php
					for($i = 0; $i < 5; $i++){
						if(isset($displayReported[$i])){
					?>
							<li>
								<div class="comment-main-level">
									<!-- Commentaire -->
									<div class="comment-box">
										<div class="comment-head">
											<h6>
												<a href="index.php?action=validComment&controller=ControllerComments&id=<?php echo $displayReported[$i]['comment_id']; ?>" class="glyphicon glyphicon-ok"></a>
												<a href="index.php?action=removeCom&controller=ControllerComments&id=<?php echo $displayReported[$i]['comment_id']; ?>" class="glyphicon glyphicon-remove"></a>
												<?php echo $displayReported[$i]['user_login']; ?> <span style ='font-weight: normal;'><?php echo $displayReported[$i]['comment_date']; ?></span>
											</h6>
										</div>
										<div class="comment-content">
											<?php echo $displayReported[$i]['com']; ?>
										</div>
									</div>
								</div>
							</li>
					<?php
							if($i >= 4){
					?>
								<div class="row">
									<a href='index.php?action=listAlertComments&controller=ControllerAdmin'>Voir plus de commentaires signalés </a>
								</div>
					<?php	
							}
						}
					}
					?>
				</ul>
			</div>
			<br /><br />
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="content-box-header panel-heading">
			<div class="panel-title ">Nouvelles créations de compte</div>
		</div>
		<div class="content-box-large box-with-header">
			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
			<br /><br />
		</div>
	</div>
</div>

</div>
<?php 
$page = ob_get_clean();
require 'gabaritAdmin.php'; 
?>