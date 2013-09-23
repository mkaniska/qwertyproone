<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CodeIgniter Sample Application</title>
<meta name="keywords" content="multi layer, free website templates, XHTML CSS" />
<meta name="description" content="Multi Layer - free website template provided by templatemo.com" />
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
<?php if(in_array($page_name,$this->config->item('form_pages'))) { ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/jqtransform.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jqtransform.js" ></script>
<script language="javascript">	
	$(function(){
		$("form.jqtransform").jqTransform();
	});
</script>
<?php } ?>
<!-- My Changes to Git -->
</head>
<body>
<div id="templatemo_header_wrapper">

	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1>
				<a href="http://www.templatemo.com" target="_parent">
                <img src="<?php echo base_url();?>images/logo.png" alt="Web Templates" />
                <span>a training sample</span>
				</a>
			</h1>
        </div>
        
        <a class="header_corel" href="http://cn.onlyimage.com" title="test"  target="_blank"></a>
        
        <div id="search_box">
			Signup |  Login 
        </div>
        
        <div class="cleaner"></div>
	</div><!-- end of header -->