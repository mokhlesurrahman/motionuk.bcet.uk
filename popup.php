<div class="text-center">
    <div id="test-popup"
         class="white-popup mfp-hide">
        <div class="rmq-12eea9bc"
             style="position: relative;
                        height: auto;width: 100%;">
            <div>
                <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
                    <img src="cdn/logo/<?php echo strPopupImage;?>"
                         style="margin: 0px; max-width: 100%; width: 100%; height: auto;">
                </div>
            </div>
            <div>
                <?php
                if (strPopupText != ''){
                ?>
                <div class="rmq-43f44628" style="padding: 10px;">
	                <?php
	                echo strPopupText;
	                ?>
                </div>
                <?php
                }
                ?>
                <style>
                    .white-popup {
                        position: relative;
                        background: #FFF;
                        padding: 0px;
                        width: auto;
                        /*max-width: 500px;*/
                        max-width: 50%;
                        margin: 20px auto;
                        transition: 1s all;
                        border-radius: 0px;
                    }

                    .mfp-close {
                        width: 44px;
                        height: 44px;
                        line-height: 44px;
                        position: absolute;
                        right: 0;
                        top: 0;
                        text-decoration: none;
                        text-align: center;
                        opacity: .65;
                        padding: 0 0 18px 10px;
                        color: #fff;
                        font-style: normal;
                        font-size: 28px;
                        font-family: Arial, Baskerville, monospace
                    }

                    .mfp-close:hover, .mfp-close:focus {
                        opacity: 1
                    }

                    .mfp-close:active {
                        top: 1px
                    }

                    .mfp-close-btn-in .mfp-close {
                        color: #fff;
                        position: absolute;
                        top: 0;
                        right: 0;
                        height: 40px;
                        width: 40px;
                        background: #222;
                        -webkit-transition: all 200ms ease-in-out;
                        transition: all 200ms ease-in-out;
                        opacity: 1;
                    }
                    
                    @media (max-width: 600px) {
                        .rmq-43f44628 {
                            padding: 33px 20px !important;
                        }
                    }

                    @media (max-width: 600px) {
                        .rmq-126a285f {
                            flex-direction: column-reverse !important;
                        }
                    }

                    @media (max-width: 600px) {
                        .rmq-d802e13 {
                            text-align: center !important;
                            width: 100% !important;
                        }
                    }
                    
                </style>
            </div>
        </div>
    </div>
    <a href="#test-popup" class="btn open-popup-link display-hide" style="display: none">Show inline popup</a>
</div>
<?php
if (isShowPopup == 'Yes'){
	?>
    <script>
        $('.open-popup-link').magnificPopup({
            type: 'inline',
            midClick: true,
            mainClass: 'mfp-fade'
        });
        $('.open-popup-link').click();
    </script>
	<?php
}
?>
