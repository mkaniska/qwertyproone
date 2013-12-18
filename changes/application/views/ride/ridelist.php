<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">List of Rides Posted &nbsp; 
			<a href="<?php echo base_url();?>ride/postride"><img align="absmiddle" src="<?php echo base_url();?>images/Add2.png" border="0" alt="Add New Ride" title="Add New Ride" /></a></h5>
            <div class="cleaner"></div>
		</div>
        <div class="clear"></div>          
        <div id="list_form">
            <div style="border:1px solid #CCCCCC;line-height:25px;"> <!-- 918F8D-->
		    <form style="margin:10px;" method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact" onsubmit="return isValidContact();">
			<table width="100%" cellpadding="2" cellspacing="0" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="6">
						<div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#015591;color:#FFF;">
					<td width="30%">Origin Location</td>
					<td width="30%">Destination Location</td>
					<td width="8%">Start Time</td>
					<td width="10%">Return Time</td>
					<td width="12%">Posted On/For</td>
					<td width="7%">Action</td>
				</tr>
				<?php if(count($ride_list)>0){foreach($ride_list as $out) { ?>
				<tr style="font-size:11px;">
					<td><?php echo $out->origin_location; if($out->vehicle_type=='walk'){$alt='Passenger';}else{$alt='Vehicle Owner';}?> 
						[<img src="<?php echo base_url().'images/'.$out->vehicle_type.'.png';?>" align="absmiddle" alt="<?php echo $alt;?>" title="<?php echo $alt;?>"  />]
					</td>
					<td><?php echo $out->destination_location;?></td>
					<td><?php echo $out->start_time;?></td>
					<td><?php if($out->return_time=='' || $out->return_time=='00:00:00'){echo 'One Way';}else{echo $out->return_time;}?></td>
					<td><?php echo date("d M Y",$out->added_on);?>/<?php echo $out->posting_for;?></td>
					<td align="center">
						<a href="<?php echo base_url();?>ride/edit/<?php echo $out->ride_id;?>" alt="Edit" title="Edit">
							<img src="<?php echo base_url();?>images/edit.png" border="0" />
						</a> | 
						<a href="<?php echo base_url();?>ride/delete/<?php echo $out->ride_id;?>" alt="Delete" title="Delete" onclick="return confirm('Are you sure to delete this entry ?');">
							<img src="<?php echo base_url();?>images/delete.png" border="0" />
						</a>
					</td>
				</tr>
				<?php } ?>
				<?php if($pagelink!='') { ?>
				<tr style="font-size:11px;">
					<td colspan="6" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php } ?>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="6" align="center"> No Rides Added</td>
				</tr>
				<?php } ?>
			</table>
            </form>
			</div>
        </div>
        <div class="clear"></div>
</div>