<div class="grid_10">
	<div class="box round first grid">
		<h2>Global Settings</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/update_setting" method="post" name="updateSettings" onsubmit="return validSetting();">
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
									<td width="35%"> 
									<input value="<?php if($setting->from_email!='') echo $setting->from_email;?>" type="text" name="from_email" id="from_email" class="input_fields" /></td> 
									<td width="15%" class="form_label"> Contact Phone</td> 
									<td width="35%"> 
									<input value="<?php if($setting->contact_phone!='') echo $setting->contact_phone;?>" type="text" name="contact_phone" id="contact_phone" class="input_fields" /></td> 
								</tr>
								<tr>
									<td width="15%" class="form_label"> Contact Person</td> 
									<td width="35%"> 
									<input value="<?php if($setting->contact_person!='') echo $setting->contact_person;?>" type="text" name="contact_person" id="contact_person" class="input_fields" /></td> 
									<td width="15%" class="form_label"> Contact Email</td> 
									<td width="35%"> 
									<input value="<?php if($setting->contact_email!='') echo $setting->contact_email;?>" type="text" name="contact_email" id="contact_email" class="input_fields" /></td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Phone</td> 
									<td width="35%"> 
									<input value="<?php if($setting->office_phone!='') echo $setting->office_phone;?>" type="text" name="office_phone" id="office_phone" class="input_fields_very_small" /></td> 
									<td width="15%" class="form_label"> Send Email</td> 
									<td width="35%">
									<input type="radio" name="email_enabled" id="email_enabled" value="1" checked="checked" /> Enable 
									<input type="radio" name="email_enabled" id="email_enabled" value="0" <?php if($setting->email_enabled=='0') echo 'checked="checked"';?> /> Disable 
									</td>
								</tr>
								<tr>
									<td colspan="4"> </td>
								</tr>
								<tr>
									<td colspan="4" align="center">
										<input type="submit" class="buttons" id="submitbutton" name="updateSetting" value="Update" /> &nbsp;  &nbsp;
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