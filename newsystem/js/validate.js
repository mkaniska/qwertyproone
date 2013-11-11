
//var site_url = 'http://work.ideasdiary.com';
var site_url = 'http://localhost/qwerty/';

function sendHere(toUrl) {
	window.location.href=toUrl;
}
function enableFields(selectedValue){

	if(selectedValue=='passenger'){
		$( "#vehicle").hide();
		$( "#model").hide();
		$( "#fuel").hide();
	}else{
		$( "#vehicle").show();
		$( "#model").show();
		$( "#fuel").show();
	}
}

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

function doLogin() {

	 $.ajax({
		  type: 'POST',
		  url: 'process_login',
		  beforeSend: function(){  },
		  data: 'user_name='+$("#user_name").val()+'&pass_word='+$("#password_value").val(),
		  dataType: "text",
		  success: function(resultData) {
			  if(resultData=='success'){
				window.location.href=site_url+'welcome/home';
			  }else{
				$("#errorDisplay").html('Invalid Login Details Provided!');
				$("#user_name").val('');
				$("#password_value").val('');
			  }
		  }
	});		
}

function validateInfo() {
	if($.trim($("#user_name").val())!=''){
		 $.ajax({
			  type: 'POST',
			  url: 'retrivepassword',
			  beforeSend: function(){  },
			  data: 'user_name='+$("#user_name").val(),
			  dataType: "text",
			  success: function(resultData) {
				  if(resultData=='success'){
					$("#errorDisplay").html('Your Password has been sent to your Email!');
				  }else{
					$("#user_name").val('');
					$("#errorDisplay").html('Invalid Details Given!');
				  }
			  }
		});
	}else{$("#errorDisplay").html('Please Enter Valid Detail !');}
}

function isValidRide(){

	var ok = true;
	if($("#city").val()==0){$("#errorDisplay").html("Please select the city");$("#city").focus();ok = false;}
	else if($("#start_time").val()==0){$("#errorDisplay").html("Please select the Start Time");$("#start_time").focus();ok =  false;}
	else if($("#return_time").val()==0){$("#errorDisplay").html("Please select the Return Time");$("#return_time").focus();ok = false;}
	else if($("#searchTextField").val()==''){$("#errorDisplay").html("Please enter the Origin Location");$("#searchTextField").focus();ok = false;}
	else if($("#searchTextField2").val()==''){$("#errorDisplay").html("Please enter the Destination Location");$("#searchTextField2").focus();ok = false;}
	else if($('#travel_type').val()=='driver') {
		if($.trim($("#model_type").val())==''){$("#errorDisplay").html("Please enter the model type");$("#model_type").focus();ok = false; }
	}
	if(ok==true){return true;}else{return false;}
}

function getMatchingLocation(strVal) {

	if($.trim(strVal)!='' && strVal.length>=3) {
		var addressArray = [];
		 $.ajax({
			  type: 'POST',
			  url: 'matching_places',
			  beforeSend: function(){  },
			  data: 'address_string='+strVal,
			  dataType: "text",
			  success: function(resultData) {
				  var json_obj = $.parseJSON(resultData);
				  if(json_obj.length>0) {
					  for (var i=0; i<json_obj.length; i++) {			  
							addressArray[i]= json_obj[i];
					  }
					  $("#search_address" ).autocomplete( "enable" );
					  $("#search_address").autocomplete({source: addressArray});
				  }else{
					  $("#search_address" ).autocomplete( "enable" );
					  $("#search_address").autocomplete({source: new Array()});
				  }
			  }
		});
	}
}

function findMatchingRides() {
	var city	   = $.trim($("#city").val());
	var address    = $.trim($("#search_address").val());
	var startTime  = $.trim($("#start_time").val());
	var returnTime = $.trim($("#return_time").val());
	var search_for = $.trim($("#travel_type").val());
	if(address!='' && city!='0') {
		 $.ajax({
			  type: 'POST',
			  url: 'matching_rides',
			  beforeSend: function(){$("#searchedResult").html('<img src="'+site_url+'images/ajax_loader.gif" border="0" />'); },
			  data: 'city='+city+'&address='+address+'&startTime='+startTime+'&returnTime='+returnTime+"&search_for="+search_for,
			  dataType: "text",
			  success: function(resultData) {
				    $("#errorDisplay").html("");
					$("#searchedResult").css({'height':'300px'});
					$("#searchedResult").html(resultData);					
			  }
		});
	}else {
		$("#errorDisplay").html("Please enter all the details to search");
	}
}

function sendJoinRequest(selectedID,responseTag) {
	if(selectedID>0) {
		 $.ajax({
			  type: 'POST',
			  url: 'sendrequest',
			  beforeSend: function(){$(responseTag).html('<img src="'+site_url+'images/sending_request.gif" border="0" />'); },
			  data: 'request_ride_id='+selectedID,
			  dataType: "text",
			  success: function(resultData) {
				  //$("#additionalInfo").html(resultData);
					if(resultData=='success') {
						//alert(resultData);
						$(responseTag).html('<img src="'+site_url+'images/sent.gif" border="0" title="Sent Successfully" alt="Sent Successfully" />');
					}else{
						//alert(resultData);
						alert("Error Sending Request!");
						$(responseTag).html('<img src="'+site_url+'images/request.png" border="0" title="Send Request" alt="Send Request" />');
					}
			  }
		});
	}else {
		alert("Invalid Request!");
		//$("#errorDisplay").html("Please enter all the details to search");
	}
}

function confirmRequest(responseID, reqID, stsVAL) {
	if(reqID>0) {
		 $.ajax({
			  type: 'POST',
			  url: 'update_request',
			  beforeSend: function(){$(responseID).html('<img src="'+site_url+'sending_request.gif" border="0" />'); },
			  data: 'request_id='+reqID+'&status='+stsVAL,
			  dataType: "text",
			  success: function(resultData) {
					if(resultData=='success') {
						$(responseID).html('Updated Successfully');
					}else{
						$(responseID).html('Error Request!');
					}
			  }
		});
	}else {
		alert("Invalid Request!");
	}
}

function addIP(){
	$('#dialog').dialog();
}

function isValidIP() {
	$("#iperror").html();
	var ipvals = $("#ip_address").val();
	if(ipvals=='') {
         $("#iperror").html('Please enter the IP Address');
		 return true;
	}else if(!ipvals.match(/^[0-9]+\.?[0-9]*$/)) {
         $("#iperror").html('Please enter Only Number or Dot');
		 return true;
    }else {
		return true;
	}
}
