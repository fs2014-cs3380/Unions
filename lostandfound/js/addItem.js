$(function() {
	$( "#datepicker" ).datepicker();
});

function addType(input_id, update_id){
	$.ajax({
		url: 'includes/addItem.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'add_item_type', item_type: $('#'+input_id).val(), ajax:true, content:'addItem'},
		success: function(data){
			$('#item_types').html(data);
			$('#add_item_type').modal('hide');
		},
		error: function(request, status, error){
			if(error == "Bad Request"){
				$('<div class="error">Duplicate Item Type</div>').insertBefore('#add_item_type #item_type');
			}
		}
	});
	
}

function addItem(form, action){
	$('#add_item_type').modal('show');
}

function addRecord(type_id, location, found_user, datepicker, description){
	$.ajax({
		url: 'includes/addItem.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'register', type_id:$('#'+type_id).val(), description: $('#'+description).val(), location: $('#'+location).val(), found_user: $('#'+found_user).val(),date_found: $('#'+datepicker).val(),ajax:true, submit_record:true},
		success: function(data){
			redirect('register', 'viewItems');			
		}
	});

}