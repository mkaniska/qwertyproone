<div id="website_main" class="wrapper" style="margin-bottom:10px;min-height:370px;">
	<?php for($i=0;$i<count($offers_list);) {  ?>
		<?php if($i<count($offers_list)) { $value1 = $offers_list[$i]; ?>
			<div class="col one_third">
				<h2 style="font-weight:bold;"><?php echo $value1->offer_provider;?></h2>
				<div style="float:left;padding-right:8px;">
				<?php if($value1->offer_picture!=''){$src1=str_replace(".","_thumb.",$value1->offer_picture);}else{$src1='noimage.jpg';}?>
				<img src="<?php echo base_url().'offer_pictures/'.$src1;?>"  /></div>
				<div>Offer :<?php echo $value1->offer_title;?></div>
				<div>Address :<?php echo $value1->provider_address;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value1->offer_created_on);?></div>
				<div>Validity :<?php echo date("d M 'y",$value1->offer_valid_from);?> to <?php echo date("d M 'y",$value1->offer_valid_until);?></div>
				<div>Discount :<?php echo $value1->offer_percentage;?> / $ <?php echo $value1->offer_amount;?></div>
				<p style="font-weight:bold;font-style:italic;">Notes :<?php echo trim($value1->offer_notes); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<?php if($i<count($offers_list)) { $value2 = $offers_list[$i]; ?>
			<div class="col one_third">
				<h2 style="font-weight:bold;"><?php echo $value2->offer_provider;?></h2>
				<div style="float:left;padding-right:8px;">
				<?php if($value2->offer_picture!=''){$src2=str_replace(".","_thumb.",$value2->offer_picture);}else{$src2='noimage.jpg';}?>
				<img src="<?php echo base_url().'offer_pictures/'.$src2;?>"  /></div>
				<div>Offer :<?php echo $value2->offer_title;?></div>
				<div>Address :<?php echo $value2->provider_address;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value2->offer_created_on);?></div>
				<div>Validity :<?php echo date("d M 'y",$value2->offer_valid_from);?> to <?php echo date("d M 'y",$value2->offer_valid_until);?></div>
				<div>Discount :<?php echo $value2->offer_percentage;?> / $ <?php echo $value2->offer_amount;?></div>
				<p style="font-weight:bold;font-style:italic;">Notes :<?php echo trim($value2->offer_notes); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<?php if($i<count($offers_list)) { $value3 = $offers_list[$i]; ?>
			<div class="col one_third no_margin_right">
				<h2 style="font-weight:bold;"><?php echo $value3->offer_provider;?></h2>
				<div style="float:left;padding-right:8px;">
				<?php if($value3->offer_picture!=''){$src3=str_replace(".","_thumb.",$value3->offer_picture);}else{$src3='noimage.jpg';}?>
				<img src="<?php echo base_url().'offer_pictures/'.$src3;?>"  /></div>
				<div>Offer :<?php echo $value3->offer_title;?></div>
				<div>Address :<?php echo $value3->provider_address;?></div>
				<div>Posted On :<?php echo date("d M 'y",$value3->offer_created_on);?></div>
				<div>Validity :<?php echo date("d M 'y",$value3->offer_valid_from);?> to <?php echo date("d M 'y",$value3->offer_valid_until);?></div>
				<div>Discount :<?php echo $value3->offer_percentage;?> / $ <?php echo $value3->offer_amount;?></div>
				<p style="font-weight:bold;font-style:italic;">Notes :<?php echo trim($value3->offer_notes); $i=$i+1;?></p>
			</div>
		<?php } ?>
		<div class="clear"></div>
		<?php } ?>
		<div style="float:left;margin-left:350px;padding-bottom:20px;"><?php echo $pagelink;?></div> <br />
</div>		