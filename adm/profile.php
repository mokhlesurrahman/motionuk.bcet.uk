<?php
$page_title = 'Profile';
$page_link = 'profile';
$random_number = random_num(16);
$_SESSION['INCLUDE_CHECK'] = $random_number;
if(isset($_SESSION['com_carsit_adm_usrId']) == true){
?>

<div class="content-header">
	<div class="header-icon"><i class="ti-close"></i></div>
	<div class="header-title">
		<h1><?php echo $page_title;?></h1>
		<small><?php echo strCompanyName;?></small>
		<ol class="breadcrumb">
			<li><a href="index.php?view=home">Home</a></li>
			<li class="active"><?php echo $page_title;?></li>
		</ol>
	</div>
</div>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $page_title;?></h3>
				</div>
				<?php
				$Editid 	= 	$_SESSION['com_carsit_adm_usrId'];
				$sql_view	=	"SELECT * FROM `tbl_admin` WHERE `usrId`='".$Editid."';";
				$query = mysqli_query($db_connection,$sql_view);
			
				$rs_view = mysqli_fetch_array($query);
				?>
				<form id="profile_form" class="form-horizontal" >
					<div class="panel-body">
						<div class="form-result"></div>
						<div class="row">
							<div class="col-sm-12">
								<label for="usrFullName" class="control-label">Name</label>
								<input type="text" id="usrFullName" class="form-control input-sm required" name="usrFullName" value="<?php if(isset($rs_view['usrFullName'])) echo $rs_view['usrFullName'];?>"/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label for="file" class="control-label">Profile Picture</label>
								<input type="file" name="image" id="file" class="form-control input-sm"/>
							</div>
							<div class="col-sm-6">
								<label for="file" class="control-label">
								<div id='preview'> </div>
								</label>
								<div id="loader" class="display-hide"> <img src="img/please_wait_animation.gif" class="img-responsive col-sm-8"/> </div>
								<img id="imgpreview" src="../cdn/profile/thumbs/small<?php if(isset($rs_view['profilePic'])) echo $rs_view['profilePic'];?>" class="img-responsive col-sm-4"/> </div>
						</div>
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-sm-12">
								<label for="change_check" class="control-label">Change Password</label>
								<br />
								<input type="checkbox" id="change_check" name="change_check">
								Yes </div>
						</div>
						<div class="pass_box display-hide row">
							<div class="col-sm-6">
								<label for="usrPassword" class="control-label">New Password</label>
								<input type="password" id="usrPassword" class="form-control input-sm required" name="usrPassword" value="" disabled="disabled"/>
							</div>
							<div class="col-sm-6">
								<label for="usrConfirmPassword" class="control-label">Repeat password</label>
								<input type="password" id="usrConfirmPassword" class="form-control input-sm required" name="usrConfirmPassword" value="" 
										disabled="disabled" equalTo="#usrPassword"/>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-sm btn-primary pull-right btn-update" type="button" name="temp" value="asdf" 
							data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><i class="fa fa-check"></i> SUBMIT</button>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="plugins/jquery.form.js?v=1.0"></script> 
<script type="text/javascript">
$("#change_check").change(function() {
    if (this.checked) {
        $('.pass_box').find(':input').prop('disabled', false);
        $('.pass_box').show('fade', 600);
    } else {
        $('.pass_box').find(':input').prop('disabled', true);
        $('.pass_box').hide('fade', 600);
    }
});


$("#file").on("change", function() {
    var form = new FormData();
    var file_data = $("#file").prop("files")[0];
    form.append("image", file_data);
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "submit/imageupload.php",
        "method": "POST",
        "processData": false,
        "contentType": false,
        "mimeType": "multipart/form-data",
        "data": form
    }
    jQuery('.btn-update').hide();
    jQuery('#loader').show();
    jQuery('#imgpreview').hide();
    $.ajax(settings).done(function(response) {
        jQuery('#imgpreview').show();
        jQuery('#loader').hide();
        jQuery('#preview').html(response);
        jQuery('.btn-update').show();
    });
});
$('.btn-update').click(function() {
    if ($("#profile_form").valid()) {
        var datastring = $("#profile_form").serialize();
        jQuery(".btn-update").button('loading');
        $.ajax({
            type: "POST",
            url: "submit/profile_submit.php",
            data: datastring,
            success: function(data) {
                $('.form-result').html('');
                $('.form-result').html(data);
                location.reload();
                jQuery(".btn-update").button('reset');
            },
            error: function() {
                alert('error handling here');
            }
        });
    }
});

</script>
<?php
}else{
?>
<script type="text/javascript">
	window.location.href = ('index.php');				
</script>
<?php
}
?>
