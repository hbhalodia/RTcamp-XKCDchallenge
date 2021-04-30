function isValidEmail(msg){
	var regular_expression = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	var email_value = document.getElementById('validateEmail').value;
	if(email_value==""){
		document.getElementById('error').innerHTML="";
		document.getElementById('register').disabled=true;
		return true;
	}
	if(regular_expression.test(email_value)){
		document.getElementById('error').innerHTML="";
		document.getElementById('register').disabled=false;
		return true;
	}
	else{
		document.getElementById('error').innerHTML=msg;
		document.getElementById('register').disabled=true;
		return false;
	}
}

function isValueorNot(){
	var email_value = document.getElementById('validateEmail').value;
	if(email_value==""){
		document.getElementById('register').disabled=true;
	}
}