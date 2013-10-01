<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CodeIgniter Sample Application</title>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/map.js" ></script>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/login.js" ></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/login.css" type="text/css" media="all" />
<?php if(in_array($page_name,$this->config->item('form_pages'))) { ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/jqtransform.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jqtransform.js" ></script>
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
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/tabcontent.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/tabcontent.js"></script>
	
<script language="javascript">	
	$(function(){
		$("form.jqtransform").jqTransform();
	});	
	function refill_cities(stateName){
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
</script>
<?php } ?>
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
							<input type="password" name="password" id="password" size="20" /> &nbsp;
							<input type="button" value="Login" />
						</div></br>
						<span style="font-size:11px;color:#ff0000;" id="login_result">Invalid Details Entered!</span>
					</fieldset>
				</form>
			</div>
			
            <!-- Login Ends Here -->        
        <div class="cleaner"></div>
	</div><!-- end of header -->