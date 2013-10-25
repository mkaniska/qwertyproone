<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">List of Users</h5>
            <div class="cleaner"></div>
		</div>
        <div class="clear"></div>          
        <div id="list_form">
            <div style="border:1px solid #CCCCCC;line-height:25px;"> <!-- 918F8D-->
			<table width="100%" cellpadding="3" cellspacing="0" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="7">
						<div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
					<!-- <td>City</td> -->
					<td width="5%">Name</td>
					<td width="30%">Gender</td>
					<td width="30%">Destination Location</td>
					<td width="8%">Start Time</td>
					<td width="10%">Return Time</td>
					<td width="10%">Posted On</td>
					<td width="7%">Action</td>
				</tr>
				<?php if(count($user_list)>0){foreach($user_list as $out) { ?>
				<tr style="font-size:11px;"> 				
					<td><?php echo $out->pro_user_full_name;?></td>
					<td><?php echo $out->pro_user_gender;?></td>
					<td><?php echo $out->origin_location;?></td>
					<td><?php echo $out->destination_location;?></td>
					<td><?php echo $out->start_time;?></td>
					<td><?php echo $out->return_time;?></td>
					<td><?php echo date("d M Y",$out->added_on);?></td>
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
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"> No Rides Added</td>
				</tr>
				<?php } ?>
			</table>
			</div>
        </div>
        <div class="clear"></div>
</div>