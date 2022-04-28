	function fun_close() {
    $(".btn-add-client").button('reset');	
		$("#sampleForm")[0].reset();
		$('button[name=temp]').val('Add');
		$('input[name=Editid]').val('');
		$('#update_close').hide();

		//$('#intSisterID').val('');
		$('#strSmallHeader').val('');
		$('#strTopHeader').val('');
		$('#strDescription').val('');
		$('#strShortLink').val('');
		
		$('#file').addClass('required');
		$('#imgpreview').hide();
		$('#preview').html('');
	}

(function(){
  	"use strict";

	$.validator.setDefaults({
		submitHandler: function() {
			form_submit();
		}
	});
	$().ready(function() {
		$("#sampleForm").validate();
	});


	
	function form_submit() {
		var temp = $('button[name=temp]').val();
		$(".btn-add-client").button('loading');
		var datastring = $("#sampleForm").serialize() + "&temp=" + temp;
		$.ajax({
			type: "POST",
			url: "submit/dbt_slider_submit.php",
			data: datastring,
			success: function(data) {
				var obj = $.parseJSON(data);
				if (obj.success == '1') {
					$.notify("Slider information added successfully", "success");
					
					fun_close();
					$('.nav-tabs a[href="#tab_list"]').tab('show');
					table.ajax.reload();
					$(".btn-add-client").button('reset');
				} else if (obj.success == '2') {
					$.notify("Slider information updated successfully", "success");
					
					fun_close();
					$('.nav-tabs a[href="#tab_list"]').tab('show');
					table.ajax.reload();
					$(".btn-add-client").button('reset');
					$('#update_close').hide();
				} else if (obj.error == '3') {
					$.notify("Slider information exists!", "error");
					
					$(".btn-add-client").button('reset');
				} else {
					$.notify("Unable to save. Please try again!", "error");
					
					$(".btn-add-client").button('reset');
				}
			},
			error: function() {
				alert('error handling here');
			}
		});
		return false;
	}
	
	var table = $("#tbl-client").DataTable({
		"ajax": "get_view.php?table_name=dbt_slider&unique_id=intSliderID",
		"deferRender": true,
		"order": [
			[1, "asc"]
		],
		"columns": [
		{
			"data": null,
			"width": "2px"
		},  
		{
			"data": "photo"
		},
		{
			"data": "strSmallHeader"
		},
		{
			"data": "editButton"
		},
		],
		"fnInitComplete": function() {
			$(".dataTables_wrapper").find("select,input").addClass("form-control");
			$(".table").css("width", "100%");
		}
	});

	table.on('draw.dt', function() {
		table.column(0, {
			search: 'applied',
			order: 'applied',
			length: 'applied'
		}).nodes().each(function(cell, i) {
			i= i + 1;
			cell.innerHTML = i;
		});
	});
	
	$('#tbl-client').on('click', '#btn-edit', function() {
		var ids = $(this).data('temp').replace('Edit-', '');
		var temp = 'Edit';
		swal({
			title: 'Do you want to edit?',
			text: "",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',cancelButtonText: "No",
		}).then(function(isConfirm) {
			if (isConfirm) {
				$('#update_close').show();
				$.getJSON("get_view.php?table_name=dbt_slider&unique_id=intSliderID&unique_row=rhdDivisionName&Editid=" + ids, function(data) {
					$("#sampleForm")[0].reset();
					$('button[name=temp]').val(temp);

					$('#intSisterID').val(data.intSisterID);
					$('#strSmallHeader').val(data.strSmallHeader);
					$('#strTopHeader').val(data.strTopHeader);
					$('#strDescription').val(data.strDescription);
					$('#strShortLink').val(data.strShortLink);
					
					$('#file').removeClass('required');
					
					$('#imgpreview').attr('src','../cdn/partner/thumbs/small'+data.photo);

					$('input[name=Editid]').val(ids);
				});
				$('.nav-tabs a[href="#form"]').tab('show');
			}
		});
	});
	
	$('#tbl-client').on('click', '#btn-delete', function() {
		if (confirm('Do you want to Delete?')) {
			var id = $(this).data('temp').replace('Delete-', '');
$('.btn-delete-'+id).button('loading');
			$.post("submit/delete.php?id=" + id + "&table=dbt_slider&unique_id=intSliderID", function(response) {
				var obj = $.parseJSON(response);
				if (obj.success == '1') {
					$.notify("Data Deleted successfully", "success");
					table.ajax.reload();
				} else if (obj.error == '1') {
					$('.btn-delete-'+id).button('reset');
$.notify("You have to shift all data associated with it before deletion!", "error");
				} else {
					$('.btn-delete-'+id).button('reset');
$.notify("Unable to delete. Please try again!", "error");
				}
			});
		}
	});
	
})();