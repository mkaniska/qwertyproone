<div id="website_bottom_wrapper">
	<div id="website_bottom" class="wrapper">
    
    	<div class="col one_fourth_footer1">
            <h4 align="center">Who we are ?</h4>
            <p> 
			We do services on Booking, Group Sharing on Daily Travel, Corporate Offers, Daily Offers by known big companies/sales pool. 
			Our services are currently free to linked corporate companies & soon we will reach the general public to expand our services.
			As we grow in terms of our man resource, we would be able to do better service on the above listed services for the public.
			<a href="#">Read More</a></p>
        </div>
       
    	<div class="col one_fourth_footer2">
    	<h4 align="center">Recent Joinees !</h4>
            <div class="sidebar_box_content">
                <ul class="no_bullet_new">
					<?php foreach($recent_joinees as $key=>$userValue) { ?>
						<li><font style="color:#E16715;font-weight:bold;"><?php echo $userValue->pro_user_full_name;?></font> &nbsp; - (From <?php echo $userValue->pro_user_city;?> on <?php echo date("d M 'y",$userValue->pro_user_joined);?>)</li>
					<?php } ?>
                </ul>
			</div>
    	</div>
		
    	<div class="col one_fourth_footer3 no_margin_right">
    	<h4 align="center">Recent Rides Posted!</h4>
			<!-- Social Networking content goes here -->
            <div class="sidebar_box_content">
                <ul class="list_bullet">
					<?php foreach($recent_rides as $key=>$value) { ?>
						<li><?php echo substr($value->origin_location,0,20).'...';?> -> <?php echo substr($value->destination_location,0,20).'...';?> 
						<font style="font-weight:bold;">[<?php echo $value->start_time;?> - <?php echo $value->return_time;?>]</font></li>
					<?php } ?>
                </ul>
            </div>			
    	</div>
        <div class="clear"></div>
    </div>
</div>