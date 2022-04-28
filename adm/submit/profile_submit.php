<?php
require_once ('../include/connect.php');

require_once ('../include/functions.php');

$Edit_id = $_SESSION['com_carsit_adm_usrId'];
$temp = '';
$usrFullName = isset($_POST['usrFullName']) ? $_POST['usrFullName'] : '';
 
$password = isset($_POST['usrPassword']) ? $_POST['usrPassword'] : '';
$con_password = isset($_POST['usrConfirmPassword']) ? $_POST['usrConfirmPassword'] : '';
$change_check = isset($_POST['change_check']) ? $_POST['change_check'] : '';

$photo = isset($_POST['photo']) ? $_POST['photo'] : '';
/*Create uploads directory if necessary*/
if(!file_exists('../../cdn')) mkdir('../../cdn');
if(!file_exists('../../cdn/profile')) mkdir('../../cdn/profile');
if(!file_exists('../../cdn/profile/thumbs')) mkdir('../../cdn/profile/thumbs');


$outputDirectoryMain = "../../cdn/profile/".$photo;
$outputDirectoryThumbs = "../../cdn/profile/thumbs/small".$photo;

$imageMain = 'temp/thumbs/'.$photo;
$imageThumbs = 'temp/thumbs/small'.$photo;


if ($change_check == 'on') {
	if ($password != '' && $con_password != '') {
		if ($password == $con_password) {
			$update_pass = update('tbl_admin', array(
				'usrPassword'
			) , array(
				md5($password)
			) , 'usrId =' . $Edit_id);
			if ($update_pass) {
				if ($photo != '') {
					$update2 = update('tbl_admin', array(
						'profilePic'
					) , array(
						$photo
					) , 'usrId =' . $Edit_id);
								rename($imageMain, $outputDirectoryMain);
			rename($imageThumbs, $outputDirectoryThumbs);

				}else{
					$update2 = update('tbl_admin', array(
								'usrFullName'
							) , array(
								$usrFullName
							) , 'usrId =' . $Edit_id);	
				}
				echo notify("success", "Profile Updated successfully");
			}
		}
		else {
			echo notify("error", "Confirm Passwords mismatch");
		}
	}
	else {
		echo notify("error", "Passwords Cannot be Empty");
	}
}
else {
	if ($photo != '') {

		$update2 = update('tbl_admin', array(
			'profilePic','usrFullName'
		) , array(
			$photo,$usrFullName
		) , 'usrId =' . $Edit_id);
		
					rename($imageMain, $outputDirectoryMain);
			rename($imageThumbs, $outputDirectoryThumbs);

		
		if ($update2) {
			echo notify("success", "Profile Updated successfully");
		}
	}else{
		$update2 = update('tbl_admin', array(
			'usrFullName'
		) , array(
			$usrFullName
		) , 'usrId =' . $Edit_id);
		if ($update2) {
			echo notify("success", "Profile Updated successfully");
		}
	}
}

?>