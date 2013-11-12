<div id="website_bottom_wrapper">
	<div id="website_bottom" class="wrapper">
    
    	<div class="col one_fourth_footer1">
            <h4>Who we are ?</h4>
            <p> 
			We do services on Booking, Group Sharing on Daily Travel, Corporate Offers, Daily Offers by known big companies/sales pool. 
			Our services are currently free to linked corporate companies & soon we will reach the general public to expand our services.
			As we grow in terms of our man resource, we would be able to do better service on the above listed services for the public.
			<a href="#">Read More</a></p>
        </div>
       
    	<div class="col one_fourth_footer2">
    	<h4>Recent Joinees !</h4>
            <div class="sidebar_box_content">
                <ul class="no_bullet_new">
					<?php foreach($recent_joinees as $key=>$userValue) { ?>
						<li><font style="color:#E16715;font-weight:bold;"><?php echo $userValue->pro_user_full_name;?></font> &nbsp; - (From <?php echo $userValue->pro_user_city;?> on <?php echo date("d M 'y",$userValue->pro_user_joined);?>)</li>
					<?php } ?>
                </ul>
			</div>
    	</div>
		
    	<div class="col one_fourth_footer3 no_margin_right">
    	<h4>Socially Connected with</h4>
			<div style="padding:10px;">
				<div class="fb-share-button" data-href="http://mail.google.cm" data-width="180" data-type="button_count"></div>
			</div>
			<div style="padding:10px;">
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://gmail.com" data-via="mrhai" data-related="mrhai">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
			<div style="padding:10px;">
				<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
				<script type="IN/Share" data-url="mail.google.com" data-counter="right"></script>
			</div>
    	</div>
        <div class="clear"></div>
    </div>
</div>