<?php
require_once('include/connect.php');
require_once('include/view.php');
$page_title = 'Log Out';
$page_link = 'logout';
unset($_SESSION['com_carsit_adm_email']);
unset($_SESSION['com_carsit_adm_usrId']);
unset($_SESSION['com_quantamsoftware_graffitti_role_id']);
unset($_SESSION['com_carsit_adm_session_id']);

session_destroy();
header("Location: index.php"); 
?>
<!--<script>location.replace('<?php echo urlroute('login'); ?>');</script>-->


 