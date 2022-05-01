<?php

$page_title = 'Log In';

$page_link = 'login';

if(isset($_SESSION['com_carsit_adm_usrId']) == false){
	if ($_SERVER['REMOTE_ADDR'] == $remote_addr) {
		$email = 'rezababu@gmail.com';
		$password = 'rOn@Ii#NnoV2020';
	}else{
		$email = '';
		$password = '';
	}
?>
<div class="login-box">
	<div class="container-center">
		<div class="panel panel-bd">
			<div class="panel-heading" style="border-bottom: 1px solid #ddd;">
				<div class="view-header">
					<div class="header-icon"> <i class="ti-unlock"></i> </div>
					<div class="header-title">
						<h2><?php echo strCompanyAcronym?></h2>
						<small><strong>Please enter your credentials to login.</strong></small> </div>
				</div>
			</div>
			<div class="panel-body">
				<div class="form_result"></div>
				<form id="form_sample" method="post" action="">
					<div class="form-group">
						<label class="control-label">Username</label>
						<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" id="usrEmail" class="form-control input-sm required" name="usrEmail" placeholder="Username" value="<?php echo $email;?>"/>
						</div>
						</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" id="usrPassword" class="form-control input-sm required" name="usrPassword" placeholder="******" value="<?php echo $password;?>"/>
						</div>
						</div>
				</form>
			</div>
			<div class="panel-footer">
				<div>
					<button type="button" id="idSubmitData" class="btn btn-primary btn-block btn-flat pull-right" name="nameSubmitBtn"

                    value="Login" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait"><i class="fa fa-sign-in mr-10"></i> Log In </button>
					<?php /*?><div class="checkbox checkbox-success">
						<input id="checkbox3" type="checkbox">
						<label for="checkbox3">Keep me signed in</label>
					</div><?php */?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$('#idSubmitData').click(function() {
    submitLogin();
});
$("#form_sample").keypress(function(e) {
    code = e.keyCode ? e.keyCode : e.which;
    if (code.toString() == 13) {
        submitLogin();
    }
});
var submitLogin = function() {
    if ($("#form_sample").valid()) {
        var products = $("#form_sample").serialize();
        jQuery("#idSubmitData").button('loading');
        $.ajax({
            type: "POST",
            url: "submit/login_submit.php",
            data: products,
            success: function(data) {
                $('.form_result').html(data);
				   $("#idSubmitData").button("reset");
            },
            error: function(jqXHR, exception) {
                if (jqXHR.status === 0) {
                    $.notify('Not connect. Verify Network.', 'érror');
                    $.playSound("sound/error.mp3");
                    $("#idSubmitData").button("reset");
                } else if (jqXHR.status == 404) {
                    $.notify('Requested page not found. [404].', 'érror');
                    $.playSound("sound/error.mp3");
                    $("#idSubmitData").button("reset");
                } else if (jqXHR.status == 500) {
                    $.notify('Internal Server Error [500].', 'érror');
                    $.playSound("sound/error.mp3");
                    $("#idSubmitData").button("reset");

                } else if (exception === 'parsererror') {
                    $.notify('Requested JSON parse failed.', 'érror');
                    $.playSound("sound/error.mp3");
                    $("#idSubmitData").button("reset");

                } else if (exception === 'timeout') {
                    $.notify('Time out error.', 'érror');
                    $.playSound("sound/error.mp3");
                    $("#idSubmitData").button("reset");

                } else if (exception === 'abort') {
                    $.notify('Ajax request aborted.', 'érror');
                    $.playSound("sound/error.mp3");
                    $("#idSubmitData").button("reset");

                } else {
                    $.notify('Uncaught Error.' + jqXHR.responseText, 'error');
                    $.playSound("sound/error.mp3");
                    $("#idSubmitData").button("reset");
                }
            }
        });
    }
}
</script>

<?php

}else{

?>

<script type="text/javascript">

	window.location.href = ('<?php echo 'index.php?view=home'; ?>');				

</script>

<?php

}

?>





