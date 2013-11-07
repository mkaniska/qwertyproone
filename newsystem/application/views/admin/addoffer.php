<div class="grid_10">
	<div class="box round first grid">
		<h2>Add New Offer</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/prcess_addoffer" method="post" name="addOffer" onsubmit="return validOffer();">
				<table width="90%" cellpadding="5" cellspacing="5" align="center" style="border:1px solid #ccc;">
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
									<td width="15%" class="form_label">Offer Title</td> 
									<td width="35%"> <input type="text" name="offer_title" id="offer_title" class="input_fields" /></td> 
									<td width="15%" class="form_label">Offer Type</td> 
									<td width="35%"> 
										<select name="offer_type" id="offer_type">
											<option value="0" selected="selected">Select Type</option>
											<?php foreach($offer_types as $key=>$value) { ?>
												<option value="<?php echo $value->offer_type_id;?>"><?php echo $value->offer_type;?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="15%" class="form_label"> Valid From</td> 
									<td width="35%"> 
									<input type="text" name="valid_from" id="valid_from" class="input_fields_very_small" readonly="readonly" /> &nbsp;
									</td> 
									<td width="15%" class="form_label"> Valid To</td> 
									<td width="35%"> 
									<input type="text" name="valid_to" id="valid_to" class="input_fields_very_small" readonly="readonly" /></td>
								</tr>
								<tr>
									<td width="15%" class="form_label" valign="top"> Status</td> 
									<td width="35%" valign="top">
										<input type="radio" name="status" id="status" value="1" checked="checked" /> Active 
										<input type="radio" name="status" id="status" value="0" /> In-Active 
									</td>
									<td width="15%" class="form_label" valign="top"> Notes</td> 
									<td width="35%"> 
									<textarea name="notes" id="notes" cols="40" rows="6"></textarea>
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