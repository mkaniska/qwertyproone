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
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<!-- Google Map related JS & CSS Files -->
<?php if($page_name=='ride/add' || $page_name=='ride/postride' || $page_name=='ride/edit' || $page_name=='ride/instantride') { ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/map.js"></script>
<?php } ?>
<!-- Tab based form related JS & CSS Files --> 
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/tab_jquery-ui.css" />

<?php if($page_name=='welcome/home') { ?>
<link href="<?php echo base_url();?>css/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>js/js-image-slider.js" type="text/javascript"></script>
<?php } ?>

<?php if($page_name=='ride/add') { ?>
<script>
$(function(){
	$( "#tabs" ).tabs({
						beforeActivate: function(event, ui){
							if(ui.newTab.find("a").attr("href")=='#tabs-2'){  }
							else if(ui.newTab.find("a").attr("href")=='#tabs-3'){  }
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
	//customtheme: [ "#18374a","#1c5a80"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
</script>
<!-- Document On loading JS function initialization --> 
<script src="<?php echo base_url();?>js/init.js"></script>
<!-- All the JS form validations are available here -->
<script src="<?php echo base_url();?>js/validate.js"></script>

<!-- For Advertisement 
<script src="<?php echo base_url();?>js/ads.js"></script>-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/custom.css" />
 <script>
$(function() {
$( "#accordion" ).accordion({heightStyle: "content"});
//$( "#accordion" ).accordion( "option", "collapsible", true );
});
</script>
</head>
<body>
<div id="website_header_wrapper">
	<div id="website_header" class="wrapper">
    	<div id="site_title"><a href="<?php echo base_url();?>welcome/home">CodeIgniter Sample Application</a></div>
		<!-- start of website_menu -->
			<?php if($this->session->userdata('_user_type')==3) { ?>
			<?php $this->load->view('hr_menu'); ?>
			<?php }else { ?>
			<?php $this->load->view('menu'); ?>
			<?php } ?>
        <!-- end of website_menu -->
    </div>
</div>