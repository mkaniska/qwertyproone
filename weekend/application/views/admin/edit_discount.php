<?php  if($this->session->flashdata('flash_data')!=''){$discount=$this->session->flashdata('flash_data');} ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Add New Discount</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/process_updatediscount" method="post" name="updateDiscount" onsubmit="return validDiscount();" enctype="multipart/form-data">
				<table width="100%" cellpadding="5" cellspacing="5" align="center" style="border:1px solid #ccc;">
					<tr>
						<td>
							<table width="90%" cellpadding="5" cellspacing="5" align="center" id="mytable">
								<tr>
									<td colspan="4">
										<div id="errorDisplay" style="color:#ff0000;margin-left:250px;float:left;font-weight:bold;">
										<?php if($this->session->flashdata('flash_message') !='') { ?>
											<?php echo $this->session->flashdata('flash_message'); ?>
										<?php } ?>
										</div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Discount Title</td> 
									<td width="30%"> 
									<input value="<?php if($discount->discount_title!='') echo $discount->discount_title;?>" type="text" name="discount_title" id="discount_title" class="input_fields" /></td> 
									<td width="20%" class="form_label">Discount Type</td> 
									<td width="30%"> 
										<select name="discount_type" id="discount_type">
											<option value="0" selected="selected">Select Type</option>
											<option value="Bank"  <?php if($discount->discount_type=='Bank') echo 'selected="selected"';?>>Bank</option>
											<option value="Credit Card" <?php if($discount->discount_type=='Credit Card') echo 'selected="selected"';?>>Credit Card</option>
											<option value="Mobile" <?php if($discount->discount_type=='Mobile') echo 'selected="selected"';?>>Mobile Tariff</option>
											<option value="Internet" <?php if($discount->discount_type=='Internet') echo 'selected="selected"';?>>Internet</option>
										</select>
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Discount Provider</td> 
									<td width="30%"> 
									<input value="<?php if($discount->discount_provider!='') echo $discount->discount_provider;?>" type="text" name="discount_provider" id="discount_provider" class="input_fields" /></td> 
									<td width="20%" class="form_label">Applicable City</td> 
									<td width="30%">
										<select name="discount_city" id="discount_city">
											<option value="0" selected="selected">Select</option>
											<?php foreach($cities_list as $key=>$value) { ?>
												<option value="<?php echo $value;?>" <?php if($value==$discount->discount_city) echo 'selected="selected"';?>><?php echo $value;?></option>
											<?php } ?>							
										</select>
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Contact Person</td> 
									<td width="30%"> 
									<input value="<?php if($discount->contact_person!='') echo $discount->contact_person;?>" type="text" name="contact_person" id="contact_person" class="input_fields" /></td> 
									<td width="20%" class="form_label">Contact Phone</td> 
									<td width="30%"> 
									<input value="<?php if($discount->contact_phone!='') echo $discount->contact_phone;?>" type="text" name="contact_phone" id="contact_phone" class="input_fields_very_small" />
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label" valign="top"> Image / Pamphlet</td> 
									<td width="30%" valign="top"> 
									<input type="file" name="userfile" />
									</td> 									
									<td width="20%" class="form_label" valign="top"> Notes</td> 
									<td width="30%"> 
									<textarea name="discount_notes" id="discount_notes" cols="40" rows="6"><?php if($discount->discount_notes!='') echo $discount->discount_notes;?></textarea>
									</td> 
								</tr>
								<tr>
									<td colspan="4"> </td>
								</tr>
								<tr>
									<td colspan="4" align="center">
										<input type="submit" class="buttons" id="submitbutton" name="editDiscount" value="Update" /> &nbsp;  &nbsp;
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