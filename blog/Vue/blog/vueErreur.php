<?php ob_start() ?>
<p><?php echo $msgErreur; ?></p>
<?php 
$page = ob_get_clean();
require 'gabarit.php'; 
?>