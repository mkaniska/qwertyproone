<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">List of Co-Passengers &nbsp; </h5>
            <div class="cleaner"></div>
		</div>
        <div class="clear"></div>          
        <div id="list_form">
            <div style="border:1px solid #CCCCCC;line-height:25px;"> <!-- 918F8D-->
		    <form style="margin:10px;" method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact" onsubmit="return isValidContact();">
			<table width="100%" cellpadding="5" cellspacing="0" align="center" border="1">
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#015591;color:#FFF;">
					<td width="50%">Origin & Destination</td>
					<td width="15%">Start & Return Time</td>					
					<td width="10%">Joined On</td>
					<td width="25%">Co-Passenger Details</td>
				</tr>
				<?php if(count($ride_list)>0){foreach($ride_list as $out) { ?>
				<tr style="font-size:11px;">
					<td>
					<?php if($out->vehicle_type=='walk'){$alt='Passenger';}else{$alt='Vehicle Owner';} ?>
						<div style="border-bottom:1px dotted #CCC;">
							<font style="color:#E96F1C;">[FROM] : </font><?php echo $out->origin_location; ?> 
							[<img src="<?php echo base_url().'images/'.$out->vehicle_type.'.png';?>" align="absmiddle" alt="<?php echo $alt;?>" title="<?php echo $alt;?>"  />]
						</div>
						<div style="float:left;text-align:center;">
							<font style="color:#E96F1C;">[TO] : </font><?php echo $out->destination_location;?>
						</div>
					</td>
					<td><?php echo $out->start_time;?> - <?php if($out->return_time=='' || $out->return_time=='00:00:00'){echo 'One Way';}else{echo $out->return_time;}?></td>
					<td><?php echo date("d M 'y h:i A",$out->approved_on);?></td>
					<td style="text-align:left;padding-left:5px;font-weight:bold;">
						Mobile : <?php echo $out->pro_user_phone;?> <br />
						Name : <?php echo $out->pro_user_full_name;?> <br />
						Gender : <?php echo ucfirst($out->pro_user_gender);?>
					</td>
				</tr>
				<?php } ?>
				<?php if($pagelink!='') {?>
				<tr style="font-size:11px;">
					<td colspan="5" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php } ?>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="5" align="center"> No Instant Rides Posted Today!</td>
				</tr>
				<?php } ?>
			</table>
            </form>
			</div>
        </div>
        <div class="clear"></div>
</div>