<div class="grid_10">
	<div class="box round first grid">
		<h2>Details about "<?php echo $company_info[0]->company_name;?>" 
		<div style="float:right;margin-right:10px;">
		<a href="<?php echo base_url();?>admin/company_list"><img src="<?php echo base_url();?>admin-images/back.png" /> Back to List</a>
		</div>
		</h2>
		<p style="line-height:20px;padding:10px;">
		<a href="<?php echo base_url();?>admin/addhruser">Add New HR Account <img align="absmiddle" src="<?php echo base_url();?>images/Add5.png" /></a>
		<table width="90%" cellpadding="5" cellspacing="5" align="center" style="border:1px solid #ccc;">
			<tr>
				<td>
					<table width="100%" cellpadding="10" cellspacing="10" align="center" border="0">
						<tr>
							<td width="30%"><font style="color:#5F88AF;font-weight:bold;"> Company Name : </font><?php echo $company_info[0]->company_name;?></td>
							<td width="30%"><font style="color:#5F88AF;font-weight:bold;"> Company Type : </font><?php echo $company_info[0]->company_type;?></td>	
							<td width="30%"><font style="color:#5F88AF;font-weight:bold;"> Contact Person : </font><?php echo $company_info[0]->contact_person;?></td>
						</tr>
						<tr>
							<td width="30%"><font style="color:#5F88AF;font-weight:bold;"> Contact Email : </font><?php echo $company_info[0]->contact_email;?></td>
							<td width="30%"><font style="color:#5F88AF;font-weight:bold;"> Company Address : </font><?php echo $company_info[0]->company_address;?></td>
							<td width="30%"><font style="color:#5F88AF;font-weight:bold;"> Company Phone : </font><?php echo $company_info[0]->company_phone;?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		</p>
		<font style="font-size:12px;font-weight:bold;color:#000;margin-left:10px;">List of HR Users Added</font>
            <div style="line-height:25px;padding-top:10px;"> <!-- 918F8D-->
			<table width="100%" cellpadding="3" cellspacing="3" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="8">
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
					<td width="10%">Created On</td>
					<td width="5%">Status</td>
					<td width="5%">Action</td>
				</tr>
				<?php if(count($user_list)>0){foreach($user_list as $out) { ?>
				<tr style="font-size:11px;"> 				
					<td><?php echo $out->pro_user_full_name;?></td>
					<td><?php echo ucfirst($out->pro_user_gender);?></td>
					<td><?php echo $out->pro_user_email;?></td>
					<td><?php echo $out->pro_user_address.', '.$out->pro_user_city.', '.$out->pro_user_state;?></td>
					<td><?php echo $out->pro_user_phone;?></td>
					<td><?php echo date("d M 'y",$out->pro_user_joined);?></td>
					<td><?php echo $out->pro_user_status=='1'?'Active':'Inactive';?></td>
					<td>
						<a href="<?php echo base_url();?>admin/edit_hruser/<?php echo $out->pro_user_id;?>" title="Edit" alt="Edit">
							<img src="<?php echo base_url();?>images/edit.png" />
						</a> 
					</td>
				</tr>
				<?php } ?>
				<?php if($pagelink!=''){?>
				<tr style="font-size:11px;">
					<td colspan="8" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php } ?>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="8" align="center"> No HR Users Available</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div class="clear"></div>