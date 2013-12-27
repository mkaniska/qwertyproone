<div id="website_main" class="wrapper" style="margin-bottom:10px;min-height:370px;">
	<div>
	<form action="<?php echo base_url();?>user/discounts" method="post" name="discount_listing" id="discount_listing"  style="width:900px;font-size:13px;font-weight:bold;padding:10px 10px 10px 36px;margin:10px;border-radius:10px;border:1px solid #f2c779;">
	Select Discount Category : 
	<select name="discount_type" id="discount_type" onchange="javascript:$('#discount_listing').submit();">
		<option value="0" selected="selected">Select Type</option>
		<option value="Bank" <?php if($this->session->userdata('discount_type')=="Bank") { ?> selected="selected" <?php } ?>>Bank</option>
		<option value="Credit Card" <?php if($this->session->userdata('discount_type')=="Credit Card") { ?> selected="selected" <?php } ?>>Credit Card</option>
		<option value="Mobile" <?php if($this->session->userdata('discount_type')=="Mobile") { ?> selected="selected" <?php } ?>>Mobile Tariff</option>
		<option value="Internet" <?php if($this->session->userdata('discount_type')=="Internet") { ?> selected="selected" <?php } ?>>Internet</option>
	</select>
	<!-- 
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	Select City : 
	<select name="discount_city" id="discount_city" onchange="javascript:$('#discount_listing').submit();">
		<option value="0" selected="selected">All Cities</option>
		<?php foreach($cities_list as $key=>$value) { ?>
			<option value="<?php echo $value;?>" <?php if($this->session->userdata('discount_city')==$value) { ?> selected="selected" <?php } ?>><?php echo $value;?></option>
		<?php } ?>
	</select>-->
	<input type="hidden" name="discount_filter" value="1" />
	</form>
	</div>
	<?php for($i=0;$i<count($discounts_list);) {  ?>
		<?php if($i<count($discounts_list)) { $value1 = $discounts_list[$i]; ?>
			<div class="col_rounded one_third_rounded">
				<h2 style="font-weight:bold;">
				<a href="<?php echo base_url();?>user/viewdiscount/<?php echo $value1->discount_id;?>">
				<?php echo $value1->discount_provider;?>
				</a>
				</h2>
				<div class="offer_img_rounded">
				<?php if($value1->discount_picture!=''){$src1=str_replace(".","_thumb.",$value1->discount_picture);}else{$src1='noimage.jpg';}?>
				<img src="<?php echo base_url().'discount_pictures/'.$src1;?>"  />
				</div>
				<div>Discount :<?php echo $value1->discount_title;?></div>
				<div>Provider :<?php echo $value1->discount_provider;?></div>
				<div>Contact :<?php echo $value1->contact_person;?></div>
				<div>Phone/Mobile :<?php echo $value1->contact_phone;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value1->discount_created_on);?></div>
				<p style="font-weight:bold;font-style:italic;">* Notes :<?php echo trim($value1->discount_notes); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<?php if($i<count($discounts_list)) { $value2 = $discounts_list[$i]; ?>
			<div class="col_rounded one_third_rounded">
				<h2 style="font-weight:bold;">
				<a href="<?php echo base_url();?>user/viewdiscount/<?php echo $value2->discount_id;?>">
				<?php echo $value2->discount_provider;?>
				</a>
				</h2>
				<div class="offer_img_rounded">
				<?php if($value2->discount_picture!=''){$src1=str_replace(".","_thumb.",$value2->discount_picture);}else{$src1='noimage.jpg';}?>
				<img src="<?php echo base_url().'discount_pictures/'.$src1;?>"  />
				</div>
				<div>Discount :<?php echo $value2->discount_title;?></div>
				<div>Provider :<?php echo $value2->discount_provider;?></div>
				<div>Contact :<?php echo $value2->contact_person;?></div>
				<div>Phone/Mobile :<?php echo $value2->contact_phone;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value2->discount_created_on);?></div>
				<p style="font-weight:bold;font-style:italic;">* Notes :<?php echo trim($value2->discount_notes); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<?php if($i<count($discounts_list)) { $value3 = $discounts_list[$i]; ?>
			<div class="col_rounded one_third_rounded no_margin_right">
								<h2 style="font-weight:bold;">
				<a href="<?php echo base_url();?>user/viewdiscount/<?php echo $value3->discount_id;?>">
				<?php echo $value3->discount_provider;?>
				</a>
				</h2>
				<div class="offer_img_rounded">
				<?php if($value3->discount_picture!=''){$src1=str_replace(".","_thumb.",$value3->discount_picture);}else{$src1='noimage.jpg';}?>
				<img src="<?php echo base_url().'discount_pictures/'.$src1;?>"  />
				</div>
				<div>Discount :<?php echo $value3->discount_title;?></div>
				<div>Provider :<?php echo $value3->discount_provider;?></div>
				<div>Contact :<?php echo $value3->contact_person;?></div>
				<div>Phone/Mobile :<?php echo $value3->contact_phone;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value3->discount_created_on);?></div>
				<p style="font-weight:bold;font-style:italic;">* Notes :<?php echo trim($value3->discount_notes); $i=$i+1;?></p>

			</div>
		<?php } ?>
		<div class="clear"></div>
		<?php } ?>
		<?php if(count($discounts_list)==0) { ?>
		<div class="alert_notification notification_error"><span>Alert: </span>No discounts available on the selected category.</div>
		<?php }else { ?>
		<div style="float:left;margin-left:350px;padding-bottom:20px;"><?php echo $pagelink;?></div> <br />
		<?php } ?>
</div>		