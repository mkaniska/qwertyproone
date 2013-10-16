	<div id="website_menu" class="ddsmoothmenu">
		<ul>
			<li><a href="<?php echo base_url();?>welcome/home" <?php if($menu=='home')echo 'class="selected"';?>>Home</a></li>
			<!--<li><a href="<?php echo base_url();?>welcome/aboutus">About Us</a>
				 <ul>
					<li><a href="<?php echo base_url();?>welcome/home">Template Page 1</a></li>
					<li><a href="http://www.templatemo.com/page/2">Template Page 2</a></li>
					<li><a href="http://www.templatemo.com/page/3">Template Page 3</a></li>
					<li><a href="http://www.templatemo.com/page/4">Template Page 4</a></li>
				</ul>
			</li>-->
			<li><a href="<?php echo base_url();?>welcome/faq" <?php if($menu=='faq')echo 'class="selected"';?>>FAQ</a></li>
			<li><a href="<?php echo base_url();?>ride/add" <?php if($menu=='addride')echo 'class="selected"';?>>Post Ride</a></li>
			<li><a href="<?php echo base_url();?>welcome/contactus" <?php if($menu=='contactus')echo 'class="selected"';?>>Contact Us</a></li>
			<?php if($this->session->userdata('_user_id')=='') { ?>
			<li><a href="<?php echo base_url();?>user/register" <?php if($menu=='register')echo 'class="selected"';?>>Sign Up</a></li>
			<li><a href="<?php echo base_url();?>user/login">Login</a></li>
			<?php }else{ ?>
			<li><a href="<?php echo base_url();?>user/logout">Logout</a></li>
			<?php } ?>
		</ul>
		<br style="clear: left" />
	</div>