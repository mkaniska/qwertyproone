	<div style="vertical-align:top;margin-top:10px;font-weight:bold; color:#fff;float:right;font-size:12px;">
	<?php if($this->session->userdata('_user_id')!='') { ?>
	Welcome <?php echo $this->session->userdata('_user_name');?> [ <a href="<?php echo base_url();?>user/logout">Logout</a> ]
	<?php }else { ?>
		[ <a href="<?php echo base_url();?>user/register" <?php if($menu=='register')echo 'class="selected"';?>>Sign Up</a> / 
		<a href="<?php echo base_url();?>user/login" <?php if($menu=='login')echo 'class="selected"';?>>Login</a> ]
	<?php } ?> &nbsp;
	<a href="<?php echo base_url();?>welcome/contactus" title="Contact Us" alt="Contact Us">
		<img src="<?php echo base_url();?>images/contact.png" title="Contact Us" alt="Contact Us" />
	</a>
	</div>
	<div id="website_menu" class="ddsmoothmenu">
		<ul>
			<li><a href="<?php echo base_url();?>welcome/home" <?php if($menu=='home')echo 'class="selected"';?>>Home</a></li>
			<li><a href="<?php echo base_url();?>welcome/services" <?php if($menu=='services')echo 'class="selected"';?>>Services</a></li>
			<li><a href="<?php echo base_url();?>ride/search" <?php if($menu=='search')echo 'class="selected"';?>>Search</a></li>
			<li><a href="<?php echo base_url();?>user/offers" <?php if($menu=='offers')echo 'class="selected"';?>>Group Cab</a>
				<ul>
					<li><a href="<?php echo base_url();?>user/offers">Search for a Group</a></li>
					<li><a href="<?php echo base_url();?>user/offers">Instant grouping</a></li>
				</ul>			
			</li>
			<li><a href="<?php echo base_url();?>user/offers" <?php if($menu=='offers')echo 'class="selected"';?>>Offers</a>
				<ul>
					<li><a href="<?php echo base_url();?>user/offers">General Offers</a></li>
					<li><a href="<?php echo base_url();?>user/offers">Loan Offers</a></li>
					<li><a href="<?php echo base_url();?>user/offers">Credit Card</a></li>
					<li><a href="<?php echo base_url();?>user/offers">Mobile Plans</a></li>
					<li><a href="<?php echo base_url();?>user/offers">Internet Plans</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url();?>user/discounts" <?php if($menu=='discounts')echo 'class="selected"';?>>Discounts</a></li>
			<?php if($this->session->userdata('_user_id')=='') { ?>
			<li><a href="<?php echo base_url();?>ride/add" <?php if($menu=='addride')echo 'class="selected"';?>>Post Ride</a></li>
			<?php }else{ ?>
			<li><a href="<?php echo base_url();?>ride/ridelist" <?php if($menu=='ridelist')echo 'class="selected"';?>>Manage Ride</a>
				<ul>
					<li><a href="<?php echo base_url();?>ride/postride">Post A Ride</a></li>
					<li><a href="<?php echo base_url();?>ride/ridelist">Ride List</a></li>
					<li><a href="<?php echo base_url();?>ride/requestlist">Ride Requests</a></li>
					<li><a href="<?php echo base_url();?>ride/instantride">Instant Post</a></li>
					<li><a href="<?php echo base_url();?>ride/copassengers">Co-Passengers</a></li>
				</ul>
			</li>
			<?php $total_request = $this->RideModel->get_total_requests(); if($total_request>0) { ?>
			<div id="circle" alt="Join Requests Received" title="Join Requests Received">
				<a href="<?php echo base_url();?>ride/requestlist" style="color:#fff;" alt="Join Requests Received" title="Join Requests Received">
					<?php echo $total_request;?>
				</a>
			</div>
			<?php } ?>
			<div style="float:right;padding-right:10px;padding-left:20px;">
				<a href="<?php echo base_url();?>ride/instantride">
					<img align="absmiddle" border="0" src="<?php echo base_url();?>images/clock.png" alt="Add Instant Post" title="Add Instant Post" />
				</a>
			</div>
			<?php if($this->RideModel->get_total_instant_rides()>0) { ?>
			<div style="float:right;padding-right:10px;padding-left:20px;">
				<a href="<?php echo base_url();?>ride/instantridelist">
					<img align="absmiddle" border="0" src="<?php echo base_url();?>images/notify.png" alt="View Instant Post" title="View Instant Post" />
				</a>
			</div>
			<?php } ?>			
			<?php } ?>
			</ul>
		<br style="clear: left" />
	</div>