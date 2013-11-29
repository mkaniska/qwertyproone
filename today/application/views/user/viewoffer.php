<div id="website_main" class="wrapper" style="margin-bottom:10px;min-height:370px;">
  <font style="font-size:20px;">View "<?php echo $offer_details->offer_provider;?>" Offer Details</font>
  <div class="clear h40"></div>
	<div id="gallery">
        <div class="gallery_box">
           <div class="img_frame img_frame_12 left"><span></span>
		   <img src="<?php echo base_url();?>offer_pictures/<?php echo str_replace(".","_normal_thumb.",$offer_details->offer_picture);?>" alt="" /></div>
           <div class="half right">
                <h2><?php echo $offer_details->offer_title;?></h2>
                <p>
					Validity : <?php echo date("d M 'y",$offer_details->offer_valid_from).' - '.date("d M 'y",$offer_details->offer_valid_until);?> <br />
					Minimum Purchase Cost & Quantity: <?php echo $offer_details->minimum_purchase_amount;?>  &  <?php echo $offer_details->minimum_purchase_quantity;?><br />
					Offer % & Offer Cost: <?php echo $offer_details->offer_percentage;?>  &  <?php echo $offer_details->offer_amount;?><br />
					Contact Person : <?php echo $offer_details->contact_person;?><br />
					Phone : <?php echo $offer_details->contact_phone;?><br />
					Email : <?php echo $offer_details->contact_email;?><br />
					Address : <?php echo $offer_details->provider_address;?><br />
					Notes: <?php echo $offer_details->offer_notes;?><br />
				</p>
                <p>
					<div class="alert_display notification_error"><span>Conditions: </span>
					<?php echo $offer_details->conditions_apply;?>
					</div>
				</p>
				<input class="submit_btn float_l" type="button" name="offerList" id="offerList" value="Go Back" onclick="javascript:window.history.go(-1);" /> 
			</div>
            <div class="clear"></div>
        </div>
    </div>
</div>		