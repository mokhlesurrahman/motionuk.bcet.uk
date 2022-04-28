<header class="main-header">

 

    <a href="index.php" class="logo">
      <span class="logo-mini"><?php echo strCompanyAcronym;?></span>
      <span class="logo-lg"><?php echo strCompanyAcronym;?></span>
    </a>
    
    
	<nav class="navbar navbar-static-top"> <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<?php 

$usrImg = tbl_data_conditional($_SESSION['com_carsit_adm_usrId'],'usrId','profilePic','tbl_admin');
if($usrImg ==''){ $pic = 'dist/img/default-50x50.gif'; }else{$pic = '../cdn/profile/thumbs/small'.$usrImg;}
?>
				<li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo $pic;?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?php echo name($_SESSION['com_carsit_adm_email']);?></span> </a>
					<ul class="dropdown-menu">
						<li class="user-header"> <img src="<?php echo $pic;?>" class="img-circle" alt="User Image">
							<p>
								<?php echo name($_SESSION['com_carsit_adm_email']);?>
							</p>
						</li>
						<li class="user-footer">
							<div class="pull-left"> <a href="index.php?view=profile" class="btn btn-default btn-flat">Profile</a> </div>
							<div class="pull-right"> <a href="index.php?view=logout" class="btn btn-default btn-flat">Sign out</a> </div>
						</li>
					</ul>
				</li>

				<li class="log_out">
					<a href="index.php?view=logout">
<i class="fa fa-power-off"></i>
</a>
				
				</li>

			</ul>
		</div>
	</nav>
</header>