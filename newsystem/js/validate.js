function disableEnterKey(e)
{
	 var key;
	 if(window.event)
		  key = window.event.keyCode;     //IE
	 else
		  key = e.which;     //firefox
	 if(key == 13)
		  return false;
	 else
		  return true;
}

function checkStepOneValidation() {
	$("#errorDisplay").html('');
	var ok = true;
	if($("#city").val()==0){$("#errorDisplay").html("Please select the city");$("#city").focus();ok = false;}
	else if($("#start_time").val()==0){$("#errorDisplay").html("Please select the Start Time");$("#start_time").focus();ok = false;}
	else if($("#return_time").val()==0){$("#errorDisplay").html("Please select the Return Time");$("#return_time").focus();ok = false;}
	else if($("#searchTextField").val()==''){$("#errorDisplay").html("Please enter the Origin Location");$("#searchTextField").focus();ok = false;}
	else if($("#searchTextField2").val()==''){$("#errorDisplay").html("Please enter the Destination Location");$("#searchTextField2").focus();ok = false;}
	if(ok==true){	
		$( "#tabs" ).tabs( "enable", 1 );$("#tabs").tabs("option", "active", 1);
	}
}

function checkStepTwoValidation() {
	$("#errorDisplay1").html('');
	var ok = true;
	if($('#travel_type2').attr('checked')?true:false) {
		if($.trim($("#model_type").val())==''){$("#errorDisplay1").html("Please enter the model type");$("#model_type").focus();ok = false;}
	}
	if(ok){$( "#tabs" ).tabs( "enable", 2 );$("#tabs").tabs("option", "active", 2);}
}

function checkStepThreeValidation() {
	$("#errorDisplay2").html('');
	var ok = true;
	if($.trim($("#full_name").val())==''){$("#errorDisplay2").html("Please enter a valid full name");$("#full_name").focus();ok = false;}
	else if($.trim($("#email_address").val())==''){$("#errorDisplay2").html("Please enter a valid email address");$("#email_address").focus();ok = false;}
	else if($("#password_text").val()==''){$("#errorDisplay2").html("Please enter the password");$("#password_text").focus();ok = false;}
	else if($("#re_password_text").val()==''){$("#errorDisplay2").html("Please re-enter the password");$("#re_password_text").focus();ok = false;}
	else if($("#password_text").val()!=$("#re_password_text").val()){$("#errorDisplay2").html("Passwords are not matching");$("#re_password_text").focus();ok = false;}
	else if($.trim($("#phone_number").val())==''){$("#errorDisplay2").html("Please enter a valid phone number");$("#phone_number").focus();ok = false;}
	else if($.trim($("#address").val())==''){$("#errorDisplay2").html("Please enter a valid address");$("#address").focus();ok = false;}
	else if($.trim($("#zipcode").val())==''){$("#errorDisplay2").html("Please enter a valid zip code");$("#zipcode").focus();ok = false;}
	if(ok==true)
		return finalValidationOnRide();
	else
		return false;
}

