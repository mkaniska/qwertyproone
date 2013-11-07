<?php 
  /**/
  $menus = $this->config->item('left_menu_navigation');
  if(in_array($page_name,$menus[0])){$tabActive=0;}
  else if(in_array($page_name,$menus[1])){$tabActive=1;}
  else if(in_array($page_name,$menus[2])){$tabActive=2;}
  else if(in_array($page_name,$menus[3])){$tabActive=3;}
  else{$tabActive=4;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin Panel Template</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/reset.css" media="screen" />  
    <?php if($page_name=='admin/login' || $page_name=='admin/ride_list' || $page_name=='admin/company_list' || $page_name=='admin/offer_list' || $page_name=='admin/user_list' || $page_name=='admin/type_list') { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" media="screen" />  
	<?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/nav.css" media="screen" />
    
	
    <!-- BEGIN: load jquery -->
    
    
    <script src="<?php echo base_url();?>admin-js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>admin-js/jquery.ui.core.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>admin-js/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>admin-js/jquery.ui.accordion.min.js" type="text/javascript"></script>    
	
	 
	<?php if($page_name=='admin/addoffer' || $page_name=='admin/edit_offer') { ?>

	<script type="text/javascript" src="<?php echo base_url();?>admin-js/jquery.datePicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>admin-js/date.js"></script>
	
	<!-- datePicker required styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>admin-css/datePicker.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>admin-css/date.css">
	 
	
    <?php } ?>
    <script src="<?php echo base_url();?>admin-js/setup.js" type="text/javascript"></script>
	
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            //$('.datatable').dataTable();
			setSidebarHeight();
			$("#section-menu" ).accordion( "option", "active", <?php echo $tabActive;?>);
			$('#submitbutton').css('cursor', 'pointer');
			$('#cancelbutton').css('cursor', 'pointer');
			<?php if($page_name=='admin/edit_offer') { ?>
			$("#cancelbutton").click(function() {window.location.href='../home';});
			<?php }else { ?>
			$("#cancelbutton").click(function() {window.location.href='home';});
			<?php } ?>
			<?php if($page_name=='admin/addoffer') { ?>
				$('#valid_from').datePicker().val(new Date().asString()).trigger('change');
				$('#valid_to').datePicker().val(new Date().asString()).trigger('change');
			<?php } ?>
			<?php if($page_name=='admin/edit_offer') { ?>
				$('#valid_from').datePicker();
				$('#valid_to').datePicker();
			<?php } ?>
        });
    </script>
</head>
<body>
    <div class="container_12">
		<div class="grid_12 header-repeat">
			<div id="branding">
				<div class="floatleft">
					<img src="<?php echo base_url();?>admin-images/logo.png" alt="Logo" /></div>
					<?php if($this->session->userdata('admin_user_id')!='') { ?>
					<?php $this->load->view('admin/welcome_admin'); ?>
					<?php } else { echo '<p style="margin:55px;"></p>'; } ?>
			</div>
		</div>
		<div class="clear"></div>