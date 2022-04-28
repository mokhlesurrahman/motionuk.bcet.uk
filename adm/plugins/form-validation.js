var FormValidation = function () {

    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
				
				rules: {
					email: {
						required: true,
						remote:{
							url: "submit/check_username.php",
							type: "post",
							data:{
								email: function(){
									return $('.form-horizontal :input[name="email"]').val();
								}
							}
						}
					},
					port_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
						service_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
						fleet_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
						travel_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
						about_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
						privacy_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
						event_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
					terms_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					
					test_description: {
						required: function(textarea) {
						CKEDITOR.instances[textarea.id].updateElement(); // update textarea
							var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
							return editorcontent.length === 0;
						}
					},
					

				},
				
				messages: { // custom messages for username availablity
					email: {
						required: 'Username is required',
						remote: "Username already exists"
					},
				},
				
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					
                    success1.show();
                    error1.hide();
					
					if($('.ckeditor').length > 0){
					
						var myinstances = [];
					
						//this is the foreach loop
						for(var i in CKEDITOR.instances) {
					
					   /* this  returns each instance as object try it with alert(CKEDITOR.instances[i]) */
						CKEDITOR.instances[i]; 
					   
						/* this returns the names of the textareas/id of the instances. */
						CKEDITOR.instances[i].name;
					
						/* returns the initial value of the textarea */
						CKEDITOR.instances[i].value;  
					 
					   /* this updates the value of the textarea from the CK instances.. */
					   CKEDITOR.instances[i].updateElement();
					
					   /* this retrieve the data of each instances and store it into an associative array with
						   the names of the textareas as keys... */
					   myinstances[CKEDITOR.instances[i].name] = CKEDITOR.instances[i].getData(); 

					}
					
					}
					
					if($('#port_description .ckeditor').length == 1){
						CKEDITOR.instances.port_description.getData();
                	}
					
					if($('#service_description .ckeditor').length == 1){
						CKEDITOR.instances.service_description.getData();
                	}
					
					if($('#fleet_description .ckeditor').length == 1){
						CKEDITOR.instances.fleet_description.getData();
                	}
					
					
					if($('#travel_description .ckeditor').length == 1){
						CKEDITOR.instances.travel_description.getData();
                	}
					
					if($('#about_description .ckeditor').length == 1){
						CKEDITOR.instances.about_description.getData();
                	}
					
					if($('#privacy_description .ckeditor').length == 1){
						CKEDITOR.instances.privacy_description.getData();
                	}
					
					if($('#event_description .ckeditor').length == 1){
						CKEDITOR.instances.event_description.getData();
                	}
					if($('#terms_description .ckeditor').length == 1){
						CKEDITOR.instances.terms_description.getData();
                	}
					
					if($('#test_description .ckeditor').length == 1){
						CKEDITOR.instances.test_description.getData();
                	}
					
					jQuery("#loader").show();
					//jQuery("#idsubmitData").hide();
					
					$.ajax({
						url: $(form1).attr("action"),
						type: $(form1).attr("method"),
						data: $(form1).serialize(),
						cache: false,
						success: function(response) {
							//alert(r);
						   jQuery(".form_result").html(response);
						   jQuery('html,body').stop().animate({
							  scrollTop: jQuery(".form_result").offset().top - 30
						   }, 300);
						   
						   jQuery("#loader").hide();	
						}
					  })
                   return false;
					
                }
            });
    }

    return {
        //main function to initiate the module
        init: function () {
			
            handleValidation1();
        }
    };
}();

var handleDatePickers = function () {

	if (jQuery().datepicker) {
		$('.date-picker').datepicker({
			rtl : App.isRTL(),
			autoclose: true,
			format:"dd/mm/yyyy"
		});
	}
}

jQuery('#idsubmitData').on('click',function(){
   	FormValidation.init();
});
