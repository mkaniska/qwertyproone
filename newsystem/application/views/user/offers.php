<div id="website_main" class="wrapper">
	<?php for($i=0;$i<count($offers_list);$i=$i+4) { $value1 = $offers_list[$i];  if($value1!='') { ?>
		<div class="col one_fourth">
			<h2><?php echo $value1->offer_title;?></h2>
			<div>Provider :<?php echo $value1->offer_provider;?></div>
			<div>Address :<?php echo $value1->provider_address;?></div>
			<div>Posted On :<?php echo date("d M 'y",$value1->offer_created_on);?></div>
			<div>Validity :<?php echo date("d M 'y",$value1->offer_valid_from);?> to <?php echo date("d M 'y",$value1->offer_valid_until);?></div>
			<div>Offer :<?php echo $value1->offer_percentage;?> / $ <?php echo $value1->offer_amount;?></div>
			<p><?php echo $value1->offer_notes;?></p>
		</div>
		<?php } ?>
		<?php   if($offers_list[$i+1]!='') {$value2 = $offers_list[$i+1];?>
		<div class="col one_fourth">
			<h2><?php echo $value2->offer_title;?></h2>
			<div>Provider :<?php echo $value2->offer_provider;?></div>
			<div>Address :<?php echo $value2->provider_address;?></div>
			<div>Posted On :<?php echo date("d M 'y",$value2->offer_created_on);?></div>
			<div>Validity :<?php echo date("d M 'y",$value2->offer_valid_from);?> to <?php echo date("d M 'y",$value2->offer_valid_until);?></div>
			<div>Offer :<?php echo $value2->offer_percentage;?> / $ <?php echo $value2->offer_amount;?></div>
			<p><?php echo $value2->offer_notes;?></p>
		</div>
		<?php } ?>
		<?php   if($offers_list[$i+2]!='') {$value3 = $offers_list[$i+2];?>
		<div class="col one_fourth">
			<h2><?php echo $value3->offer_title;?></h2>
			<div>Provider :<?php echo $value3->offer_provider;?></div>
			<div>Address :<?php echo $value3->provider_address;?></div>
			<div>Posted On :<?php echo date("d M 'y",$value3->offer_created_on);?></div>
			<div>Validity :<?php echo date("d M 'y",$value3->offer_valid_from);?> to <?php echo date("d M 'y",$value3->offer_valid_until);?></div>
			<div>Offer :<?php echo $value3->offer_percentage;?> / $ <?php echo $value3->offer_amount;?></div>
			<p><?php echo $value3->offer_notes;?></p>
		</div>
		<?php } ?>
		<?php  if($offers_list[$i+3]!='') {$value4 = $offers_list[$i+3];?>
		<div class="col one_fourth no_margin_right">
			<h2><?php echo $value4->offer_title;?></h2>
			<div>Provider :<?php echo $value4->offer_provider;?></div>
			<div>Address :<?php echo $value4->provider_address;?></div>
			<div>Posted On :<?php echo date("d M 'y",$value4->offer_created_on);?></div>
			<div>Validity :<?php echo date("d M 'y",$value4->offer_valid_from);?> to <?php echo date("d M 'y",$value4->offer_valid_until);?></div>
			<div>Offer :<?php echo $value4->offer_percentage;?> / $ <?php echo $value4->offer_amount;?></div>
			<p><?php echo $value4->offer_notes;?></p>
		</div>
		<?php } ?>
		<div class="clear"></div>
	<?php } ?>     	
</div>