<?php $temp = $this->session->flashdata('flash_data'); ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Add New Company</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/process_addcompany" method="post" name="addCompany" onsubmit="return validCompany();">
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
									<td width="15%" class="form_label"> Company Name</td> 
									<td width="35%"> 
									<input value="<?php if($temp['company_name']!='') echo $temp['company_name'];?>" type="text" name="company_name" id="company_name" class="input_fields" /></td> 
									<td width="15%" class="form_label"> Company Type</td> 
									<td width="35%"> 
										<select name="company_type" id="company_type">
											<option value="0" selected="selected">Select Type</option>
											<?php foreach($company_types as $key=>$value) { ?>
												<option value="<?php echo $value->company_type_id;?>" <?php if($temp['company_type']==$value->company_type_id){?> selected="selected" <?php } ?>><?php echo $value->company_type;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Contact Person/HR</td> 
									<td width="35%"> 
									<input value="<?php if($temp['contact_person']!='') echo $temp['contact_person'];?>" type="text" name="contact_person" id="contact_person" class="input_fields" /></td> 
									<td width="15%" class="form_label"> Contact/HR Email</td> 
									<td width="35%"> 
									<input value="<?php if($temp['contact_email']!='') echo $temp['contact_email'];?>" type="text" name="contact_email" id="contact_email" class="input_fields" /></td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Company Address</td> 
									<td width="35%"> 
									<input value="<?php if($temp['company_address']!='') echo $temp['company_address'];?>" type="text" name="company_address" id="company_address" class="input_fields" /></td> 
									<td width="15%" class="form_label"> City</td> 
									<td width="35%"> 
										<select name="city" id="city">
											<option value="0" selected="selected">Select City</option>
											<?php foreach($cities_list as $key=>$value) { ?>
												<option value="<?php echo $value;?>" <?php if($temp['company_city']==$value){?> selected="selected" <?php } ?>><?php echo $value;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Zipcode</td> 
									<td width="35%"> 
									<input value="<?php if($temp['company_zipcode']!='') echo $temp['company_zipcode'];?>" type="text" name="zipcode" id="zipcode" class="input_fields_small" /></td> 
									<td width="15%" class="form_label"> State</td> 
									<td width="35%"> 
										<select name="state" id="state">
											<option value="0" selected="selected">Select State</option>
											<?php foreach($state_list as $key=>$value) { ?>
												<option value="<?php echo $value->city_state;?>" <?php if($temp['company_state']==$value->city_state){?> selected="selected" <?php } ?>><?php echo $value->city_state;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Phone</td> 
									<td width="35%"> 
									<input value="<?php if($temp['company_phone']!='') echo $temp['company_phone'];?>" type="text" name="phone" id="phone" class="input_fields_small" /></td> 
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
										<input type="submit" class="buttons" id="submitbutton" name="addCompany" value="Submit" /> &nbsp;  &nbsp;
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