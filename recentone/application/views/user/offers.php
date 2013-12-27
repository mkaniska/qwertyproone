<div id="website_main" class="wrapper" style="margin-bottom:10px;min-height:370px;">
	<div>
	<form action="<?php echo base_url();?>user/offers" method="post" name="offer_listing" id="offer_listing"  style="width:900px;font-size:13px;font-weight:bold;padding:10px 10px 10px 36px;margin:10px;border-radius:10px;border:1px solid #f2c779;">
	Select Offer Category : 
	<select name="offer_categories" id="offer_categories" onchange="javascript:$('#offer_listing').submit();">
	<option value="0">All Categories</option>
	<?php foreach($offer_categories as $val=>$out) {  ?>
		<option value="<?php echo $out->offer_type_id;?>" <?php if($this->session->userdata('offer_id')==$out->offer_type_id) { ?> selected="selected" <?php } ?>><?php echo $out->offer_type;?></option>
	<?php } ?>
	</select>
	<!-- 
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	Select City : 
	<select name="offer_city" id="offer_city" onchange="javascript:$('#offer_listing').submit();">
		<option value="0" selected="selected">All Cities</option>
		<?php foreach($cities_list as $key=>$value) { ?>
			<option value="<?php echo $value;?>" <?php if($this->session->userdata('offer_city')==$value) { ?> selected="selected" <?php } ?>><?php echo $value;?></option>
		<?php } ?>
	</select> -->
	<input type="hidden" name="offer_filter" value="1" />
	</form>
	</div>
	<?php for($i=0;$i<count($offers_list);) {  ?>
		<?php if($i<count($offers_list)) { $value1 = $offers_list[$i]; ?>
			<div class="col_rounded one_third_rounded">
				<h2 style="font-weight:bold;">
				<a href="<?php echo base_url();?>user/viewoffer/<?php echo $value1->offer_id;?>">
				<?php echo $value1->offer_provider;?>
				</a>
				</h2>
				<div class="offer_img_rounded">
				<?php if($value1->offer_picture!=''){$src1=str_replace(".","_thumb.",$value1->offer_picture);}else{$src1='noimage.jpg';}?>
				<img src="<?php echo base_url().'offer_pictures/'.$src1;?>"  />
				</div>
				<div>Offer :<?php echo $value1->offer_title;?></div>
				<div>Address :<?php echo $value1->provider_address;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value1->offer_created_on);?></div>
				<div>Validity :<?php echo date("d M 'y",$value1->offer_valid_from);?> to <?php echo date("d M 'y",$value1->offer_valid_until);?></div>
				<div>Discount :<?php echo $value1->offer_percentage;?> / $ <?php echo $value1->offer_amount;?></div>
				<!--<p style="font-weight:bold;font-style:italic;">Notes :<?php echo trim($value1->offer_notes); ?></p>-->
				<p style="font-weight:bold;font-style:italic;">* Conditions :<?php echo trim($value1->conditions_apply); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<?php if($i<count($offers_list)) { $value2 = $offers_list[$i]; ?>
			<div class="col_rounded one_third_rounded">
				<h2 style="font-weight:bold;">
				<a href="<?php echo base_url();?>user/viewoffer/<?php echo $value2->offer_id;?>">
				<?php echo $value2->offer_provider;?>
				</a>
				</h2>
				<div class="offer_img_rounded">
				<?php if($value2->offer_picture!=''){$src2=str_replace(".","_thumb.",$value2->offer_picture);}else{$src2='noimage.jpg';}?>
				<img src="<?php echo base_url().'offer_pictures/'.$src2;?>"  /></div>
				<div>Offer :<?php echo $value2->offer_title;?></div>
				<div>Address :<?php echo $value2->provider_address;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value2->offer_created_on);?></div>
				<div>Validity :<?php echo date("d M 'y",$value2->offer_valid_from);?> to <?php echo date("d M 'y",$value2->offer_valid_until);?></div>
				<div>Discount :<?php echo $value2->offer_percentage;?> / $ <?php echo $value2->offer_amount;?></div>
				<!--<p style="font-weight:bold;font-style:italic;">Notes :<?php echo trim($value2->offer_notes); ?></p>-->
				<p style="font-weight:bold;font-style:italic;">* Conditions :<?php echo trim($value2->conditions_apply); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<?php if($i<count($offers_list)) { $value3 = $offers_list[$i]; ?>
			<div class="col_rounded one_third_rounded no_margin_right">
				<h2 style="font-weight:bold;">
				<a href="<?php echo base_url();?>user/viewoffer/<?php echo $value3->offer_id;?>">
				<?php echo $value3->offer_provider;?>
				</a>
				</h2>
				<div class="offer_img_rounded">
				<?php if($value3->offer_picture!=''){$src3=str_replace(".","_thumb.",$value3->offer_picture);}else{$src3='noimage.jpg';}?>
				<img src="<?php echo base_url().'offer_pictures/'.$src3;?>"  /></div>
				<div>Offer :<?php echo $value3->offer_title;?></div>
				<div>Address :<?php echo $value3->provider_address;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value3->offer_created_on);?></div>
				<div>Validity :<?php echo date("d M 'y",$value3->offer_valid_from);?> to <?php echo date("d M 'y",$value3->offer_valid_until);?></div>
				<div>Discount :<?php echo $value3->offer_percentage;?> / $ <?php echo $value3->offer_amount;?></div>
				<!--<p style="font-weight:bold;font-style:italic;">Notes :<?php echo trim($value3->offer_notes); ?></p>-->
				<p style="font-weight:bold;font-style:italic;">* Conditions :<?php echo trim($value3->conditions_apply); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<div class="clear"></div>
		<?php } ?>
		<?php if(count($offers_list)==0) { ?>
		<div class="alert_notification notification_error"><span>Alert: </span>No offers available on the selected category.</div>
		<?php }else { ?>
		<div style="float:left;margin-left:350px;padding-bottom:20px;"><?php echo $pagelink;?></div> <br />
		<?php } ?>
</div>		