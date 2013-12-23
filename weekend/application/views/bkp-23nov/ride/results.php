<table width="100%" cellpadding="3" cellspacing="0" align="center" border="1">
	<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
		<td width="10%">Person Name</td>
		<td width="6%">City</td>
		<td width="30%">Origin</td>
		<td width="30%">Destination</td>
		<td width="8%">Start Time</td>
		<td width="10%">Return Time</td>
		<td width="6%">Request</td>
	</tr>
	<?php if(count($matching_list)>0) { foreach($matching_list as $key=>$out) { ?>
	<tr style="font-size:11px;text-align:left;padding-left:3px;"> 				
		<td><?php echo $out->pro_user_full_name;?></td>
		<td><?php echo $out->passenger_city;?></td>
		<td><?php echo $out->origin_location;?> [<img src="<?php echo base_url().'images/'.$out->vehicle_type.'.png';?>" align="absmiddle" />]</td>
		<td><?php echo $out->destination_location;?> [<img src="<?php echo base_url().'images/'.$out->vehicle_type.'.png';?>" align="absmiddle" />]</td>
		<td><?php echo $out->start_time;?></td>
		<td><?php echo $out->return_time;?></td>
		<td align="center">
			<?php $responseID = 'request_row_'.$out->ride_id;
				  if($this->session->userdata('_user_name')!='') {
						$href="javascript:sendJoinRequest('".$out->ride_id."','#".$responseID."')";
					}
				  else{$href="javascript:alert('Please Register & Login into application to post your request!')";}?>
			<span id="<?php echo $responseID;?>">
			<?php if(!in_array($out->ride_id,$ignore_rides)) { ?>
			<a href="<?php echo $href;?>" alt="Send Request" title="Send Request">
				<img src="<?php echo base_url().'images/request.png';?>" align="absmiddle" />
			</a>
			<?php }else{ ?>
				<img src="<?php echo base_url().'images/alreadysent.png';?>" alt="Already Sent" title="Already Sent" align="absmiddle" />
			<?php } ?>
			</span>
		</td>
	</tr>	
	<?php } ?>
	<tr style="font-size:11px;">
		<td colspan="7" align="center" id="additionalInfo"><?php //echo $pagelink;?></td>
	</tr>				
	<?php }else { ?>
	<tr style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
		<td colspan="7" align="center">No Results Found</td>
	</tr>
	<?php } ?>
</table>