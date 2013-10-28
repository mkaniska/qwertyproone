<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Rides <font style="color:#E16715;">[ Total <?php echo $total;?> rides posted ]</font></h2>
		<div class="block">
			<table class="data display datatable" id="example" style="border:1px solid #ccc;">
			<thead>
				<tr>
					<th width="10%">Posted By</th>
					<th width="5%">City</th>
					<th width="30%">Origin Location</th>
					<th width="25%">Destination Location</th>
					<th width="8%">Start Time</th>
					<th width="12%">Return Time</th>
					<th width="10%">Posted On</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($ride_list)>0){ $oddeve = 2; foreach($ride_list as $out) { ?>
				<tr <?php if($oddeve%2==0) { ?> class="odd gradeX" <?php }else { ?> <?php } ?> class="even gradeC" style="font-size:11px;"> 				
					<td><?php echo $out->pro_user_full_name;?></td>
					<td><?php echo $out->passenger_city;?></td>
					<td><?php echo $out->origin_location;?> [<img src="<?php echo base_url().'images/'.$out->vehicle_type.'.png';?>" align="absmiddle" />]</td>
					<td><?php echo $out->destination_location;?> [<img src="<?php echo base_url().'images/'.$out->vehicle_type.'.png';?>" align="absmiddle" />]</td>
					<td><?php echo $out->start_time;?></td>
					<td><?php echo $out->return_time;?></td>
					<td><?php echo date("d M 'y",$out->added_on);?></td>
				</tr>
				<?php $oddeve++; } ?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"> No Rides Added</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
<div class="clear"></div>