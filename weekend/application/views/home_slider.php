    <div id="sliderFrame">
        <div id="slider">
            <img src="<?php echo base_url();?>images/image-slider-1.jpg" alt="Pay less to your day today travel expense..." />
            <img src="<?php echo base_url();?>images/image-slider-2.jpg" alt="We let you know the recent offers on your city..." />
            <img src="<?php echo base_url();?>images/image-slider-3.jpg" alt="Avail more exciting corporate offers here..." />
            <img src="<?php echo base_url();?>images/image-slider-4.jpg" alt="Make your cab booking online easy..." />
        </div>
		<div id="thumbs_new">
			<div class="rotators" id="random_ads">
				<ul style="list-style:none;position:absolute;margin:3px;">
				<?php foreach($random_ads as $key=>$out) { ?>
					<li style="border:2px solid #ccc;margin-bottom:2px;">
						<a href="<?php echo $out->ads_url;?>">
							<img src="<?php echo base_url().'ads_images/'.$out->ads_image;?>" width="300" height="95" id="myRandImg" />
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>		
		</div>		
		<!--
        <div id="thumbs_new">
            <div class="thumb">
                <div class="frame"><img src="<?php echo base_url();?>images/thumb1.jpg" /></div>
                <div class="thumb-content"><p>Travel Easy</p>Pay less to your daily travel expense by Posting your travel route.</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="<?php echo base_url();?>images/thumb2.jpg" /></div>
                <div class="thumb-content"><p>Recent Offers</p>Avail more exciting corporate offers here. Your company also be a part of us to avail this!.</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="<?php echo base_url();?>images/thumb3.jpg" /></div>
                <div class="thumb-content"><p>Corporate Discounts</p>Avail more exciting corporate offers here. Your company also be a part of us to avail this!.</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="<?php echo base_url();?>images/thumb4.jpg" /></div>
                <div class="thumb-content"><p>Online Reservation</p>Make your cab booking easy Online.</div>
                <div style="clear:both;"></div>
            </div>
        </div>	-->	
		<!--info box ends-->
        <!--clear above float:left elements. It is required if above #slider is styled as float:left. -->
        <div style="clear:both;height:0;"></div>
    </div>	