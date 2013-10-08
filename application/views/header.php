<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CodeIgniter Sample Application</title>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<?php if(in_array($page_name,$this->config->item('is_map_page'))) { ?>
<script type="text/javascript" src="<?php echo base_url();?>js/map.js" ></script>
<?php } ?>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/login.js" ></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/login.css" type="text/css" media="all" />
<?php if(in_array($page_name,$this->config->item('form_pages'))) { ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/jqtransform.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js" ></script>
<style>
		#panel {
		  position: absolute;
		  top: 5px;
		  left: 50%;
		  margin-left: -180px;
		  z-index: 5;
		  background-color: #fff;
		  padding: 5px;
		  border: 1px solid #999;
		}
				#map-canvas, #map_canvas {
		  height: 100%;
		}
		  #map-canvas, #map_canvas {
			height: 650px;
		  }		
</style>
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/tab_jquery-ui.css" />
<script language="javascript">
	$(function(){
		$("form.jqtransform").jqTransform();
		$( "#tabs" ).tabs({
			  beforeActivate: function(event, ui){
				 if(ui.newTab.find("a").attr("href")=='#tabs-2'){/*checkStepOneValidation();*/}
				 else if(ui.newTab.find("a").attr("href")=='#tabs-3'){/*checkStepTwoValidation();*/}
			  }
			 });
		//$( "#tabs" ).tabs({ show: { effect: "blind", duration: 1000 } });
		//$( "#tabs" ).on( "tabsbeforeactivate", function( event, ui ) {alert(ui.newTab.attr('id'));} )
		///$( "#tabs" ).on( "tabsactivate", function( event, ui ) {alert(event);} );
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
		
		/*
		//
		$("#signupForm").validate({
				rules: {
					full_name: {
						required: true,
						minlength: 3,
						maxlength:25
					},
					email_address: {
						required: true,
						email: true
					},
					password_text: {
						required: true,
						minlength: 5
					},					
					re_password_text: {
						required: true,
						minlength: 5,
						equalTo: "#password_text"
					},
					phone_number: {
						required: true,
						minlength: 5
					}					
				},
				messages: {
				
					full_name: {
						required: "Please enter a valid Full Name",
						minlength: "Your Full Name should be at least 5 characters long"
					},
					email_address: {
						required: "Please enter a valid Email Address"
					},
					password_text: {
						required: "Please enter a valid password",
						minlength: "Your password must be at least 5 characters long"
					},					
					re_password_text: {
						required: "Please re-enter a valid password",
						minlength: "Re-typing password must be minimum 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					phone_number: {
						required: "Please enter a valid phone number",
						minlength: "Your Phone number must be at least 5 characters long"
					}
				}
			});		
		// Ends
		*/
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
		if(ok==true){$("#tabs").tabs("option", "active", 1);}
	}
	function checkStepTwoValidation() {
		$("#errorDisplay1").html('');
		var ok = true;
		if($('#travel_type2').attr('checked')?true:false) {
			if($.trim($("#model_type").val())==''){$("#errorDisplay1").html("Please enter the model type");$("#model_type").focus();ok = false;}
		}
		if(ok){$("#tabs").tabs("option", "active", 2);}
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
	/**/
	function refill_cities(stateName) {
		 $.ajax({
			  type: 'POST',
			  url: '<?php echo base_url();?>user/get_cities',
			  beforeSend: function(){  },
			  data: 'state_name='+stateName,
			  dataType: "text",
			  success: function(resultData) {
				  var json_obj = $.parseJSON(resultData);
				  var options =  document.getElementById('city');
				  for (var i=0; i<json_obj.length; i++) {			  
						options[1] = new Option(i, i, true, true);
				  }
			  }
		});		
	}
	function dologin() {
		$("#login_result").html('');
		if($.trim($("#user_name").val())!='' || $.trim($("#password_text").val())!='') {
			 $.ajax({
				  type: 'POST',
				  url: '<?php echo base_url();?>user/processlogin',
				  beforeSend: function(){  },
				  data: 'username='+$("#user_name").val()+'&password='+$("#password_text").val(),
				  dataType: "text",
				  success: function(resultData) {
					  if(resultData=='Success'){
						window.location.href="<?php echo base_url();?>user/welcome";
					  }else{
						$("#login_result").html('Invalid Login Details!');
					  }
				  }
			});
		} else{$("#login_result").html('<br />Enter Your Login Details!');}
	}	
	//onKeyPress="return disableEnterKey(event)"
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
</script>
<?php } ?>
<style type="text/css">
.error{color:#ff0000; display: inline; margin-left: 10px; width: auto;}
</style>
<!-- My Changes to Git -->
</head>
<body>
<div id="templatemo_header_wrapper">

	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1>
				<a href="<?php echo base_url();?>" target="_parent">
                <img src="<?php echo base_url();?>images/logo.png" alt="Web Templates" />
                <span>a training sample</span>
				</a>
			</h1>
        </div>
        
        <a class="header_corel" href="http://cn.onlyimage.com" title="test"  target="_blank"></a>
        
        <div id="search_box">
			<a href="#" id="loginButton"><span>Login</span></a>
			<a href="<?php echo base_url();?>user/signup" id="signupButton"><span>Signup</span></a>
        </div>
            <!-- Login Starts Here -->             
                
			<div style="clear:both"></div>
			<div id="loginBox">                
				<form id="loginForm">
					<fieldset id="body">					
						<div style="float:left;margin-left:10px;margin-bottom:5px;">
							<label for="email">User Name</label> &nbsp; 
							<input type="text" name="user_name" id="user_name" size="32" />
						</div><div style="clear:both"></div>
						<div style="float:left;margin-left:10px;margin-top:5px;">
							<label for="password">Password &nbsp;</label> &nbsp;
							<input type="password" name="password_text" id="password_text" size="20" /> &nbsp;
							<input type="button" id="processLogin" value="Login" />
						</div></br>
						<span style="font-size:11px;color:#ff0000;" id="login_result"></span>
					</fieldset>
				</form>
			</div>
			
            <!-- Login Ends Here -->        
        <div class="cleaner"></div>
	</div><!-- end of header -->