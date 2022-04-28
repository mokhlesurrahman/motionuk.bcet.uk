<?php
require_once( '../include/connect.php' );
require_once( '../include/view.php' );
require_once( '../include/functions.php' );

@$submit = $_POST[ 'submit' ];
@$email =  $_POST[ 'usrEmail' ];
@$usrPassword = $_POST[ 'usrPassword' ];
$exist = "";
$wrongpass = "";

if ( ( isset( $email ) ) && ( isset( $usrPassword ) ) ) {
	if ( $email && $usrPassword ) {
		$sql="SELECT * FROM tbl_admin WHERE usrEmail= '".escape($email)."'";
		$qry = mysqli_query($db_connection,$sql) or die ("Error 10-->".mysqli_error($db_connection));
		
		$numrows = mysqli_num_rows($qry);
		if ( $numrows != 0 ) {
			$dbemail = '';
	 		while($row = mysqli_fetch_array($qry)) {
				$dbemail = $row['usrEmail'];
					$dbusrPassword = $row['usrPassword'];
					$usrId = $row['usrId'];
					//$usrRole = $row['usrRole'];
			}
			if ( $email == $dbemail && md5( $usrPassword ) == $dbusrPassword ) {
				$_SESSION[ 'com_carsit_adm_email' ] = $email;
				$_SESSION[ 'com_carsit_adm_usrId' ] = $usrId;
				$_SESSION[ 'com_carsit_adm_session_id' ] = session_id();
				$year = time() + 31536000;
				if ( isset( $_POST[ 'remember' ] ) ) {
					setcookie( 'com_carsit_adm_email_remember_me', $_POST[ 'usrEmail' ], $year );
				} elseif ( !isset( $_POST[ 'remember' ] ) ) {
					if ( isset( $_COOKIE[ 'com_carsit_adm_email_remember_me' ] ) ) {
						$past = time() - 100;
						setcookie( 'com_carsit_adm_email_remember_me', 'gone', $past );
					}
				}
				?>
				<script type="text/javascript">
					window.location.href = ( "<?php echo 'index.php?view=home'; ?>" );
				</script>
				<?php
			} else {
				?>
				<div class="alert alert-dismissable alert-danger">
					<strong>Oh snap!</strong> Invalid Credentials!
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				</div>
				<script type="text/javascript">
					jQuery( "#idsubmitData" ).button( 'reset' );
				</script>
				<?php
			}
		} else {
			?>
			<div class="alert alert-dismissable alert-danger">
				<strong>Oh snap!</strong> Invalid Credentials!
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			</div>
			<script type="text/javascript">
				jQuery( "#idsubmitData" ).button( 'reset' );
			</script>
			<?php
		}
	}
}
?>