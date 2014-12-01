function UpdateRecord(pk)
{
	var value=document.forms["update"]["status_id"].value;
	var email=document.forms["update"]["email"].value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	var fname=document.forms["update"]["first_name"].value;
	var lname=document.forms["update"]["last_name"].value;
	if(value==2){
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
		  {
			  alert("Not a valid e-mail address");
			  return false;
		  }
		else if (email==null || email=="" || fname==null || fname=="" || lname==null || lname=="")
		  {
			  alert(value);
			  return false;
		  }
		else{ 
		document.forms['update'].elements['pk'].value = pk;
		document.forms['update'].submit();
		}
	}
	else{
		document.forms['update'].elements['pk'].value = pk;
		document.forms['update'].submit();
	}
}
function checkItemStatus(){
	var hiddenDiv = document.getElementById("claim-form");
	var select = document.getElementById("status_id");
	hiddenDiv.style.display = (select.options[select.selectedIndex].text == "Claimed") ? "block":"none";
}