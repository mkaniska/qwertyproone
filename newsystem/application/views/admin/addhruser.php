<?php $temp = $this->session->flashdata('flash_data'); ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Add HR User Account</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/prcess_addhruser" method="post" name="addHRUser" onsubmit="return validHRUser();">
				<table width="90%" cellpadding="5" cellspacing="5" align="center" style="border:1px solid #ccc;">
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
									<td width="15%" class="form_label"> Full Name</td> 
									<td width="35%"> 
									<input value="<?php if($temp['pro_user_full_name']!='') echo $temp['pro_user_full_name'];?>" type="text" name="full_name" id="full_name" class="input_fields" /></td> 
									<td width="15%" class="form_label"> HR Email Address</td> 
									<td width="35%"> 
									<input value="<?php if($temp['pro_user_email']!='') echo $temp['pro_user_email'];?>" type="text" name="email_address" id="email_address" class="input_fields" /></td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Gender</td> 
									<td width="35%"> 
									<input type="radio" name="gender" id="gender" value="male" checked="checked" /> Male &nbsp;
									<input type="radio" name="gender" id="gender" value="female" /> Fe-Male &nbsp;									
									</td> 
									<td width="15%" class="form_label"> Phone</td> 
									<td width="35%"> 
									<input value="<?php if($temp['pro_user_phone']!='') echo $temp['pro_user_phone'];?>" type="text" name="phone_number" id="phone_number" class="input_fields_very_small" /></td> 
								</tr>
								<tr>
									<td width="15%" class="form_label"> Company Address</td> 
									<td width="35%"> 
									<input value="<?php if($temp['pro_user_address']!='') echo $temp['pro_user_address'];?>" type="text" name="address" id="address" class="input_fields" /></td> 
									<td width="15%" class="form_label">Company City</td> 
									<td width="35%"> 
										<select name="city" id="city">
											<option value="0" selected="selected">Select City</option>
											<?php foreach($cities_list as $key=>$value) { ?>
												<option value="<?php echo $value;?>" <?php if($temp['pro_user_city']==$value){?> selected="selected" <?php } ?>><?php echo $value;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="15%" class="form_label">Company Zipcode</td> 
									<td width="35%"> 
									<input value="<?php if($temp['pro_user_zipcode']!='') echo $temp['pro_user_zipcode'];?>" type="text" name="zipcode" id="zipcode" class="input_fields_very_small" /></td> 
									<td width="15%" class="form_label">Company State</td> 
									<td width="35%"> 
										<select name="state" id="state">
											<option value="0" selected="selected">Select State</option>
											<?php foreach($state_list as $key=>$value) { ?>
												<option value="<?php echo $value->city_state;?>" <?php if($temp['pro_user_state']==$value->city_state){?> selected="selected" <?php } ?>><?php echo $value->city_state;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="4">
									<input type="hidden" name="selected_company" id="selected_company" value="<?php echo $this->session->userdata('selected_company');?>" />
									</td>
								</tr>
								<tr>
									<td colspan="4" align="center">
										<input type="submit" class="buttons" id="submitbutton" name="addUser" value="Submit" /> &nbsp;  &nbsp;
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