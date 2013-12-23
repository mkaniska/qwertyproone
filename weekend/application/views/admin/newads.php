<?php  if($this->session->flashdata('flash_data')!=''){$ads=$this->session->flashdata('flash_data');} ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Post New Ads</h2>
		<div style="margin:25px;">
			<form action="<?php echo base_url();?>admin/process_newads" method="post" name="addAds" onsubmit="return validAds();" enctype="multipart/form-data">
				<table width="80%" cellpadding="5" cellspacing="5" align="center" style="border:1px solid #ccc;">
					<tr>
						<td>
							<table width="80%" cellpadding="5" cellspacing="5" align="left" id="mytable">
								<tr>
									<td colspan="2">
										<div id="errorDisplay" style="color:#ff0000;margin-left:250px;float:left;font-weight:bold;">
										<?php if($this->session->flashdata('flash_message') !='') { ?>
											<?php echo $this->session->flashdata('flash_message'); ?>
										<?php } ?>
										</div>
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Ads Title</td> 
									<td width="70%"> 
										<input value="<?php if(isset($ads['ads_title'])) echo $ads['ads_title'];?>" type="text" name="ads_title" id="ads_title" class="input_fields" />
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Ads Status</td> 
									<td width="70%"> 
										<input value="1" type="radio" name="ads_status" id="ads_status" checked="checked"  /> Active &nbsp;
										<input value="0" type="radio" name="ads_status" id="ads_status"  /> In-Active 
									</td> 
								</tr>
								<tr>
									<td width="20%" class="form_label">Site URL</td> 
									<td width="70%"> 
										<input value="<?php if(isset($ads['ads_url'])) echo $ads['ads_url'];?>" type="text" name="ads_url" id="ads_url" class="input_fields" />
									</td>
								</tr>
								<tr>
									<td width="20%" class="form_label">Ads Image/Photo</td> 
									<td width="70%"> 
									<input type="file" name="userfile" id="userfile" class="input_fields" />
									</td> 
								</tr>
								<tr>
									<td width="20%" class="form_label" valign="top"> Comments</td> 
									<td width="70%"> 
									<textarea name="ads_comments" id="ads_comments" cols="40" rows="6"><?php if(isset($ads['ads_comments'])) echo $ads['ads_comments'];?></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2"> </td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" class="buttons" id="submitbutton" name="addAds" value="Submit" /> &nbsp;  &nbsp;
										<input type="button" class="buttons" id="cancel" value="Cancel" onclick="javascript:window.history.go(-1);" />
									</td>
								</tr>
								<tr>
									<td colspan="2"> </td>
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