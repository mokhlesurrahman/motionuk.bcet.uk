<?php
session_start();
ob_start();

$user_agent = getenv("HTTP_USER_AGENT");
function getBrowserOS() {
    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";

    if (preg_match('/windows|win32/i', $user_agent)) {
        $os_platform    =   'Windows';
    } else if (preg_match('/macintosh|mac os x/i', $user_agent)) {
        $os_platform    =   'Mac';
    } else if (preg_match('/linux/i', $user_agent)) {
        $os_platform    =   "Linux";
    }

    return array(
        'os_platform'   =>  $os_platform
    );
}

$user_agent     =   getBrowserOS();
if($user_agent['os_platform'] == 'Mac'){
    $remote_addr = '127.0.0.1';
}else{
    $remote_addr = '::1';
}

if($_SERVER['REMOTE_ADDR'] == $remote_addr){
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'lavishco_motionuk';
} else {
	@$dbhost = 'mysql1003.mochahost.com';
	@$dbuser = 'lavishco_umotionuk';
	@$dbpass = 'B7}J%k?;T,c(vY[x1w';
	$db = 'lavishco_motionuk';
}

@$db_connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (mysqli_connect_errno()) {

    echo "Error: Unable to connect to mysqli." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;

}


mysqli_query($db_connection, 'SET CHARACTER SET utf8');
mysqli_query($db_connection, "SET SESSION collation_connection ='utf8_general_ci'");


date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$cur_time = date('H:i:s');


/*
 *

 *
 * */


$emailSetFrom = 'notifications@bcet.uk';
$email_for_sending = 'notifications@bcet.uk';
$password_for_sending = 'G$18H91*ibxk';
$email_Host = 'mocha3036.mochahost.com';
$email_Port = 587;
$email_SMTPSecure = 'tls';


$sql_user_admin = "SELECT * FROM `tbl_settings` ORDER BY `intSettingsID` DESC LIMIT 0,1";
$qry_user_admin = mysqli_query($db_connection, $sql_user_admin);

if (mysqli_num_rows($qry_user_admin) > 0) {
    while ($row = mysqli_fetch_array($qry_user_admin)) {


        DEFINE('strCompanyName', $row['strCompanyLogo']);
        DEFINE('strHeaderEmail', $row['strHeaderEmail']);
        DEFINE('strLogo', $row['strLogo']);

        DEFINE('strHeaderPhone', $row['strHeaderPhone']);
        DEFINE('strHomePageLayOut', $row['strHomePageLayOut']);

        DEFINE("strCompanyAddress", $row['strCompanyAddress']);
        DEFINE("strShortDescription", $row['strShortDescription']);


        DEFINE("strProjectComplated", $row['strProjectComplated']);
        DEFINE("strConsultants", $row['strConsultants']);
        DEFINE("strAwardsWining", $row['strAwardsWining']);
        DEFINE("strSatisfiedCustomers", $row['strSatisfiedCustomers']);

        DEFINE("strTeamDescription", $row['strTeamDescription']);
        DEFINE("strInstructorDescription", $row['strInstructorDescription']);

        DEFINE("adminEmail", $row['adminEmail']);

        DEFINE("strMetaDescription", strip_tags($row['meta_description']));
        DEFINE("strMetaKeywords", $row['meta_keyword']);


        DEFINE("strMobileNumberStatus", $row['strMobileNumberStatus']);
        DEFINE("strOurInstructorPageStatus", $row['strOurInstructorPageStatus']);
	
	    DEFINE("strCompanyTwitter", $row['strCompanyTwitter']);
	    DEFINE("strCompanyWhatsapp", $row['strCompanyWhatsapp']);
	    DEFINE("strCompanyAcronym", $row['strCompanyAcronym']);
	
	
	    DEFINE("strCompanyFacebook", $row['strCompanyFacebook']);
	    DEFINE("strCompanyInstagram", $row['strCompanyInstagram']);
	    DEFINE("strCompanyYouTube", $row['strCompanyYouTube']);
	    DEFINE("strCompanyPinterest", $row['strCompanyPinterest']);
	    DEFINE("strCompanyLinkedIn", $row['strCompanyLinkedIn']);
	
	
	
	    DEFINE("strCompanySlogan", $row['strCompanySlogan']);
 
 
        DEFINE("strContactInformation", $row['strContactInformation']);
        DEFINE("strPopupText", $row['strContactInformation']);
        DEFINE("strPopupImage", $row['strPopupImage']);
        DEFINE("isShowPopup", $row['isShowPopup']);
    }
}

DEFINE('FB_APP_ID', '589020977859437');
if ($_SERVER['REMOTE_ADDR'] == $remote_addr) {

    if($user_agent['os_platform'] == 'Mac') {
        $_WEBSITE_URL = 'http://localhost:8080/sites/lavishcon.com/motionuk.bcet.uk/';
    }else{
        $_WEBSITE_URL = 'http://localhost/sites/lavishcon.com/motionuk.bcet.uk/';
    }
} else {
    $_WEBSITE_URL = 'https://motionuk.bcet.uk/';
}

DEFINE('strWebsiteUrl', $_WEBSITE_URL);
DEFINE('_WEBSITE_EMAIL_URL', 'https://motionuk.bcet.uk/');

