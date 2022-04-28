<?php
require_once ('../include/connect.php');
require_once ('../include/functions.php');

$Edit_id = '';
$temp = '';
if (array_key_exists('Editid', $_POST)) {
	$Edit_id = isset($_POST['Editid']) ? $_POST['Editid'] : '';
}
if (array_key_exists('temp', $_POST)) {
	$temp = isset($_POST['temp']) ? $_POST['temp'] : '';
}

$table_name = 'dbt_slider';
$unique_row = 'intSisterID';

$intSisterID = isset($_POST['intSisterID']) ? $_POST['intSisterID'] : '';
$strSmallHeader = isset($_POST['strSmallHeader']) ? $_POST['strSmallHeader'] : '';
$strTopHeader = isset($_POST['strTopHeader']) ? $_POST['strTopHeader'] : '';
$strDescription = isset($_POST['strDescription']) ? $_POST['strDescription'] : '';
$strShortLink = isset($_POST['strShortLink']) ? $_POST['strShortLink'] : '';

$photo = isset($_POST['photo']) ? $_POST['photo'] : '';
/*Create uploads directory if necessary*/
if(!file_exists('../../cdn')) mkdir('../../cdn');
if(!file_exists('../../cdn/partner')) mkdir('../../cdn/partner');
if(!file_exists('../../cdn/partner/thumbs')) mkdir('../../cdn/partner/thumbs');


$outputDirectoryMain = "../../cdn/partner/".$photo;
$outputDirectoryThumbs = "../../cdn/partner/thumbs/small".$photo;

$imageMain = 'temp/thumbs/'.$photo;
$imageThumbs = 'temp/thumbs/small'.$photo;

if ($Edit_id != '') {
	if ($intSisterID != '') {
		$update = update($table_name, array(
			'intSisterID',
			'strSmallHeader',
			'strTopHeader',
			'strDescription',
			'strShortLink'
		) , array(
			$intSisterID,
			$strSmallHeader,
			$strTopHeader,
			$strDescription,
			$strShortLink
		) , 'intSliderID = ' . $Edit_id);
		if ($update) {
			if($photo != ''){
				$update = update($table_name, array(
					'photo'
				) , array(
					$photo
				) , 'intSliderID = ' . $Edit_id);
				rename($imageMain, $outputDirectoryMain);
rename($imageThumbs, $outputDirectoryThumbs);
			}
			$arr['success'] = 2;
		}
	}
	else {
		$arr['error'] = 0;
	}
	echo json_encode($arr);
}
else {
	if ($intSisterID != '' && $Edit_id == '') {
		$insert = insert($table_name, array(
			'intSisterID',
			'strSmallHeader',
			'strTopHeader',
			'strDescription',
			'photo',
			'strShortLink'
		) , array(
			$intSisterID,
			$strSmallHeader,
			$strTopHeader,
			$strDescription,
			$photo,
			$strShortLink
		));
		if ($insert) {
			if($photo != ''){
				rename($imageMain, $outputDirectoryMain);
rename($imageThumbs, $outputDirectoryThumbs);
			}
			$arr['success'] = 1;
		}
	}
	else {
		$arr['error'] = 0;
	}
	echo json_encode($arr);
}
?>