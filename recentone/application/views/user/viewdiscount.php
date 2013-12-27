<div id="website_main" class="wrapper" style="margin-bottom:10px;min-height:370px;">
  <font style="font-size:20px;">View "<?php echo $discount_details->discount_provider;?>" Discount Details</font>
  <div class="clear h40"></div>
	<div id="gallery">
        <div class="gallery_box">
           <div class="img_frame img_frame_12 left"><span></span>
		   <img src="<?php echo base_url();?>discount_pictures/<?php echo str_replace(".","_normal_thumb.",$discount_details->discount_picture);?>" alt="" /></div>
           <div class="half right">
                <h2><?php echo $discount_details->discount_title;?></h2>
                <p>
					Type : <?php echo $discount_details->discount_type;?><br />
					Contact Person : <?php echo $discount_details->contact_person;?><br />
					Phone : <?php echo $discount_details->contact_phone;?><br />
				</p>
                <p>
					<div class="alert_display notification_error"><span>Notes: </span>
					<?php echo $discount_details->discount_notes;?>
					</div>
				</p>
				<input class="submit_btn float_l" type="button" name="offerList" id="offerList" value="Go Back" onclick="javascript:window.history.go(-1);" /> 
			</div>
            <div class="clear"></div>
        </div>
    </div>
</div>		