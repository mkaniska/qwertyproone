<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin Panel Template</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/reset.css" media="screen" />  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" media="screen" />  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-css/nav.css" media="screen" />
	
    <!-- BEGIN: load jquery -->
    <script src="<?php echo base_url();?>admin-js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>admin-js/jquery.ui.core.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>admin-js/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>admin-js/jquery.ui.accordion.min.js" type="text/javascript"></script>    
    
    <script src="<?php echo base_url();?>admin-js/jquery.dataTables.min.js" type="text/javascript"></script>    
    <script src="<?php echo base_url();?>admin-js/setup.js" type="text/javascript"></script>
	
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
</head>
<body>
    <div class="container_12">
		<div class="grid_12 header-repeat">
			<div id="branding">
				<div class="floatleft">
					<img src="<?php echo base_url();?>admin-images/logo.png" alt="Logo" /></div>
					<?php $this->load->view('admin/welcome_admin'); ?>
			</div>
		</div>
		<div class="clear"></div>