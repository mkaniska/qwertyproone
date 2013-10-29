<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Companies <font style="color:#E16715;">[ Total <?php echo $total;?> companies ]</font></h2>
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
					<td width="20%">Company Name</td>
					<td width="15%">Contact Person</td>
					<td width="20%">Contact Email</td>
					<td width="20%">Address</td>
					<td width="10%">Phone</td>
					<td width="10%">Added On</td>
					<td width="5%">Status</td>
				</tr>
				<?php if(count($company_list)>0){foreach($company_list as $out) { ?>
				<tr style="font-size:11px;">
					<td><?php echo $out->company_name;?></td>
					<td><?php echo $out->company_primary_contact_person;?></td>
					<td><?php echo $out->company_contact_email;?></td>
					<td><?php echo $out->company_address.', '.$out->company_city.', '.$out->company_state.', '.$out->company_zipcode;?></td>
					<td><?php echo $out->company_phone;?></td>
					<td><?php echo date("d M 'y",$out->company_added);?></td>
					<td><?php echo $out->company_status=='1'?'Active':'Inactive';?></td>
				</tr>
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"> No Company Added</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div class="clear"></div>