$_SHARE_IMG = strWebsiteUrl . 'images/fb-share.png';
DEFINE('_SHARE_IMG', $_SHARE_IMG);


$_BLANK_IMG = strWebsiteUrl . 'images/fb-share.png';
DEFINE('_BLANK_IMG', $_BLANK_IMG);

$_SHARE_WEBSITE_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
DEFINE('strShareWebsiteUrl', $_SHARE_WEBSITE_URL);



define('STRIPE_API_KEY', 'sk_test_51K8P6rJ7hvapde9K2FeRiQ6LbNGEH1D9dASHzdAWSiykJuRvSHs8jeMqp2y2scxKE2EQgy60kABTfeSt8TZgH5TA00vKUuHHZE');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51K8P6rJ7hvapde9K53QVAM0o28B0WkLtxrxFOJfJ1PFzNaz1uDjoxJJ79gjTcW1zyWFm1FVPVKln6B77sA3fwp5a00FnknvyzF');


DEFINE('MAIL_TOP', '
<div style="background:#f0f3f7">
    <div style="background-color:#f0f3f7;padding-top: 50px;">
        <div style="margin:0px auto;max-width:600px;background:#fff">
            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#fff"
                   align="center" border="0">
                <tbody>
                <tr>
                    <td style="text-align:left;vertical-align:top;direction:ltr;font-size:0px;padding:0px">
                        <div style="margin:0px auto">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%"
                                   align="center" border="0">
                                <tbody>
                                <tr>
                                    <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 20px 0px 20px">
                                        <div style="margin:0px auto" class="m_2999182780021895962ge5-header">
                                            <table role="presentation" cellpadding="0" cellspacing="0"
                                                   style="font-size:0px;width:100%" align="center" border="0">
                                                <tbody>
                                                <tr>
                                                    <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 20px 20px 20px">
                                                        <div style="color:#000000;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;text-align:center">
                                                            <img style="max-height:65px" height="65"
                                                                 src="'._WEBSITE_EMAIL_URL.'/cdn/logo/'.strLogo.'"
                                                                 alt="'.strCompanyName.'">
                                                            <div style="font-family:Open Sans,Helvetica,Arial,sans-serif;font-style:normal;font-size:24px;color:#4d6575;line-height:24px;font-weight:bold;margin-top:12px; display: none;">".strCompanyName."</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="100%" bgcolor="#CCCCCC" height="1"
                                                        style="font-size:1px;line-height:1px"></td>
                                                </tr>
                                                <tr>
                                                <td width="100%" style="text-align: left;">
                                                
');

DEFINE('MAIL_BOTTOM', '
<p style="font-size:12px;line-height:18px;font-family:Open Sans,Helvetica,Arial,sans-serif;padding:0px 0px 25px 0px;margin:0;">
Thanks & Regards--<br /> <strong>' . strCompanyAcronym . ' TEAM</strong>
</p>
</td>
                                                </tr>
</tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
       
        <div style="margin:0px auto">
            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%" align="center"
                   border="0">
                <tbody>
                <tr>
                    <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:10px 10px 20px 10px">
                        <div style="margin:0px auto">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%"
                                   align="center" border="0">
                                <tbody>
                                <tr>
                                    <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px">
                                        <div class="m_2999182780021895962mj-column-per-100"
                                             style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
                                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
                                                   border="0">
                                                <tbody>
                                                <tr>
                                                    <td style="word-wrap:break-word;font-size:0px;padding:0px"
                                                        align="left">
                                                        <div style="color:#000000;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;text-align:left">
                                                            <p style="font-size:12px;line-height:18px;font-family:Open Sans,Helvetica,Arial,sans-serif;color:#4d6575;padding:0;margin:0;text-align:center">
                                                                <span>© 2020 '.strCompanyAcronym.'. All Rights Reserved.</span>
                                                            </p>
                                                        </div>font-family: Calibri;
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
');

function send_email($message,$subject){
	global $remote_addr,$email_Host,$email_Port,$email_SMTPSecure,$email_for_sending,$password_for_sending,$emailSetFrom;
	
	$mail_server = $email_Host;
	$mail_port = $email_Port;
	$mail_encryption = $email_SMTPSecure;
	$mail_username = $email_for_sending;
	$mail_password = $password_for_sending;
	$mail_from_email = $emailSetFrom;
	$mail_from_name = strCompanyAcronym;
	
	$msg  = MAIL_TOP;
	$msg .= $message;
	$msg .= MAIL_BOTTOM;
	
	$mail = new PHPMailer;
	if ($_SERVER['REMOTE_ADDR'] == $remote_addr) {
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->Host = $mail_server;
		$mail->Port = $mail_port;
		$mail->SMTPSecure = $mail_encryption;
		$mail->Username = $mail_username;
		$mail->Password = $mail_password;
	}
	$mail->setFrom($emailSetFrom, strCompanyAcronym);
	$mail->addReplyTo(strHeaderEmail, strCompanyAcronym);
	$mail->addAddress($mail_from_email, $mail_from_name);
	$mail->Subject = $subject;
	$mail->msgHTML($msg);
	
	$status = 'error';
	try {
		$mail->send();
		$status = 'sent';
	} catch (Exception $e) {
		//echo $e->getMessage();
		$status =  'error';
	}
	return $status;
}
?>