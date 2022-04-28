<?php $page_title = 'Settings';
$page_link = 'settings';
$random_number = random_num(16);
$_SESSION['INCLUDE_CHECK'] = $random_number;
if (isset($_SESSION['com_carsit_adm_usrId']) == true) {
    ?>
    <div class="content-header">
        <div class="header-icon">
            <i class="ti-close"></i>
        </div>
        <div class="header-title">
            <h1><?php echo $page_title; ?></h1>
            <small><?php echo strCompanyName;?></small>
            <ol class="breadcrumb">
                <li><a href="index.php?view=home">Home</a></li>
                <li class="active"><?php echo $page_title; ?></li>
            </ol>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Settings</h3></div>
                    <form id="settings_form">
                        <div class="panel-body"> <?php $Editid = '1';
                            $sql_view = "SELECT * FROM `tbl_settings` WHERE `intSettingsID`='" . $Editid . "';";
                            $qry_view = mysqli_query($db_connection, $sql_view);
                            $rs_view = mysqli_fetch_array($qry_view); ?>
                            <div class="form-result"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label>Company Logo</label>
                                        <input type="file" name="file"
                                               id="file"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="loader" class="display-hide">
                                        <img src="img/please_wait_animation.gif"
                                             class="img-responsive col-sm-8"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <img id="imgpreview"
                                                 src="../cdn/logo/<?php if (isset($rs_view['strLogo'])) echo $rs_view['strLogo']; ?>"
                                                 class="img-responsive"/>
                                        </div>
                                    </div>
                                    <div id='preview'></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label>Company Name</label>
                                        <input type="text"
                                               class="form-control input-sm required"
                                               name="strCompanyLogo"
                                               value="<?php if (isset($rs_view['strCompanyLogo'])) echo $rs_view['strCompanyLogo']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Company Acronym</label>
                                        <input type="text"
                                               class="form-control input-sm required"
                                               name="strCompanyAcronym"
                                               value="<?php if (isset($rs_view['strCompanyAcronym'])) echo $rs_view['strCompanyAcronym']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Company Slogan</label>
                                        <input type="text"
                                               class="form-control input-sm "
                                               name="strCompanySlogan"
                                               value="<?php if (isset($rs_view['strCompanySlogan'])) echo $rs_view['strCompanySlogan']; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Company Address</label> <input type="text"
                                                                                                  class="form-control input-sm required"
                                                                                                  name="strCompanyAddress"
                                                                                                  value="<?php if (isset($rs_view['strCompanyAddress'])) echo $rs_view['strCompanyAddress']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Header Phone</label> <input type="text"
                                                                                               class="form-control input-sm required"
                                                                                               name="strHeaderPhone"
                                                                                               value="<?php if (isset($rs_view['strHeaderPhone'])) echo $rs_view['strHeaderPhone']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Header Email</label> <input type="text"
                                                                                               class="form-control input-sm required"
                                                                                               name="strHeaderEmail"
                                                                                               value="<?php if (isset($rs_view['strHeaderEmail'])) echo $rs_view['strHeaderEmail']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Admin Email to Get Notification</label> <input
                                                type="text" class="form-control input-sm required email"
                                                name="adminEmail"
                                                value="<?php if (isset($rs_view['adminEmail'])) echo $rs_view['adminEmail']; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: none">
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Home Page Layout</label>
                                        <div class="radio"><label> <input type="radio" name="strHomePageLayOut" class=""
                                                                          value="Slider" <?php if (@$rs_view['strHomePageLayOut'] == 'Slider') echo 'checked="checked"'; ?>>
                                                Slider </label></div>
                                        <div class="radio"><label> <input type="radio" name="strHomePageLayOut" class=""
                                                                          value="Single" <?php if (@$rs_view['strHomePageLayOut'] == 'Single') echo 'checked="checked"'; ?>>
                                                Single </label></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            <div class="row" style="display: none">
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Facebook</label> <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           name="strCompanyFacebook"
                                                                                           value="<?php if (isset($rs_view['strCompanyFacebook'])) echo $rs_view['strCompanyFacebook']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Youtube</label> <input type="text"
                                                                                          class="form-control input-sm"
                                                                                          name="strCompanyTwitter"
                                                                                          value="<?php if (isset($rs_view['strCompanyTwitter'])) echo $rs_view['strCompanyTwitter']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>Whatsapp</label> <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           name="strCompanyWhatsapp"
                                                                                           value="<?php if (isset($rs_view['strCompanyWhatsapp'])) echo $rs_view['strCompanyWhatsapp']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label>LinkedIn</label> <input type="text"
                                                                                           class="form-control input-sm"
                                                                                           name="strCompanyLinkedIn"
                                                                                           value="<?php if (isset($rs_view['strCompanyLinkedIn'])) echo $rs_view['strCompanyLinkedIn']; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row" style="display: none">
                                <div class="col-sm-12">
                                    <div class="form-group"><label>Contact Information</label> <textarea
                                                class="form-control required ckeditor"
                                                id="strContactInformation"
                                                placeholder=""
                                                name="strContactInformation"
                                                rows="5"><?php if (isset($rs_view['strContactInformation'])) echo $rs_view['strContactInformation']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: none">
                                <div class="col-sm-12">
                                    <div class="form-group"><label>Short Description</label> <textarea
                                                class="form-control " id="strShortDescription"
                                                placeholder="Short description for footer" name="strShortDescription"
                                                rows="5"><?php if (isset($rs_view['strShortDescription'])) echo $rs_view['strShortDescription']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group"><label>Meta keyword</label> <textarea
                                                class="form-control required" id="meta_keyword" placeholder=""
                                                name="meta_keyword"
                                                rows="5"><?php if (isset($rs_view['meta_keyword'])) echo $rs_view['meta_keyword']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group"><label>Meta Description</label> <textarea
                                                class="form-control required" id="meta_description" placeholder=""
                                                name="meta_description"
                                                rows="5"><?php if (isset($rs_view['meta_description'])) echo $rs_view['meta_description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-footer">
                            <button type="button"
                                    class="btn btn-sm btn-primary btn-update pull-right"
                                    name="temp"
                                    value="edit"
                                    data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                                <i class="fa fa-check"></i> Update
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript"> $("#file").on("change", function () {
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
            $.ajax(settings).done(function (response) {
                jQuery('#preview').html(response);
                jQuery('.btn-update').show();
                jQuery('#loader').hide();
                jQuery('#imgpreview').show();
            });
        });
        $('.btn-update').click(function () {
            if ($("#settings_form").valid()) {
                var datastring = $("#settings_form").serialize();
                $(".btn-update").button('loading');
                $.ajax({
                    type: "POST", url: "submit/settings_submit.php", data: datastring, success: function (data) {
                        var obj = $.parseJSON(data);
                        if (obj.error == '0') {
                            $.notify("Error Occurred! Please try again.", "error");
                            $.playSound("media/iphonenoti");
                            $(".btn-update").button('reset');
                        } else {
                            $.notify("Settings Updated successfully", "success");
                            $.playSound("media/iphonenoti");
                            location.reload();
                            $(".btn-update").button('reset');
                        }
                    }, error: function () {
                        alert('error handling here');
                    }
                });
            }
        }); </script> <?php } else { ?>
    <script type="text/javascript"> window.location.href = ('index.php'); </script> <?php } ?>