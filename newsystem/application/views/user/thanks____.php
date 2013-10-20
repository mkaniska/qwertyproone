<div id="website_main" class="wrapper">
<h3>Thank you !</h3>
	<div id="content" class="left">
       <div id="contact_form">
		
           <form method="post" name="registration_form" action="<?php echo base_url();?>user/process_signup" onsubmit="return isValidSignup();">
		   
			
            </form>
        </div>

    </div> <!-- END of content half -->
    <!-- START of sidebar -->
	<?php $this->load->view('sidebar'); ?>
    <!-- END of sidebar -->
    <div class="clear"></div>
</div>