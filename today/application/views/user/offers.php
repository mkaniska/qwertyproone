<div id="website_main" class="wrapper" style="margin-bottom:10px;min-height:370px;">
	<div id="accordion">
		<?php foreach($offer_categories as $val=>$out) {  ?>
		<h3><?php echo $out->offer_type;?></h3>
		<div>
		<?php $offers_list = $this->AdminModel->get_category_offers($out->offer_type_id); //print_r($offers_list);exit; ?>
			<?php for($i=0;$i<count($offers_list);) {  ?>
				<?php if($i<count($offers_list)) { $value1 = $offers_list[$i]; ?>
					<div class="col one_third_new" style="font-size:11px;">
						<h2 style="font-weight:bold;">
						<a href="<?php echo base_url();?>user/viewoffer/<?php echo $value1->offer_id;?>">
						<?php echo $value1->offer_provider;?>
						</a>
						</h2>
						<div class="offer_title"><?php echo $value1->offer_title;?></div>
						<div style="float:left;padding-right:8px;">
						<?php if($value1->offer_picture!=''){$src1=str_replace(".","_thumb.",$value1->offer_picture);}else{$src1='noimage.jpg';}?>
							<img src="<?php echo base_url().'offer_pictures/'.$src1;?>"  />
						</div>
						<div class="offer_valid">Valid Until <?php echo date("d M 'y",$value1->offer_valid_until);?></div>
						<div class="offer_info">Avail <?php echo $value1->offer_percentage;?> % Discount </div>
						<div class="offer_break"> Or </div>
						<div class="offer_info">Rs:<?php echo $value1->offer_amount;?> Off</div>
						<div class="offer_details">
							Purchase minimum of Rs:<?php echo trim($value1->minimum_purchase_amount);  ?>
						</div>
						<div class="offer_break"> Or </div>
						<div class="offer_info">Quantity of <?php echo $value1->minimum_purchase_quantity; $i=$i+1;?> Items</div>
					</div>
				<?php } ?>
				<?php if($i<count($offers_list)) { $value2 = $offers_list[$i]; ?>
					<div class="col one_third_new" style="font-size:11px;">
												<h2 style="font-weight:bold;">
						<a href="<?php echo base_url();?>user/viewoffer/<?php echo $value1->offer_id;?>">
						<?php echo $value2->offer_provider;?>
						</a>
						</h2>
						<div class="offer_title"><?php echo $value2->offer_title;?></div>
						<div style="float:left;padding-right:8px;">
						<?php if($value2->offer_picture!=''){$src1=str_replace(".","_thumb.",$value2->offer_picture);}else{$src1='noimage.jpg';}?>
							<img src="<?php echo base_url().'offer_pictures/'.$src1;?>"  />
						</div>
						<div class="offer_valid">Valid Until <?php echo date("d M 'y",$value2->offer_valid_until);?></div>
						<div class="offer_info">Avail <?php echo $value2->offer_percentage;?> % Discount </div>
						<div class="offer_break"> Or </div>
						<div class="offer_info">Rs:<?php echo $value2->offer_amount;?> Off</div>
						<div class="offer_details">
							Purchase minimum of Rs:<?php echo trim($value2->minimum_purchase_amount);  ?>
						</div>
						<div class="offer_break"> Or </div>
						<div class="offer_info">Quantity of <?php echo $value2->minimum_purchase_quantity; $i=$i+1;?> Items</div>
					</div>
				<?php } ?>
				<?php if($i<count($offers_list)) { $value3 = $offers_list[$i]; ?>
					<div class="col one_third_new no_margin_right" style="font-size:11px;">
						<h2 style="font-weight:bold;">
						<a href="<?php echo base_url();?>user/viewoffer/<?php echo $value3->offer_id;?>">
						<?php echo $value3->offer_provider;?>
						</a>
						</h2>
						<div class="offer_title"><?php echo $value3->offer_title;?></div>
						<div style="float:left;padding-right:8px;">
						<?php if($value3->offer_picture!=''){$src1=str_replace(".","_thumb.",$value3->offer_picture);}else{$src1='noimage.jpg';}?>
							<img src="<?php echo base_url().'offer_pictures/'.$src1;?>"  />
						</div>
						<div class="offer_valid">Valid Until <?php echo date("d M 'y",$value3->offer_valid_until);?></div>
						<div class="offer_info">Avail <?php echo $value3->offer_percentage;?> % Discount </div>
						<div class="offer_break"> Or </div>
						<div class="offer_info">Rs:<?php echo $value3->offer_amount;?> Off</div>
						<div class="offer_details">
							Purchase minimum of Rs:<?php echo trim($value3->minimum_purchase_amount);  ?>
						</div>
						<div class="offer_break"> Or </div>
						<div class="offer_info">Quantity of <?php echo $value3->minimum_purchase_quantity; $i=$i+1;?> Items</div>
					</div>
				<?php } ?>
				<div class="clear"></div>
				<?php } ?>
				<?php if(count($offers_list)==0) { ?>
				<div class="alert_notification notification_error">No offers available on this category.</div>
				<?php }else { ?>
				<div style="float:left;margin-left:400px;padding-bottom:20px;font-weight:bold;">
				<input class="submit_btn float_l" type="button" name="all" id="all" value="View All" onclick="javascript:showThisCategory('<?php echo $out->offer_type;?>');" />
				</div> <br />
				<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>