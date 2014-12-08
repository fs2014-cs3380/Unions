$(document).ready(function(){
	var username = document.getElementById('username');
	createDialog();
	username.focus();
    $("input").keypress(function(event) {
        if (event.which == 13) {
            event.preventDefault();
            loginRedirect();
        }
    });
});

function createDialog(){
	$( "#dialog" ).dialog({
		modal: true,
		autoOpen:false,
		buttons: {
			'Student': function() {
				username.value = "TIGERS\\";
				$(this).dialog('close');
			},
			'Staff': function() {
				username.value = "UMC-USERS\\";
				$(this).dialog('close');
			}
		},
        close: function(){
            $(this).dialog('destroy');
            $(this).css('display', 'none');
        }
	});
}

function openDialog(){
	var username = document.getElementById('username');
    createDialog();
	if(username.value.length == 0){
		$('#dialog').dialog('open');
	}
};

function loginRedirect(){
	$.ajax({
        url: 'includes/login.inc.php',
        dataType: 'html',
        type: 'post',
        data: {action: 'login', username: $('#username').val(), pwd: $('#pwd').val(), checkAjax:true, auth_submit:true, content:'viewItems'},
        success: function(data){
            console.log(data);
            var response = jQuery.parseJSON(data);
            if(response.error.length == 0){
                redirect('login', 'viewItems');
            } else {
                $('.errors').html(response.error);
            }
		}
	});
}

function redirect(form, content){
	document.forms[form].elements['content'].value = content;
	document.forms[form].submit();
}