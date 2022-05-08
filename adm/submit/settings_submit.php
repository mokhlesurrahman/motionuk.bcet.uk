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

$strCompanyLogo = isset($_POST['strCompanyLogo']) ? $_POST['strCompanyLogo'] : '';
$strCompanyAddress = isset($_POST['strCompanyAddress']) ? $_POST['strCompanyAddress'] : '';
$adminEmail = isset($_POST['adminEmail']) ? $_POST['adminEmail'] : '';
$strHeaderEmail = isset($_POST['strHeaderEmail']) ? $_POST['strHeaderEmail'] : '';
$strHeaderPhone = isset($_POST['strHeaderPhone']) ? $_POST['strHeaderPhone'] : '';
$strShortDescription = isset($_POST['strShortDescription']) ? $_POST['strShortDescription'] : '';

$strProjectComplated = isset($_POST['strProjectComplated']) ? $_POST['strProjectComplated'] : '0';
$strConsultants = isset($_POST['strConsultants']) ? $_POST['strConsultants'] : '0';
$strAwardsWining = isset($_POST['strAwardsWining']) ? $_POST['strAwardsWining'] : '0';
$strSatisfiedCustomers = isset($_POST['strSatisfiedCustomers']) ? $_POST['strSatisfiedCustomers'] : '0';

$strHomePageLayOut = isset($_POST['strHomePageLayOut']) ? $_POST['strHomePageLayOut'] : '';
$strMobileNumberStatus = isset($_POST['strMobileNumberStatus']) ? $_POST['strMobileNumberStatus'] : 'Show';

$strTeamDescription = isset($_POST['strTeamDescription']) ? $_POST['strTeamDescription'] : '';
$strInstructorDescription = isset($_POST['strInstructorDescription']) ? $_POST['strInstructorDescription'] : '';
$strContactInformation = isset($_POST['strContactInformation']) ? $_POST['strContactInformation'] : '';




$meta_keyword = isset($_POST['meta_keyword']) ? $_POST['meta_keyword'] : '';
$meta_description = isset($_POST['meta_description']) ? $_POST['meta_description'] : '';

$date_format_id = isset($_POST['date_format_id']) ? $_POST['date_format_id'] : '';
$currency_code = isset($_POST['currency_code']) ? $_POST['currency_code'] : '';
$strOurInstructorPageStatus = isset($_POST['strOurInstructorPageStatus']) ? $_POST['strOurInstructorPageStatus'] : 'Hide';
$isShowPopup = isset($_POST['isShowPopup']) ? $_POST['isShowPopup'] : 'No';


$strCompanyAcronym = isset($_POST['strCompanyAcronym']) ? $_POST['strCompanyAcronym'] : '';
$strCompanySlogan = isset($_POST['strCompanySlogan']) ? $_POST['strCompanySlogan'] : '';
$strCompanyTwitter = isset($_POST['strCompanyTwitter']) ? $_POST['strCompanyTwitter'] : '';

$strCompanyFacebook = isset($_POST['strCompanyFacebook']) ? $_POST['strCompanyFacebook'] : '';
$strCompanyInstagram = isset($_POST['strCompanyInstagram']) ? $_POST['strCompanyInstagram'] : '';
$strCompanyYouTube = isset($_POST['strCompanyYouTube']) ? $_POST['strCompanyYouTube'] : '';
$strCompanyPinterest = isset($_POST['strCompanyPinterest']) ? $_POST['strCompanyPinterest'] : '';
$strCompanyLinkedIn = isset($_POST['strCompanyLinkedIn']) ? $_POST['strCompanyLinkedIn'] : '';

$photo_popup = isset($_POST['photo_popup']) ? $_POST['photo_popup'] : '';
$photo = isset($_POST['photo']) ? $_POST['photo'] : '';
/*Create uploads directory if necessary*/
if(!file_exists('../../cdn')) mkdir('../../cdn');
if(!file_exists('../../cdn/logo')) mkdir('../../cdn/logo');
if(!file_exists('../../cdn/logo/thumbs')) mkdir('../../cdn/logo/thumbs');
if(!file_exists('../../cdn/settings')) mkdir('../../cdn/settings');

