
function redirect(form, content){
	document.forms[form].elements['content'].value = content;
	document.forms[form].submit();
}