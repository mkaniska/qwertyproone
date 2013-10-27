<div id="website_main" class="wrapper">
	<div id="content_full" class="left">
        <div class="post">
            <h2>Add New Company</h2>
			<div style="border:1px solid #CCCCCC;line-height:25px;"><!-- 918F8D-->
			<form action="<?php echo base_url();?>admin/process_addcompany" method="post" style="margin:20px;" onsubmit="return isValidCompany();" style="color:#555555;">
				<table width="100%" cellpadding="4" cellspacing="3" align="center">
					<tr>
						<td width="100%" colspan="2">
							<div id="errorDisplay" style="color:#ff0000;margin-left:200px;float:left;font-weight:bold;">
							<?php if($this->session->flashdata('flash_message') !='') { ?>
								<?php echo $this->session->flashdata('flash_message'); ?>
							<?php } ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="50%">						
						Company Name : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
						</td>						
						<td width="50%">
						Primary Contact Person : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="50%">						
						Primary Contact Email : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
						</td>						
						<td width="50%">
						Company Address : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="100%" colspan="2"> City : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="100%" colspan="2"> State : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="100%" colspan="2"> Zip Code : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="100%" colspan="2" align="center">
							<input class="submit_btn float_l" type="submit" name="post_ride" id="post_ride" value="Submit" /> &nbsp; &nbsp;
							<input class="submit_btn float_l" type="button" name="doCancel" id="doCancel" value="Cancel" />  	
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
				</table>
				</form>
				</div>
        </div>
        <div class="post2">

        </div>

    </div> <!-- END of content half -->
    <div class="clear"></div>
</div>