$outputDirectoryMain = "../../cdn/logo/".$photo;
$outputDirectoryThumbs = "../../cdn/logo/thumbs/small".$photo;

$imageMain = 'temp/thumbs/'.$photo;
$imageThumbs = 'temp/thumbs/small'.$photo;

$file_name = isset($_POST['file_name']) ? $_POST['file_name'] : array();


if ($strCompanyLogo != '') {
	$update = update('tbl_settings', array(
		'strCompanyLogo',
		'strCompanyAddress',
		'strHeaderEmail',
		'strHeaderPhone',
		'strShortDescription',
		'strProjectComplated',
		'strConsultants',
		'strAwardsWining',
		'strSatisfiedCustomers',
		'date_format_id',
		'currency_code',
		'adminEmail',
		'strHomePageLayOut',
		'strTeamDescription',
		'strInstructorDescription',
		'meta_keyword',
		'meta_description',
		'strMobileNumberStatus',
        'strCompanyAcronym',
        'strCompanySlogan',
        'strCompanyTwitter',
		'strOurInstructorPageStatus',
		'strContactInformation',
		'isShowPopup',
		'strCompanyFacebook',
		'strCompanyInstagram',
		'strCompanyYouTube',
		'strCompanyPinterest',
		'strCompanyLinkedIn'
	) , array(
		$strCompanyLogo,
		$strCompanyAddress,
		$strHeaderEmail,
		$strHeaderPhone,
		$strShortDescription,
		$strProjectComplated,
		$strConsultants,
		$strAwardsWining,
		$strSatisfiedCustomers,
		$date_format_id,
		$currency_code,
		$adminEmail,
		$strHomePageLayOut,
		$strTeamDescription,
		$strInstructorDescription,
		$meta_keyword,
		$meta_description,
		$strMobileNumberStatus,
        $strCompanyAcronym,
        $strCompanySlogan,
        $strCompanyTwitter,
		$strOurInstructorPageStatus,
		$strContactInformation,
		$isShowPopup,
		$strCompanyFacebook,
		$strCompanyInstagram,
		$strCompanyYouTube,
		$strCompanyPinterest,
		$strCompanyLinkedIn
	) , 'intSettingsID = 1');
	if ($update) {
		if ($photo != '') {
			$update2 = update('tbl_settings', array(
				'strLogo'
			) , array(
				$photo
			) , 'intSettingsID = 1');
			rename($imageMain, $outputDirectoryMain);
            rename($imageThumbs, $outputDirectoryThumbs);
		}
		if ($photo_popup != '') {
			$update2 = update('tbl_settings', array(
				'strPopupImage'
			) , array(
				$photo_popup
			) , 'intSettingsID = 1');
			
			$outputDirectoryMainPopup   = "../../cdn/logo/".$photo_popup;
			$outputDirectoryThumbsPopup = "../../cdn/logo/thumbs/small".$photo_popup;
			
			$imageMainPopup   = 'temp/thumbs/'.$photo_popup;
			$imageThumbsPopup = 'temp/thumbs/small'.$photo_popup;
			
			rename($imageMainPopup, $outputDirectoryMainPopup);
			rename($imageThumbsPopup, $outputDirectoryThumbsPopup);
		}
        if (count($file_name) > 0) {
            foreach ($file_name as $key => $val) {
                $update = update('tbl_settings', array(
                    $key
                ), array(
                    $val
                ), 'intSettingsID = 1');

                $destination_file = "../../cdn/settings/" . $val;
                $source_file = 'temp/' . $val;
                rename($source_file, $destination_file);
            }
        }
		$arr['success'] = 2;
	}
}
else {
	$arr['error'] = 0;
}
echo json_encode($arr); 

?>