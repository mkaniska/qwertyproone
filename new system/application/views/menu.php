	<div style="vertical-align:top;margin-top:10px;font-weight:bold; color:#fff;float:right;font-size:12px;">
	<?php if($this->session->userdata('_user_id')!='') { ?>
	Welcome <?php echo $this->session->userdata('_user_name');?> [ <a href="<?php echo base_url();?>user/logout">Logout</a> ]
	<?php }else { ?>
		[ <a href="<?php echo base_url();?>user/register" <?php if($menu=='register')echo 'class="selected"';?>>Sign Up</a> / 
		<a href="<?php echo base_url();?>user/login" <?php if($menu=='login')echo 'class="selected"';?>>Login</a> ]
	<?php } ?>
	</div>
	<div id="website_menu" class="ddsmoothmenu">
		<ul>
			<li><a href="<?php echo base_url();?>welcome/home" <?php if($menu=='home')echo 'class="selected"';?>>Home</a></li>
			<!-- <li><a href="<?php echo base_url();?>welcome/aboutus">About Us</a>
				 <ul>
					<li><a href="<?php echo base_url();?>welcome/home">Template Page 1</a></li>
					<li><a href="http://www.templatemo.com/page/2">Template Page 2</a></li>
					<li><a href="http://www.templatemo.com/page/3">Template Page 3</a></li>
					<li><a href="http://www.templatemo.com/page/4">Template Page 4</a></li>
				</ul>
			</li> -->
			<li><a href="<?php echo base_url();?>welcome/services" <?php if($menu=='services')echo 'class="selected"';?>>Services</a></li>
			<li><a href="<?php echo base_url();?>ride/search" <?php if($menu=='search')echo 'class="selected"';?>>Search</a></li>
			<li><a href="<?php echo base_url();?>user/offers" <?php if($menu=='offers')echo 'class="selected"';?>>Offers</a></li>
			<?php if($this->session->userdata('_user_id')=='') { ?>
			<li><a href="<?php echo base_url();?>ride/add" <?php if($menu=='addride')echo 'class="selected"';?>>Post Ride</a></li>
			<li><a href="<?php echo base_url();?>welcome/contactus" <?php if($menu=='contactus')echo 'class="selected"';?>>Contact Us</a></li>
			<?php }else{ ?>
			<li><a href="<?php echo base_url();?>ride/ridelist" <?php if($menu=='ridelist')echo 'class="selected"';?>>Manage Ride</a>
				 <ul>
					<li><a href="<?php echo base_url();?>ride/postride">Post A Ride</a></li>
					<li><a href="<?php echo base_url();?>ride/ridelist">Ride List</a></li>
					<li><a href="<?php echo base_url();?>ride/requestlist">Ride Requests</a></li>
				</ul>
			</li>
			<?php } ?>
			</ul>
		<br style="clear: left" />
	</div>