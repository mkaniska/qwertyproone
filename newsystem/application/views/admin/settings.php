<div class="grid_10">
	<div class="box round first grid">
		<h2>Global Settings</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/prcess_addcompany" method="post" name="updateSettings" onsubmit="return validSetting();">
				<table width="80%" cellpadding="5" cellspacing="5" align="center" style="border:1px solid #ccc;">
					<tr>
						<td>
							<table width="100%" cellpadding="5" cellspacing="5" align="center" id="mytable">
								<tr>
									<td colspan="4">
										<div id="errorDisplay" style="color:#ff0000;margin-left:200px;float:left;font-weight:bold;">
										<?php if($this->session->flashdata('flash_message') !='') { ?>
											<?php echo $this->session->flashdata('flash_message'); ?>
										<?php } ?>
										</div>
									</td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> From Email</td> 
									<td width="35%"> <input type="text" name="from_email" id="from_email" class="input_fields" /></td> 
									<td width="15%" class="form_label"> Contact Phone</td> 
									<td width="35%"> <input type="text" name="contact_phone" id="contact_phone" class="input_fields" /></td> 
								</tr>
								<tr>
									<td width="15%" class="form_label"> Contact Person</td> 
									<td width="35%"> <input type="text" name="contact_person" id="contact_person" class="input_fields" /></td> 
									<td width="15%" class="form_label"> Contact Email</td> 
									<td width="35%"> <input type="text" name="contact_email" id="contact_email" class="input_fields" /></td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Phone</td> 
									<td width="35%"> <input type="text" name="phone" id="phone" class="input_fields_small" /></td> 
									<td width="15%" class="form_label"> Status</td> 
									<td width="35%">
									<input type="radio" name="status" id="status" value="1" checked="checked" /> Active 
									<input type="radio" name="status" id="status" value="0" /> In-Active 
									</td>
								</tr>
								<tr>
									<td colspan="4"> </td>
								</tr>
								<tr>
									<td colspan="4" align="center">
										<input type="submit" class="buttons" id="submitbutton" name="addCompany" value="Update" /> &nbsp;  &nbsp;
										<input type="button" class="buttons" id="cancelbutton" value="Cancel" />
									</td>
								</tr>
								<tr>
									<td colspan="4"> </td>
								</tr>
							</table>
						</td>
					</tr>				
				</table>
			</form>
		</div>
	</div>
</div>
<div class="clear"></div>