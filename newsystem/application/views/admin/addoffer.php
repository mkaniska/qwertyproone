<?php  if($this->session->flashdata('flash_data')!=''){$offer=$this->session->flashdata('flash_data');} ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Add New Offer</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/process_addoffer" method="post" name="addOffer" onsubmit="return validOffer();" enctype="multipart/form-data">
				<table width="100%" cellpadding="5" cellspacing="5" align="center" style="border:1px solid #ccc;">
					<tr>
						<td>
							<table width="100%" cellpadding="5" cellspacing="5" align="center" id="mytable">
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
									<td width="20%" class="form_label">Offer Title</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['offer_title'])) echo $offer['offer_title'];?>" type="text" name="offer_title" id="offer_title" class="input_fields" /></td> 
									<td width="20%" class="form_label">Offer Type</td> 
									<td width="30%"> 
										<select name="offer_type" id="offer_type">
											<option value="0" selected="selected">Select Type</option>
											<?php foreach($offer_types as $key=>$value) { ?>
												<option value="<?php echo $value->offer_type_id;?>" <?php if(isset($offer['offer_type'])){if($offer['offer_type']==$value->offer_type_id) echo 'selected="selected"';}?>><?php echo $value->offer_type;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Offer Provider</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['offer_provider'])) echo $offer['offer_provider'];?>" type="text" name="offer_provider" id="offer_provider" class="input_fields" /></td> 
									<td width="20%" class="form_label">Provider Address</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['provider_address'])) echo $offer['provider_address'];?>" type="text" name="provider_address" id="provider_address" class="input_fields" />
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Contact Person</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['contact_person'])) echo $offer['contact_person'];?>" type="text" name="contact_person" id="contact_person" class="input_fields" /></td> 
									<td width="20%" class="form_label">Contact Phone</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['contact_phone'])) echo $offer['contact_phone'];?>" type="text" name="contact_phone" id="contact_phone" class="input_fields_very_small" />
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Contact Email</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['contact_email'])) echo $offer['contact_email'];?>" type="text" name="contact_email" id="contact_email" class="input_fields" /></td> 
									<td width="20%" class="form_label">Offer Picture</td> 
									<td width="30%"> 
									<input type="file" name="userfile" id="userfile" class="input_fields" />
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Minimum Purchase Amount</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['minimum_purchase_amount'])) echo $offer['minimum_purchase_amount'];?>" type="text" name="minimum_purchase_amount" id="minimum_purchase_amount" class="input_fields_very_small" />
									&nbsp; [Total Cost of Purchase]
									</td> 
									<td width="20%" class="form_label">Minimum Purchase Quantity</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['minimum_purchase_quantity'])) echo $offer['minimum_purchase_quantity'];?>" type="text" name="minimum_purchase_quantity" id="minimum_purchase_quantity" class="input_fields_very_small" />
										&nbsp; [Total # of Items]
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Offer Percentage</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['offer_percentage'])) echo $offer['offer_percentage'];?>" type="text" name="offer_percentage" id="offer_percentage" class="input_fields_very_small" />
									&nbsp; [%]
									</td> 
									<td width="20%" class="form_label">Offer Amount</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['offer_amount'])) echo $offer['offer_amount'];?>" type="text" name="offer_amount" id="offer_amount" class="input_fields_very_small" /> &nbsp; [Rs]
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label"> Valid From</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['valid_from'])) echo $offer['valid_from'];?>" type="text" name="valid_from" id="valid_from" class="input_fields_very_small" readonly="readonly" /> &nbsp;
									</td> 
									<td width="20%" class="form_label"> Valid To</td> 
									<td width="30%"> 
									<input value="<?php if(isset($offer['valid_to'])) echo $offer['valid_to'];?>" type="text" name="valid_to" id="valid_to" class="input_fields_very_small" readonly="readonly" /></td>
								</tr>								
								<tr>
									<td width="20%" class="form_label" valign="top"> Conditions Apply</td> 
									<td width="30%"> 
									<textarea name="conditions_apply" id="conditions_apply" cols="40" rows="6">
									 <?php if(isset($offer['conditions_apply'])) echo $offer['conditions_apply'];?>
									</textarea>
									</td> 									
									<td width="20%" class="form_label" valign="top"> Notes</td> 
									<td width="30%"> 
									<textarea name="notes" id="notes" cols="40" rows="6">
									<?php if(isset($offer['offer_notes'])) echo $offer['offer_notes'];?>
									</textarea>
									</td> 
								</tr>
								<tr>
									<td colspan="4"> </td>
								</tr>
								<tr>
									<td colspan="4" align="center">
										<input type="submit" class="buttons" id="submitbutton" name="addOffer" value="Submit" /> &nbsp;  &nbsp;
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