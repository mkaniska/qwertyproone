<div id="website_main" class="wrapper">
	<div id="content_login" class="left">
        <div class="post_thanks">
            <h2 style="text-align:center;margin-left:200px;">Thank you !</h2>
            <div class="img_frame img_frame_23_new">
			<span style="margin-top:15px;margin-left:140px;">
				<div id="errorDisplay" style="color:#3FBA32;margin-left:200px;margin-top:50px;float:left;font-weight:bold;">
				<?php if($this->session->flashdata('flash_message') !='') { ?>
					<?php echo $this->session->flashdata('flash_message'); ?>
				<?php } ?> 
				<br /> 	
				<br />
				<?php if($this->session->flashdata('flash_url') !='') { ?>
					<p style="text-align:center;margin-left:-30px;">
						Account activation link has been sent to your email address registered!. Please check that & activate it.
						<!-- <input class="submit_btn float_l" type="button" value="Click Here" onclick="javascript:sendHere('<?php echo $this->session->flashdata('flash_url'); ?>');" /> -->
					</p>
				<?php } ?>
				</div>
			</span>
			</div>
        </div>
    </div> <!-- END of content half -->
    <div class="clear"></div>
	<script></script>
</div>