
        <div id="templatemo_banner">
        
   			<h3>Thank You !</h3>
            
            <p>In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. Cras purus libero, dapibus nec rutrum in, dapibus nec risus.</p>

        </div>

</div> <!-- end of header_wrapper -->

<div id="templatemo_content_wrapper_outer">
<div id="templatemo_content_wrapper_inner">
<div id="templatemo_content_wrapper">

    <div id="templatemo_content">
    
    	<div class="post_section">
		
           <h2>Thanks for Contacting Us !</h2>
            
            <div class="post_content">
				<?php if($this->session->flashdata('flash_message')!='') { ?>
					<?php echo $this->session->flashdata('flash_message'); ?>
				<?php }else { ?>
					<script> window.location.href='<?php echo base_url();?>welcome/home'; </script>
				<?php } ?>
				Our Administrator will contact you via Email or Phone with more details. !..
            </div>
            
        </div>
    
    </div> <!-- end of templatemo_content -->
        
    <?php $this->load->view('sidebar'); ?>		

	<div class="cleaner"></div>
</div>
</div>
</div>