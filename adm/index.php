<?php

		
		
		require_once('include/connect.php');
		require_once('include/view.php'); 
		require_once('include/html_head.php');
		?>
		
		<?php 
		if(isset($_SESSION['com_carsit_adm_email'])){
			?>
			<body class="hold-transition skin-blue sidebar-mini ">
			<div class="wrapper">
			<?php            
		}else{
			echo '<body class="hold-transition login-page">';
		}
		?>
		
		<?php 
		if(isset($_SESSION['com_carsit_adm_email'])){
			require_once('include/nav_header.php'); 
		}
		?>
		
		
		<?php 
		if(isset($_SESSION['com_carsit_adm_email']) == false){
			include $content;
		}else{
		?>
		
		<?php require_once('include/nav_sidebar.php'); ?>
			<div class="content-wrapper">
		<?php include $content; ?>	
			</div> 
		
		<?php		
		}
		?>
		
		
		<script src="dist/js/app.min.js?v=1.0"></script>
		<?php 
		if(isset($_SESSION['com_carsit_adm_email']))
		{
		require_once('include/footer.php');
		?>
		</div>
		<?php 
		}
		?>
		</div>
		</body>
		
		</html>
		
		
		<?php
		
?>
