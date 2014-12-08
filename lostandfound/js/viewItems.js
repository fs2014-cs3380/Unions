function editDatabase(form, pk, action){
	document.forms[form].elements['pk'].value = pk;
	document.forms[form].elements['action'].value = action;
	document.forms[form].submit();
}
function logoutRedirect()
{
	alert('test');
}	

$(document).on("click", ".open-editItemModal", function () {
	var description = $(this).data('description');
    var id = $(this).data('id');
	var status = $(this).data('status');
    $(".modal-body #id").val( id );
    $(".modal-body #description").val( description );
	$(".modal-body #status").val( status );
	$('.modal-body > select > option[value="'+status+'"]').val();

});

function checkItemStatus(){
	var hiddenDiv = document.getElementById("claim-form");
	var select = document.getElementById("status");
	hiddenDiv.style.display = (select.options[select.selectedIndex].text == "Claimed") ? "block":"none";
}

//testing with ajax
function updateRecord(id, status_id, first_name, last_name, email, description){
	var value=document.forms["update"]["status"].value;
	var email_check=document.forms["update"]["email"].value;
	var atpos=email_check.indexOf("@");
	var dotpos=email_check.lastIndexOf(".");
	var fname=document.forms["update"]["first_name"].value;
	var lname=document.forms["update"]["last_name"].value;
	if(value==2){
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email_check.length)
		  {
			  alert("Not a valid e-mail address");
			  return false;
		  }
		else if (email_check==null || email_check=="" || fname==null || fname=="" || lname==null || lname=="")
		  {
			  alert(value);
			  return false;
		  }
		else{ 	
		$.ajax({
		url: 'includes/update.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'edit', id:$('#'+id).val(), status_id:$('#'+status_id).val(), first_name:$('#'+first_name).val(), last_name:$('#'+last_name).val(), email:$('#'+email).val(), description:$('#'+description).val(), ajax:true, edit_record:true},
		success: function(data){
			redirect('update', 'viewItems');			
		},
		error: function(request, status, error){
			console.log(request);
			if(error == "Bad Request"){
			alert('Error');
			}
		}
		});
		}
	}
	else{
		$.ajax({
		url: 'includes/update.inc.php',
		dataType: 'html',
		type: 'post',
		data: {action: 'edit', id:$('#'+id).val(), status_id:$('#'+status_id).val(), first_name:$('#'+first_name).val(), last_name:$('#'+last_name).val(), email:$('#'+email).val(), description:$('#'+description).val(), ajax:true, edit_record:true},
		success: function(data){
			redirect('update', 'viewItems');			
		},
		error: function(request, status, error){
			console.log(request);
			if(error == "Bad Request"){
			alert('Error');
			}
		}
	});
	}
}
