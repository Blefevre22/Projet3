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
					$i = 0;
					while(isset($displayReported[$i])){
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
					$i++;
					}
					?>
				</ul>
			</div>
			<br /><br />
		</div>
	</div>
</div>

</div>
<?php 
$page = ob_get_clean();
require 'gabaritAdmin.php'; 
?>