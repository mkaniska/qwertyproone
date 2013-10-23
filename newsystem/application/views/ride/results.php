<table width="100%" cellpadding="3" cellspacing="0" align="center" border="1">
	<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
		<td>Person Name</td>
		<td>City</td>
		<td>Vehicle</td>
		<td>Origin</td>
		<td>Destination</td>
		<td>Start Time</td>
		<td>Return Time</td>
	</tr>
	<?php if(count($matching_list)>0) { foreach($matching_list as $key=>$out) { ?>
	<tr style="font-size:11px;text-align:left;padding-left:3px;"> 				
		<td><?php echo $out->pro_user_full_name;?></td>
		<td><?php echo $out->passenger_city;?></td>
		<td><?php echo $out->vehicle_type;?></td>
		<td><?php echo $out->origin_location;?></td>
		<td><?php echo $out->destination_location;?></td>
		<td><?php echo $out->start_time;?></td>
		<td><?php echo $out->return_time;?></td>
	</tr>	
	<?php } ?>
	<tr style="font-size:11px;">
		<td colspan="7" align="center"><?php //echo $pagelink;?></td>
	</tr>				
	<?php }else { ?>
	<tr style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
		<td colspan="7" align="center">No Results Found</td>
	</tr>
	<?php } ?>
</table>