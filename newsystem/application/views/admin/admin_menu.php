	<div style="vertical-align:top;margin-top:10px;font-weight:bold; color:#fff;float:right;font-size:12px;">
	Welcome <?php echo $this->session->userdata('admin_user_name');?> [ <a href="<?php echo base_url();?>admin/logout">Logout</a> ]
	</div>
	<div id="website_menu" class="ddsmoothmenu">
		<ul>
			<li><a href="#">Offers</a>
				 <ul>
					<li><a href="<?php echo base_url();?>admin/addoffer">Add Offers</a></li>
					<li><a href="<?php echo base_url();?>admin/offer_list">List Offers</a></li>
					<li><a href="<?php echo base_url();?>admin/offerhistory">Offer History</a></li>
				</ul>			
			</li>
			<li><a href="#">Companies</a>
				 <ul>
					<li><a href="<?php echo base_url();?>admin/company_list">List Companies</a></li>
					<li><a href="<?php echo base_url();?>admin/addcompany">Add New Company</a></li>
					<li><a href="<?php echo base_url();?>admin/addhradmin">Add New HR User</a></li>
				</ul>
			</li>
			<li><a href="#">Commuters</a>
				 <ul>
					<li><a href="<?php echo base_url();?>admin/user_list">List Commuters</a></li>
					<li><a href="<?php echo base_url();?>admin/ride_list">List Rides</a></li>
				</ul>
			</li>
		</ul>
		<br style="clear: left" />
	</div>