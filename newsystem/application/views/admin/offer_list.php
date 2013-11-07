<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Offers <font style="color:#E16715;">[ Total <?php echo $total;?> offers posted ]</font></h2>
            <div style="line-height:25px;padding-top:10px;"> <!-- 918F8D-->
			<table width="100%" cellpadding="3" cellspacing="3" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="7">
						<div id="errorDisplay" style="color:#ff0000;margin-left:400px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
					<td width="25%">Offer Title</td>
					<td width="10%">Offer Type</td>
					<td width="15%">Valid From</td>
					<td width="15%">Valid Upto</td>
					<td width="10%">Offer Status</td>
					<td width="15%">Created On</td>
					<td width="15%">Action</td>
				</tr>
				<?php if(count($offer_list)>0){foreach($offer_list as $out) { ?>
				<tr style="font-size:11px;">
					<td><?php echo $out->offer_title;?></td>
					<td><?php echo $out->offer_type;?></td>
					<td><?php echo date("d M 'y",$out->offer_valid_from);?> </td>
					<td><?php echo date("d M 'y",$out->offer_valid_until);?></td>
					<td><?php echo $out->offer_status==1?'Active':'Inactive';?></td>
					<td><?php echo date("d M 'y",$out->offer_created_on);?></td>
					<td> &nbsp; &nbsp;
						<a href="javascript:pickSelectedCompany(<?php echo $out->offer_id;?>);" id="listcompany" title="Assign Company" alt="Assign Company">
							<img src="<?php echo base_url();?>admin-images/pluse.png" />
						</a> &nbsp; &nbsp; 
						<a href="<?php echo base_url();?>admin/edit_offer/<?php echo $out->offer_id;?>" title="Edit" alt="Edit">
							<img src="<?php echo base_url();?>images/edit.png" />
						</a> &nbsp; &nbsp; 
						<a title="Delete" alt="Delete" href="<?php echo base_url();?>admin/delete_offer/<?php echo $out->offer_id;?>" onclick="return confirm('Are you sure to delete this offer ?');">
							<img src="<?php echo base_url();?>images/delete.png" />
						</a>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center">No Offers Added</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div id="dialog" title="Select the Company" style="width:200px;height:400px;overflow:auto;display:none;">
	<form method="post" name="selectCompany" action="<?php echo base_url();?>admin/assign_company">
		<table width="90%" border="0">
			<tr>
				<td width="15%"> </td>
				<td width="85%"> </td>
			</tr>
			<?php foreach($company_list as $out) { ?>
			<tr style="font-size:11px;">
				<td>
					<input type="checkbox" name="compList[]" value="<?php echo $out->company_id;?>" /> 
				</td>
				<td><?php echo $out->company_name;?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2" align="center"> <input type="button" class="buttons" value="Done" onclick="javascript:doneSelectCompany();" /> 
				<input type="hidden" name="selectedCompanies" id="selectedCompanies" value=""  />
				<input type="hidden" name="selectedOffer" id="selectedOffer" value=""  />
				</td>
			</tr>		
		</table>
	</form>
</div>
<div class="clear"></div>