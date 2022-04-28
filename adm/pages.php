<?php
$page_title = ucwords(str_replace('_',' ',$view));
$page_link = $view;
if ( isset( $_SESSION['com_carsit_adm_usrId'] ) == true ) {
	?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form: <?php echo $page_title;?></h3>
                    </div>
                    <form id="sampleForm">
                        <div class="panel-body">
							<?php
							$edited_row_id 	= 	'1';
							$sql_view	=	"SELECT * FROM `web_pages` WHERE `page_name`='".escape($view)."'";
							$qry_view = mysqli_query($db_connection,$sql_view);
							$rs_view = mysqli_fetch_array($qry_view);
							
							
							?>
                            <div class="form-result"></div>

                            <div class="clearfix"></div>
                            <div class="row" style="display: none">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Header</label>
                                        <input id="pageHeader"
                                               class="form-control input-sm required"
                                               name="pageHeader"
                                               value="<?php if (isset($rs_view['pageHeader'])) echo $rs_view['pageHeader']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea id="pageNote"
                                                  class="form-control required ckeditor"
                                                  name="pageNote"
                                                  rows="15"><?php if (isset($rs_view['pageNote'])) echo $rs_view['pageNote']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="display: none">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Cover Photo</label>
                                        <input type="file" name="image" id="file" class="form-control input-sm " />
                                        <span class="help-block">Image should be 1920x607 PX</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label"></label>
                                    <div id='preview'> </div>
                                    <div id="loader" class="display-hide">
                                        <img src="img/please_wait_animation.gif" class="img-responsive col-sm-8"/>
                                    </div>
                                    <img id="imgpreview" src="../cdn/pages/<?php if (isset($rs_view['pageCoverPhoto'])) echo $rs_view['pageCoverPhoto']; ?>" class="img-responsive col-sm-3"/>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-footer">
                            <input type="hidden"
                                   id="page_name"
                                   name="page_name"
                                   value="<?php echo $view;?>">
                            <button class="btn btn-sm btn-primary btn-update pull-right"
                                    type="button"
                                    name="temp"
                                    value="edit"
                                    data-loading-text="<em class='fa fa-circle-o-notch fa-spin'></em> Processing">
                                <em class="fa fa-check"></em> Update
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript"
            src="plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript"
            src="plugins/ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript">
        $().ready(function() {
            $("#sampleForm").validate({
                ignore: "",
                errorElement: 'label',
                errorClass: 'error',
                rules: {
                    pageNote: {
                        required: function(textarea) {
                            var editorId = $(textarea).attr('id');
                            var editorContent = CKEDITOR.instances[editorId].getData();
                            var editorCon = $(editorContent).text().trim();
                            return editorCon.length === 0;
                        }
                    },
                },
                messages: {
                    pageNote: {
                        required: "Please enter description",
                    },
                },
                submitHandler: function() {
                    form_submit();
                }
            });
        });
        $('.btn-update').click(function() {
            if ($("#sampleForm").valid()) {
                $(".btn-update").button('loading');
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var datastring = $("#sampleForm").serialize();

                var photo = $('#photo').val();
                var pageHeader = $('#pageHeader').val();
                var page_name = $('#page_name').val();
                var pageNote = CKEDITOR.instances.pageNote.getData();

                var datastring = 'photo='+photo+'@@shm@@pageHeader='+pageHeader+'@@shm@@page_name='+page_name+'@@shm@@pageNote='+pageNote;

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    contentType: 'application/json',
                    url: "submit/pages_submit.php",
                    data: JSON.stringify(datastring),
                    //data: {name:JSON.stringify('message')},
                    //data: encodeURIComponent(datastring),
                    success: function(data) {
                        //console.log(data.success);
                        //var obj = $.parseJSON(data);
                        //if (obj.error == '0') {
                        if (data.error == '0') {
                            $.notify("Error occurred! Please try again.", "error");
                            $.playSound("assets/media/iphonenoti");
                            $(".btn-update").button('reset');
                        } else {
                            $.notify("Updated Successfully", "success");
                            $.playSound("assets/media/iphonenoti");
                            location.reload();
                            $(".btn-update").button('reset');
                        }
                        $(".btn-update").button('reset');
                        return false;
                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.\n Verify Network.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        alert(msg);
                        $(".btn-update").button('reset');
                        return false;
                    },
                });
                return false;
            }
            return false;
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
}else{
	?>
    <script type="text/javascript">
        window.location.href = ('index.php');
    </script>
	<?php
}
?>
