<form method="post" id="selectCompany" name="selectCompany" action="<?php echo base_url();?>admin/assign_company">
	<table width="100%" cellpadding="3" cellspacing="3" align="center" border="1">
		<?php foreach($company_list as $out) { ?>
		<tr style="font-size:11px;">
			<td>
				<input type="checkbox" name="compList[]" value="<?php echo $out->company_id;?>" <?php if(in_array($out->company_id,$assigned_list)) { ?> checked="checked" <?php } ?> /> 
			</td>
			<td><?php echo $out->company_name;?></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="2" align="center"> 
				<input type="button" id="doAssignment" class="buttons" value="Done" onclick="javascript:doneSelectCompany();" /> 
				<input type="hidden" name="selectedCompanies" id="selectedCompanies" value="<?php echo $list_string;?>" />
				<input type="hidden" name="selectedOffer" id="selectedOffer" value="<?php echo $offer_id;?>"  />
			</td>
		</tr>
	</table>
</form>