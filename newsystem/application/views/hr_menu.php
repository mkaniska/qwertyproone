	<div style="vertical-align:top;margin-top:10px;font-weight:bold; color:#fff;float:right;font-size:12px;">
	Welcome <?php echo $this->session->userdata('_user_name');?> [ <a href="<?php echo base_url();?>user/logout">Logout</a> ]
	</div>
	<div id="website_menu" class="ddsmoothmenu">
		<ul>
			<li><a href="<?php echo base_url();?>welcome/home" <?php if($menu=='home')echo 'class="selected"';?>>Home</a></li>
			<li><a href="<?php echo base_url();?>welcome/faq" <?php if($menu=='faq')echo 'class="selected"';?>>FAQ</a></li>
			<li><a href="<?php echo base_url();?>ride/search" <?php if($menu=='search')echo 'class="selected"';?>>Search</a></li>
			<li><a href="<?php echo base_url();?>welcome/contactus" <?php if($menu=='contactus')echo 'class="selected"';?>>Contact Us</a></li>
			<li><a href="<?php echo base_url();?>user/settings" <?php if($menu=='settings')echo 'class="selected"';?>>Settings</a></li>
		</ul>
		<br style="clear: left" />
	</div>