function approveItem(type){
		var values = new Array();
		$.each($("input[name='type_id[]']:checked"), function() {
		  values.push($(this).val());
		});
		$.ajax({
		url: 'includes/showPendingItems.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'approve', type_id: values, ajax:true, approve:true},
		//data: {action: 'approve', type_id: '62', ajax:true, approve:true},
		success: function(data){
			redirect('pending_form', 'showPendingItems');			
		},
		error: function(request, status, error){
			console.log(request);
			if(error == "Bad Request"){
			alert('Error');
			}
		}
	});

}

function declineItem(type){
		var values = new Array();
		$.each($("input[name='type_id[]']:checked"), function() {
		  values.push($(this).val());
		});
		$.ajax({
		url: 'includes/showPendingItems.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'decline', type_id: values, ajax:true, decline:true},
		success: function(data){
			redirect('pending_form', 'showPendingItems');			
		},
		error: function(request, status, error){
			console.log(request);
			if(error == "Bad Request"){
			alert('Error');
			}
		}
	});

}

$(document).ready(function() {
    $('.check_checkbox').click(function(event) {
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});

