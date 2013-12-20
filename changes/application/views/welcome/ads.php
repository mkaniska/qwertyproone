<ul style="list-style:none;position:absolute;margin:3px;">
<?php foreach($random_ads as $key=>$out) { ?>
	<li style="border:2px solid #ccc;margin-bottom:2px;">
		<a href="http://<?php echo $out->ads_url;?>" target="_blank">
			<img src="<?php echo base_url().'ads_images/'.$out->ads_image;?>" width="300" height="95" id="myRandImg" />
		</a>
	</li>
<?php } ?>
</ul>