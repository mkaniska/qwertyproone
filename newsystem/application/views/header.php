<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<!-- Drop Down Menu related JS & CSS Files --> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/ddsmoothmenu.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/ddsmoothmenu.js"></script>

<!-- Blue Buttons related JS & CSS Files --> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/buttons.css" />

<!-- jQuery Library Loading --> 
<!-- <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>-->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<!-- Google Map related JS & CSS Files -->
<?php if($page_name=='ride/add' || $page_name=='ride/postride' || $page_name=='ride/edit') { ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/map.js"></script>
<?php } ?>
<!-- Tab based form related JS & CSS Files --> 
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/tab_jquery-ui.css" />
<?php if($page_name=='ride/add') { ?>
<script>
$(function(){
	$( "#tabs" ).tabs({
						beforeActivate: function(event, ui){
							if(ui.newTab.find("a").attr("href")=='#tabs-2'){ /*checkStepOneValidation(); */}
							else if(ui.newTab.find("a").attr("href")=='#tabs-3'){ /*checkStepTwoValidation(); */}
						}
					});
	$( "#tabs" ).tabs( "option", "disabled", [ 1,2 ] );
});
</script>
<?php } ?>
<?php if($page_name=='ride/add' || $page_name=='ride/edit') { ?>
<script>
$(function(){
	$( "#tabs" ).tabs();
});
</script>
<?php } ?>
<!-- Initialize the Drop Down Menu --> 
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "website_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
</script>
<!-- Document On loading JS function initialization --> 
<script src="<?php echo base_url();?>js/init.js"></script>
<!-- All the JS form validations are available here --> 
<script src="<?php echo base_url();?>js/validate.js"></script>
</head>
<body>
<div id="website_header_wrapper">
	<div id="website_header" class="wrapper">
    	<div id="site_title"><a href="<?php echo base_url();?>welcome/home">CodeIgniter Sample Application</a></div>
		<!-- start of website_menu -->
			<?php $this->load->view('menu'); ?>
        <!-- end of website_menu -->
    </div>
</div>