<div id="sidebar" class="right">
    	<div class="sidebar_box">
            <h3>Recent Rides Posted</h3>
            <div class="sidebar_box_content">
                <ul class="list_bullet">
					<?php foreach($recent_rides as $key=>$value) { ?>
						<li><?php echo substr($value->origin_location,0,20).'...';?> -> <?php echo substr($value->destination_location,0,20).'...';?> 
						<font style="font-weight:bold;">[<?php echo $value->start_time;?> - <?php echo $value->return_time;?>]</font></li>
					<?php } ?>
                </ul>
            </div>
		</div>
        <div class="sidebar_box">
            <h3>New Joinees !</h3>
            <div class="sidebar_box_content">
                <ul class="no_bullet">
					<?php foreach($recent_joinees as $key=>$userValue) { ?>
						<li><font style="color:#E16715;font-weight:bold;"><?php echo $userValue->pro_user_full_name;?></font> &nbsp; - (From <?php echo $userValue->pro_user_city;?> on <?php echo date("d M 'y",$userValue->pro_user_joined);?>)</li>
					<?php } ?>
                     
                </ul>
			</div>
		</div>
    </div>