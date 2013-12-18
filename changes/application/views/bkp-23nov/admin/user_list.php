<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Users <font style="color:#E16715;">[ Total <?php echo $total;?> users joined ]</font></h2>
            <div style="line-height:25px;padding-top:10px;"> <!-- 918F8D-->
			<table width="100%" cellpadding="3" cellspacing="3" align="center" border="1">
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
					<td width="20%">Name</td>
					<td width="5%">Gender</td>
					<td width="25%">Email</td>
					<td width="30%">Address</td>
					<td width="8%">Phone</td>
					<td width="10%">Joined On</td>
					<td width="5%">Status</td>
				</tr>
				<?php if(count($user_list)>0){foreach($user_list as $out) { ?>
				<tr style="font-size:11px;"> 				
					<td><?php echo $out->pro_user_full_name;?></td>
					<td><?php echo $out->pro_user_gender;?></td>
					<td><?php echo $out->pro_user_email;?></td>
					<td><?php echo $out->pro_user_address.', '.$out->pro_user_city.', '.$out->pro_user_state;?></td>
					<td><?php echo $out->pro_user_phone;?></td>
					<td><?php echo date("d M 'y",$out->pro_user_joined);?></td>
					<td><?php echo $out->pro_user_status=='1'?'Active':'Inactive';?></td>
				</tr>
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"> No Users Available</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div class="clear"></div>