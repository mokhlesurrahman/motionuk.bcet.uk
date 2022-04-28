<?php
include ('../include/connect.php');
include ('../include/functions.php');
require '../../PHPMailer/PHPMailerAutoload.php';


$loggedInusrId = $_SESSION['com_carsit_adm_usrId'];
if (isset($_GET['id'])) {
	if (isset($_GET['table']) && isset($_GET['unique_id'])) {
		$Deleteid = $_REQUEST['id'];

			$sql = "DELETE FROM `" . $_GET['table'] . "` WHERE `" . $_GET['unique_id'] . "` = '" . $Deleteid . "';";
			
			$rs_delete1 = mysqli_query($db_connection,$sql);

			if ($rs_delete1) {
				$arr['success'] = 1;
			}
			else {
				$arr['error'] = 0;
			}
			echo json_encode($arr);
		
	}

}
if (isset($_GET['unique_id'])) {
    if (isset($_GET['table']) && isset($_GET['table_column'])) {
        $Deleteid = $_REQUEST['pk'];
        $val = $_REQUEST['val'];

        $sql = "UPDATE `" . $_GET['table'] . "` SET `" . $_GET['table_column'] . "` = '".$val."' WHERE `" . $_GET['unique_id'] . "` = '" . $Deleteid . "';";

        $rs_delete1 = mysqli_query($db_connection,$sql);

        echo 'Updated...';

    }
}
if (isset($_REQUEST['name'])) {
    if (isset($_REQUEST['table']) && isset($_REQUEST['unique_id'])) {
        $Delete_id = $_REQUEST['pk'];
        $value = $_REQUEST['value'];

        $sql = "
        UPDATE `" . $_REQUEST['table'] . "` 
           SET `" . $_REQUEST['name'] . "` = '".escape($value)."' 
         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
        $qry = mysqli_query($db_connection,$sql);
        if($qry){
            if($_REQUEST['table'] == 'accreditation_application' && $_REQUEST['name'] == 'status'){

                $sql = "SELECT * FROM `accreditation_application` WHERE `accreditation_application_id` = '" . $Delete_id . "'";
                $query = mysqli_query($db_connection, $sql);
                $rs_view = mysqli_fetch_array($query);
                $institute_name = $rs_view['institute_name'];
                $contact_name = $rs_view['contact_name'];
                $contact_email = $rs_view['contact_email'];

                $msg = MAIL_TOP;
                $msg .= "
                <div style = 'font-size:12px;margin-top:8px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;'>
                    <h2 style = 'font-family: Calibri;color:rgb(102, 102, 102);margin:0 0 16px;font-weight:bold'>Dear ".$contact_name.",</h2>
                    <p style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>
                    Institutional accreditation for ".$institute_name." has been ".$value.".
                    </p>
                    <br />
                </div>";
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
                    $mail->Host = $email_Host;
                    $mail->Port = $email_Port;
                    $mail->SMTPSecure = $email_SMTPSecure;
                    $mail->Username = $email_for_sending;
                    $mail->Password = $password_for_sending;
                }
                $mail->setFrom($emailSetFrom, strCompanyAcronym);
                $mail->addReplyTo(strHeaderEmail, strCompanyAcronym);
                $mail->addAddress($contact_email, $contact_name);
                $mail->addCC(adminEmail, strCompanyAcronym);
                $mail->Subject = $institute_name.' - accreditation status ['.$value.']';
                $mail->msgHTML($msg);
                $mail->send();
            }
            if($_REQUEST['table'] == 'course_accreditation' && $_REQUEST['name'] == 'status'){

                $sql = "SELECT * FROM `course_accreditation` WHERE `course_accreditation_id` = '" . $Delete_id . "'";
                $query = mysqli_query($db_connection, $sql);
                $rs_view = mysqli_fetch_array($query);
                $accreditation_number = $rs_view['accreditation_number'];
                $course_title = $rs_view['course_title'];


                $sql = "SELECT * FROM `accreditation_application` WHERE `accreditation_code` = '" . $accreditation_number . "'";
                $query = mysqli_query($db_connection, $sql);
                $rs_view = mysqli_fetch_array($query);
                $institute_name = $rs_view['institute_name'];
                $contact_name = $rs_view['contact_name'];
                $contact_email = $rs_view['contact_email'];

                $msg = MAIL_TOP;
                $msg .= "
                <div style = 'font-size:12px;margin-top:8px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;'>
                    <h2 style = 'font-family: Calibri;color:rgb(102, 102, 102);margin:0 0 16px;font-weight:bold'>Dear ".$contact_name.",</h2>
                    <p style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>
                    Course accreditation for <b>".$course_title."</b> by <b>".$institute_name."</b> has been ".$value.".
                    </p>
                    <br />
                </div>";
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
                    $mail->Host = $email_Host;
                    $mail->Port = $email_Port;
                    $mail->SMTPSecure = $email_SMTPSecure;
                    $mail->Username = $email_for_sending;
                    $mail->Password = $password_for_sending;
                }
                $mail->setFrom($emailSetFrom, strCompanyAcronym);
                $mail->addReplyTo(strHeaderEmail, strCompanyAcronym);
                $mail->addAddress($contact_email, $contact_name);
                $mail->addCC(adminEmail, strCompanyAcronym);
                $mail->Subject = $course_title.' by '.$institute_name.' - accreditation status ['.$value.']';
                $mail->msgHTML($msg);
                $mail->send();
            }
            if($_REQUEST['table'] == 'membership' && (($_REQUEST['name'] == 'application_status') || ($_REQUEST['name'] == 'payment_status') || ($_REQUEST['name'] == 'status'))){

                $sql = "SELECT * FROM `membership` WHERE `membership_id` = '" . $Delete_id . "'";
                $query = mysqli_query($db_connection, $sql);
                $rs_view = mysqli_fetch_array($query);
	
	            $invoice_number = $rs_view['membership_invoice_number'];
                $contact_name = $rs_view['contact_name'];
                $contact_email = $rs_view['contact_email'];
                $application_status = $rs_view['application_status'];
                $payment_status = $rs_view['payment_status'];
                $membership_status = $rs_view['status'];
	
	            $subject = $sub_message = '';
				if ($_REQUEST['name'] == 'application_status'){
					$subject = $invoice_number.' : '.$contact_name.' Membership Application Status ['.$application_status.']';
					if ($application_status == 'Pending') {
						$sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `payment_status` = 'NULL',`status`= 'NULL',`membership_number` = '',`expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
						$qry = mysqli_query($db_connection,$sql);
						
						
						$sub_message = '
						Membership application for <b>'.$contact_name.'</b> has been '.$application_status.'.
						';
					}else if ($application_status == 'Approved') {
						$sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `payment_status` = 'Invoice Generated',
				               `status`= 'NULL',
				               `membership_number` = '',
				               `expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
						$qry = mysqli_query($db_connection,$sql);
						
						$sub_message = '
						Membership application for <b>'.$contact_name.'</b> has been '.$application_status.'. An invoice(' . $invoice_number . ') is generated, to make a payment please log in to ' . strCompanyName . ' portal (' . _WEBSITE_EMAIL_URL . ') and pay.
						';
					}
					else if ($application_status == 'Rejected') {
						$sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `payment_status` = 'NULL',`status`= 'NULL',`membership_number` = '',`expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
						$qry = mysqli_query($db_connection,$sql);
						
						$sub_message = '
						Membership application for <b>'.$contact_name.'</b> has been '.$application_status.'.
						';
					}
				}
	
	
	            if ($_REQUEST['name'] == 'payment_status'){
		            $subject = $invoice_number.' : '.$contact_name.' Membership Payment Status ['.$payment_status.']';
		            if (($payment_status == 'Invoice Generated') && ($payment_status == 'Unpaid')) {
			            $sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `status`= 'NULL',`membership_number` = '',`expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
			            $qry = mysqli_query($db_connection,$sql);
			
			
			            $sub_message = '
						Membership application for <b>'.$contact_name.'</b> has been '.$application_status.'. An invoice(' . $invoice_number . ') is generated, to make a payment please log in to ' . strCompanyName . ' portal (' . _WEBSITE_EMAIL_URL . ') and pay.
						';
		            }
		            else if ($payment_status == 'Paid') {
			            $sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `status`= 'Pending',`membership_number` = '',`expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
			            $qry = mysqli_query($db_connection,$sql);
			
			            $sub_message = '
						The payment was successful. Order ID: '.$invoice_number.'.
						';
		            }
	            }
	
	
	            if ($_REQUEST['name'] == 'status'){
		            $subject = $invoice_number.' : '.$contact_name.' Membership Status ['.$application_status.']';
		            $sub_message = '
					Membership application for <b>'.$contact_name.'</b> has been '.$membership_status.'.
					';
					$expiry_date = $membership_number = '';
		            if ($application_status == 'Approved') {
						$expiry_date = date('Y-m-d', strtotime('+365 day'));
			            $membership_number = str_replace('-INV','',$invoice_number);
		            }
		            $sql = "
			        UPDATE `" . $_REQUEST['table'] . "`
			           SET `membership_number` = '".$membership_number."',`expiry_date` = '".$expiry_date."'
			         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
		            $qry = mysqli_query($db_connection,$sql);
	            }
				
				
                $msg = MAIL_TOP;
                $msg .= "
                <div style = 'font-size:12px;margin-top:8px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;'>
                    <h2 style = 'font-family: Calibri;color:rgb(102, 102, 102);margin:0 0 16px;font-weight:bold'>Dear ".$contact_name.",</h2>
                    <p style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>
                    ".$sub_message."
                    </p>
                    <br />
                </div>";
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
                    $mail->Host = $email_Host;
                    $mail->Port = $email_Port;
                    $mail->SMTPSecure = $email_SMTPSecure;
                    $mail->Username = $email_for_sending;
                    $mail->Password = $password_for_sending;
                }
                $mail->setFrom($emailSetFrom, strCompanyAcronym);
                $mail->addReplyTo(strHeaderEmail, strCompanyAcronym);
                $mail->addAddress($contact_email, $contact_name);
                $mail->addCC(adminEmail, strCompanyAcronym);
                $mail->Subject = $subject;
                $mail->msgHTML($msg);
                $mail->send();
            }
            if($_REQUEST['table'] == 'provider_application' && $_REQUEST['name'] == 'status'){

                $sql = "SELECT * FROM `provider_application` WHERE `provider_id` = '" . $Delete_id . "'";
                $query = mysqli_query($db_connection, $sql);
                $rs_view = mysqli_fetch_array($query);

                $contact_name = $rs_view['contact_name'];
                $contact_email = $rs_view['contact_email'];

                $msg = MAIL_TOP;
                $msg .= "
                <div style = 'font-size:12px;margin-top:8px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;'>
                    <h2 style = 'font-family: Calibri;color:rgb(102, 102, 102);margin:0 0 16px;font-weight:bold'>Dear ".$contact_name.",</h2>
                    <p style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>
                    Provider application for <b>".$contact_name."</b> has been ".$value.".
                    </p>
                    <br />
                </div>";
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
                    $mail->Host = $email_Host;
                    $mail->Port = $email_Port;
                    $mail->SMTPSecure = $email_SMTPSecure;
                    $mail->Username = $email_for_sending;
                    $mail->Password = $password_for_sending;
                }
                $mail->setFrom($emailSetFrom, strCompanyAcronym);
                $mail->addReplyTo(strHeaderEmail, strCompanyAcronym);
                $mail->addAddress($contact_email, $contact_name);
                $mail->addCC(adminEmail, strCompanyAcronym);
                $mail->Subject = $contact_name.' - Provider status ['.$value.']';
                $mail->msgHTML($msg);
                $mail->send();
            }
	        if($_REQUEST['table'] == 'dbt_training_registration' && (($_REQUEST['name'] == 'application_status') || ($_REQUEST['name'] == 'payment_status') || ($_REQUEST['name'] == 'status'))){
		
		        $usrFullName = $invoice_number = $strTrainingName = $strTrainingBatchName = '';
				
		        $sql = "
                SELECT *
                  FROM `dbt_training_registration`
                 WHERE `regID`='".$Delete_id."'
                ";
		        $query = mysqli_query($db_connection, $sql) or die(mysqli_error($db_connection));
		        $rs_view = mysqli_fetch_array($query);
		
		        $contact_name         = $rs_view['usrFullName'];
		        $invoice_number       = $rs_view['invoice_number'];
		        $strTrainingName      = $rs_view['strTrainingName'];
		        $strTrainingBatchName = $rs_view['strTrainingBatchName'];
				
		        $contact_email = $rs_view['usrEmailAddress'];
		        $application_status = $rs_view['application_status'];
		        $payment_status = $rs_view['payment_status'];
		        $training_status = $rs_view['status'];
		
		        $subject = $sub_message = '';
		        if ($_REQUEST['name'] == 'application_status'){
			        $subject = $invoice_number.' : '.$contact_name.' Program Application Status ['.$application_status.']';
			        if ($application_status == 'Pending') {
				        $sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `payment_status` = 'NULL',
				               `status`= 'NULL',
				               `application_number` = '',
				               `expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
				        $qry = mysqli_query($db_connection,$sql);
				
				        $sub_message = '
						Program application['.$strTrainingName.'] for <b>'.$contact_name.'</b> has been '.$application_status.'.
						';
			        }else if ($application_status == 'Approved') {
				        $sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `payment_status` = 'Invoice Generated',
				               `status`= 'NULL',
				               `application_number` = '',
				               `expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
				        $qry = mysqli_query($db_connection,$sql);
				
				        $sub_message = '
						Program application['.$strTrainingName.'] for <b>'.$contact_name.'</b> has been '.$application_status.'. An invoice(' . $invoice_number . ') is generated, to make a payment please log in to ' . strCompanyName . ' portal (' . _WEBSITE_EMAIL_URL . ') and pay.
						';
			        }
			        else if ($application_status == 'Rejected') {
				        $sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `payment_status` = 'NULL',
				               `status`= 'NULL',
				               `application_number` = '',
				               `expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
				        $qry = mysqli_query($db_connection,$sql);
				
				        $sub_message = '
						Program application['.$strTrainingName.'] for <b>'.$contact_name.'</b> has been '.$application_status.'.
						';
			        }
		        }
		
		
		        if ($_REQUEST['name'] == 'payment_status'){
			        $subject = $invoice_number.' : '.$contact_name.' Program Application Payment Status ['.$payment_status.']';
			        if (($payment_status == 'Invoice Generated') && ($payment_status == 'Unpaid')) {
				        $sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `status`= 'NULL',
				               `application_number` = '',
				               `expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
				        $qry = mysqli_query($db_connection,$sql);
				
				
				        $sub_message = '
						Program application for <b>'.$contact_name.'</b> has been '.$application_status.'. An invoice(' . $invoice_number . ') is generated, to make a payment please log in to ' . strCompanyName . ' portal (' . _WEBSITE_EMAIL_URL . ') and pay.
						';
			        }
			        else if ($payment_status == 'Paid') {
				        $sql = "
				        UPDATE `" . $_REQUEST['table'] . "`
				           SET `status`= 'Pending',
				               `application_number` = '',
				               `expiry_date` = ''
				         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
				        $qry = mysqli_query($db_connection,$sql);
				
				        $sub_message = '
						The payment was successful. Order ID: '.$invoice_number.'.
						';
			        }
		        }
		
		
		        if ($_REQUEST['name'] == 'status'){
			        $subject = $invoice_number.' : '.$contact_name.' Program Status ['.$application_status.']';
			        $sub_message = '
					Program application for <b>'.$contact_name.'</b> has been '.$training_status.'.
					';
			        $expiry_date = $application_number = '';
			        if ($application_status == 'Approved') {
				        //$expiry_date = date('Y-m-d', strtotime('+365 day'));
				        $application_number = str_replace('-INV','',$invoice_number);
			        }
			        $sql = "
			        UPDATE `" . $_REQUEST['table'] . "`
			           SET `application_number` = '".$application_number."',
			               `expiry_date` = ''
			         WHERE `" . $_REQUEST['unique_id'] . "` = '" . $Delete_id . "';";
			        $qry = mysqli_query($db_connection,$sql);
		        }
		
		
		        $msg = MAIL_TOP;
		        $msg = "
	            <div style = 'font-size:12px;margin-top:8px'>
	                <h2 style = 'font-family: Calibri;color:rgb(102, 102, 102);margin:0 0 16px;font-weight:bold'>Dear {$contact_name},</h2>
	                
	                <p style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>
	                Greetings from ".strCompanyAcronym." !!
	                <br />
	                <br />
	                ".$sub_message."
	                </p>
	                <p style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>Your Registered Program details are as follows:-</p>
	             
	                <br />
	                <table>
	                <tr><td width='200' style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>Training Name:- </td><td style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>$strTrainingName</td></tr>
	                <tr><td width='200' style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>Medium:- </td><td style = 'font-family: Calibri;font-size: 14px;line-height: 23px;'>$strTrainingBatchName</td></tr>
	                </table>
	                <br />
	                
	                </div>
				</div>";
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
			        $mail->Host = $email_Host;
			        $mail->Port = $email_Port;
			        $mail->SMTPSecure = $email_SMTPSecure;
			        $mail->Username = $email_for_sending;
			        $mail->Password = $password_for_sending;
		        }
		        $mail->setFrom($emailSetFrom, strCompanyAcronym);
		        $mail->addReplyTo(strHeaderEmail, strCompanyAcronym);
		        $mail->addAddress($contact_email, $contact_name);
		        $mail->addCC(adminEmail, strCompanyAcronym);
		        $mail->Subject = $subject;
		        $mail->msgHTML($msg);
		        $mail->send();
	        }
        }

    }
}