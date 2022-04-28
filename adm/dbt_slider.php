<?php
$page_title = 'Slider';
$page_link = 'slider';
$random_number = random_num( 16 );
$_SESSION[ 'INCLUDE_CHECK' ] = $random_number;
if ( isset( $_SESSION[ 'com_carsit_adm_usrId' ] ) == true ) {
?>

<section class="content">
<div class="row">
<div class="col-md-12">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab_list" data-toggle="tab">List</a>
</li>
<li><a href="#form" data-toggle="tab">Form</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_list">
<table id="tbl-client" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="noExport">#</th>
			
			<th>Image</th>
			<th>Name</th>
			<th class="noExport"></th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
</div>
<div class="tab-pane" id="form">
<form action="#" class="horizontal-form" id="sampleForm">
	<div class="form-body">

		<a class="btn btn-danger btn-xs pull-right display-hide" id="update_close" href="javascript:void(0)" onclick="fun_close()"><i class="fa fa-close"></i>&nbsp;Cancel update</a><br /><div class="clearfix"></div>

		<div class="row display-hide">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Name" class="control-label">Company Name</label>
					<select id="intSisterID" class="form-control input-sm required" name="intSisterID">
					<option value="">Select an option</option>
					<?php 
					$sql = ("SELECT * FROM `dbt_sister_concern` ORDER BY `isMain` ASC LIMIT 0,1");
					$rs = mysqli_query($db_connection,$sql);					
					while ($obj = mysqli_fetch_array($rs)) {
						echo "<option value='".$obj['intSisterID']."' selected='selected'>".$obj['strSisterConcernName']."</option>";										
					}
					?>
					</select>									
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Name" class="control-label">Name</label>
					<input type="text" class="form-control input-sm required" id="strSmallHeader" name="strSmallHeader">
				</div>
			</div>
		</div>
		<div class="row" style="display: none">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Name" class="control-label">Line 2(Top Header)</label>
					<input type="text" class="form-control input-sm " id="strTopHeader" name="strTopHeader">
				</div>
			</div>
		</div>
		<!--<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Name" class="control-label">Link</label>
					<input type="text" class="form-control input-sm url" id="strShortLink" name="strShortLink">
				</div>
			</div>
		</div>-->
		<div class="row" style="display: none">
			<div class="col-md-12">
				<div class="form-group">
					<label for="Name" class="control-label">Description</label>
					<textarea class="form-control input-sm" id="strDescription" name="strDescription"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label">Image</label>
					<input type="file" name="image" id="file" class="form-control input-sm required" />
					<span class="help-block">Image shoul be 1660x1107 PX</span>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"></label>
				<div id='preview'> </div>
				<div id="loader" class="display-hide">
				<img src="img/please_wait_animation.gif" class="img-responsive col-sm-8"/>
				</div>
				<img id="imgpreview" src="" class="img-responsive col-sm-3"/> 
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="form-actions right">
		<input type="hidden" id="Editid" name="Editid" value="">
		<button type="submit" class="btn btn-sm btn-primary pull-right btn-add-client" value="Add" name="temp" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><i class="fa fa-check"></i> SUBMIT</button>
		<div class="clearfix"></div>
	</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

<script type="text/javascript" src="js/pages/dbt_slider.js?v=1.0"></script>
<script type="text/javascript">
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
    jQuery('.btn-add-client').hide();
    jQuery('#loader').show();
    jQuery('#imgpreview').hide();
    $.ajax(settings).done(function(response) {
        jQuery('#imgpreview').show();
        jQuery('#loader').hide();
        jQuery('#preview').html(response);
        jQuery('.btn-add-client').show();
    });
});
</script>
<?php
} else {
?>
<script type="text/javascript">
window.location.href = ( 'index.php' );
</script>
<?php
}
?>