<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CodeIgniter</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/buttons.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/ddsmoothmenu.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/map.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/tab_jquery-ui.css" />

<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "website_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
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
$(function(){
	$( "#tabs" ).tabs({
		  beforeActivate: function(event, ui){
			 if(ui.newTab.find("a").attr("href")=='#tabs-2'){/*checkStepOneValidation();*/}
			 else if(ui.newTab.find("a").attr("href")=='#tabs-3'){/*checkStepTwoValidation();*/}
		  }
		 });
		 $( "#tabs" ).tabs( "option", "disabled", [ 1,2 ] );
		 
		$( "#next1" ).click(function() {
			checkStepOneValidation();
		});
		$( "#next2" ).click(function() {
			checkStepTwoValidation();
		});
		
		$( "#doSignup" ).click(function() {
			isValidSignup();
		});
		$( "#doContact" ).click(function() {
			isValidContact();
		});
		$( "#processLogin" ).click(function() {
			dologin();
		});		
		
		
		$( "#submitride" ).click(function() {
			checkStepThreeValidation();
		});
		$( "#travel_type1" ).click(function() {
			$( "#vehicle" ).hide();$( "#model" ).hide();$( "#fuel" ).hide();
		});
		$( "#travel_type2" ).click(function() {
			$( "#vehicle" ).show();$( "#model" ).show();$( "#fuel" ).show();
		});	
});

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
		else if($("#password").val()==''){$("#errorDisplay2").html("Please enter the password");$("#password").focus();ok = false;}
		else if($("#re_password").val()==''){$("#errorDisplay2").html("Please re-enter the password");$("#re_password").focus();ok = false;}
		else if($("#password").val()!=$("#re_password").val()){$("#errorDisplay2").html("Passwords are not matching");$("#re_password").focus();ok = false;}
		else if($.trim($("#phone_number").val())==''){$("#errorDisplay2").html("Please enter a valid phone number");$("#phone_number").focus();ok = false;}
		else if($.trim($("#address").val())==''){$("#errorDisplay2").html("Please enter a valid address");$("#address").focus();ok = false;}
		if(ok==true){$("#postride" ).submit();}
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
		if(ok==true){$("#signupForm" ).submit();}
	}
	function isValidContact() {
		$("#errorDisplay").html('');
		var ok = true;
		if($.trim($("#full_name").val())==''){$("#errorDisplay").html("Please enter a valid full name");$("#full_name").focus();ok = false;}
		else if($.trim($("#email_address").val())==''){$("#errorDisplay").html("Please enter a valid email address");$("#email_address").focus();ok = false;}
		else if($.trim($("#phone_number").val())==''){$("#errorDisplay").html("Please enter a valid phone number");$("#phone_number").focus();ok = false;}
		else if($.trim($("#message_text").val())==''){$("#errorDisplay").html("Please enter a valid message");$("#message_text").focus();ok = false;}
		if(ok==true){$("#contactForm" ).submit();}
	}
</script>
</head>
<body>
<div id="website_header_wrapper">
	<div id="website_header" class="wrapper">
    	<div id="site_title"><a href="#">CodeIgniter Sample Application</a></div>
		<!-- start of website_menu -->
			<?php $this->load->view('menu'); ?>
        <!-- end of website_menu -->
    </div>
</div>