function finalValidationOnRide() {
	
	var ok1 = true;
	var ok2 = true;
	var ok3 = true;

	/* Activate 1st Tab */
	if($("#city").val()==0){$("#errorDisplay").html("Please select the city");$("#city").focus();ok1 = false;}
	else if($("#start_time").val()==0){$("#errorDisplay").html("Please select the Start Time");$("#start_time").focus();ok1 =  false;}
	else if($("#return_time").val()==0){$("#errorDisplay").html("Please select the Return Time");$("#return_time").focus();ok1 = false;}
	else if($("#searchTextField").val()==''){$("#errorDisplay").html("Please enter the Origin Location");$("#searchTextField").focus();ok1 = false;}
	else if($("#searchTextField2").val()==''){$("#errorDisplay").html("Please enter the Destination Location");$("#searchTextField2").focus();ok1 = false;}

	/* Activate 2nd Tab */
	else if($('#travel_type2').attr('checked')?true:false) {
		if($.trim($("#model_type").val())==''){$("#errorDisplay1").html("Please enter the model type");$("#model_type").focus();ok2 = false; }
	}
	
	/* Activate 3rd Tab */
	else if($.trim($("#full_name").val())==''){$("#errorDisplay2").html("Please enter a valid full name");$("#full_name").focus();ok3 = false;}
	else if($.trim($("#email_address").val())==''){$("#errorDisplay2").html("Please enter a valid email address");$("#email_address").focus();ok3 = false;}
	else if($("#password_text").val()==''){$("#errorDisplay2").html("Please enter the password");$("#password_text").focus();ok3 = false;}
	else if($("#re_password_text").val()==''){$("#errorDisplay2").html("Please re-enter the password");$("#re_password_text").focus();ok3 = false;}
	else if($("#password_text").val()!=$("#re_password_text").val()){$("#errorDisplay2").html("Passwords are not matching");$("#re_password_text").focus();ok3 = false;}
	else if($.trim($("#phone_number").val())==''){$("#errorDisplay2").html("Please enter a valid phone number");$("#phone_number").focus();ok3 = false;}
	else if($.trim($("#address").val())==''){$("#errorDisplay2").html("Please enter a valid address");$("#address").focus();ok3 = false;}
	else if($.trim($("#zipcode").val())==''){$("#errorDisplay2").html("Please enter a valid zip code");$("#zipcode").focus();ok3 = false;}

	//alert(ok1+' '+ok2+' '+ok3);
	var allrite = true;
	if(ok1==false){$("#tabs").tabs("option", "active", 0); allrite = false; }
	else if(ok2==false){$("#tabs").tabs("option", "active", 1); allrite = false; }
	else if(ok3==false){$("#tabs").tabs("option", "active", 2); allrite = false; }
	if(allrite == false){return false;}else{return true;}
}

function isValidSignup() {
	
	$("#errorDisplay").html('');
	var ok = true;
	if($.trim($("#full_name").val())==''){$("#errorDisplay").html("Please enter a valid full name");$("#full_name").focus();ok = false;}
	else if($.trim($("#email_address").val())==''){$("#errorDisplay").html("Please enter a valid email address");$("#email_address").focus();ok = false;}
	else if($("#password_text").val()==''){$("#errorDisplay").html("Please enter the password");$("#password_text").focus();ok = false;}
	else if($("#re_password_text").val()==''){$("#errorDisplay").html("Please re-enter the password");$("#re_password_text").focus();ok = false;}
	else if($("#password_text").val()!=$("#re_password_text").val()){$("#errorDisplay").html("Passwords are not matching");$("#re_password_text").focus();ok = false;}
	else if($.trim($("#phone_number").val())==''){$("#errorDisplay").html("Please enter a valid phone number");$("#phone_number").focus();ok = false;}
	else if($.trim($("#address").val())==''){$("#errorDisplay").html("Please enter a valid address");$("#address").focus();ok = false;}
	else if($.trim($("#zipcode").val())==''){$("#errorDisplay").html("Please enter a valid zip code");$("#zipcode").focus();ok = false;}
	return ok;
	
}
function isValidContact() {
	$("#errorDisplay").html('');
	var ok = true;
	if($.trim($("#subject").val())==''){$("#errorDisplay").html("Please enter a valid subject");$("#subject").focus();ok = false;}
	else if($.trim($("#full_name").val())==''){$("#errorDisplay").html("Please enter a valid full name");$("#full_name").focus();ok = false;}
	else if($.trim($("#email_address").val())==''){$("#errorDisplay").html("Please enter a valid email address");$("#email_address").focus();ok = false;}
	else if($.trim($("#phone_number").val())==''){$("#errorDisplay").html("Please enter a valid phone number");$("#phone_number").focus();ok = false;}
	else if($.trim($("#message_text").val())==''){$("#errorDisplay").html("Please enter a valid message");$("#message_text").focus();ok = false;}
	return ok;
}
