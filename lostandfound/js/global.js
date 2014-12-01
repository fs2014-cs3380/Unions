function logoutRedirect(){
		$.ajax({
		url: 'includes/logout.inc.php',
		success: function(data){
			redirect('nav_form', 'viewItems');			
		},
		error: function(request, status, error){
			console.log(request);
			if(error == "Bad Request"){
			alert('Error');
			}
		}
	});
}

function showClaimedItems(action){
	$('#'+action).modal('show');
}

function redirect(form, content){
	document.forms[form].elements['content'].value = content;
	document.forms[form].submit();
}

function formSubmit(form, action){
	document.forms[form].elements['content'].value = action;
	document.forms[form].submit();
}