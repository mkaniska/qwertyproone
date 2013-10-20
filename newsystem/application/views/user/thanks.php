<div id="website_main" class="wrapper">
	<div id="content_login" class="left">
        <div class="post">
            <h2 style="text-align:center;margin-left:200px;">Thank you !</h2>
            <div class="img_frame img_frame_23_new">
			<span style="margin-top:15px;margin-left:140px;">
				<div id="errorDisplay" style="color:#3FBA32;margin-left:50px;margin-top:50px;float:left;font-weight:bold;">
				<?php if($this->session->flashdata('flash_message') !='') { ?>
					<?php echo $this->session->flashdata('flash_message'); ?>
				<?php } ?> <br />
				<?php if($this->session->flashdata('flash_url') !='') { ?>
					<p style="text-align:center;margin-left:-50px;">
						<input class="submit_btn float_l" type="button" value="Click Here" onclick="javascript:sendHere('<?php echo $this->session->flashdata('flash_url'); ?>');" />
					</p>
				<?php } ?>
				</div>
			</span>
			</div>
        </div>
    </div> <!-- END of content half -->
    <!-- START of sidebar -->
	<?php //$this->load->view('sidebar_login'); ?>
    <!-- END of sidebar -->
    <div class="clear"></div>
	<script></script>
</div>