<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">Global Setting & Enabled IP List</h5>
		</div>
        <div class="clear"></div>
        <div id="contact_form">
            <div style="border:5px solid #CCCCCC;width:1000px;margin-top:-5px;"> <!-- 918F8D-->
				<form style="margin:5px;" method="post" name="settingsForm" id="settingsForm" action="<?php echo base_url();?>user/update_settings">
				<table width="95%" cellpadding="0" cellspacing="2" align="center">
					<tr>
						<td width="100%" colspan="5">
							<div id="errorDisplay" style="color:#ff0000;margin-left:340px;float:left;font-weight:bold;">
							<?php if($this->session->flashdata('flash_message') !='') { ?>
								<?php echo $this->session->flashdata('flash_message'); ?>
							<?php } ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="25%">
							Email Domain :<br />
							<input type="text" id="email_domain" name="email_domain" class="required input_field" style="width:160px;" />
						</td>
						<td width="25%">
							Address : <br />
							<input type="text" id="address" name="address" class="required input_field1" style="width:160px;" />
						</td>						
						<td width="25%">						
							City : <br />
							<select name="city" id="city">
								<option value="0" selected="selected">Select City</option>
								<?php foreach($cities_list as $key=>$value) { ?>
									<option value="<?php echo $value;?>"><?php echo $value;?></option>
								<?php } ?>
							</select>
						</td>
						<td width="25%" colspan="2">						
							State: <br />
							<select name="state" id="state">
								<option value="0" selected="selected">Select State</option>
								<?php foreach($states_list as $key=>$value) { ?>
									<option value="<?php echo $value->city_state;?>"><?php echo $value->city_state;?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="25%">
							Phone Number :<br />
							<input type="text" id="phone_number" name="phone_number" class="required input_field" style="width:150px;" />
						</td>
						<td width="25%">
							Site URL : <br />
							<input type="text" id="site_url" name="site_url" class="required input_field1" style="width:160px;" />
						</td>						
						<td width="25%">						
							Contact Email : <br />
							<input type="text" id="email_address" name="email_address" class="required input_field1" style="width:160px;" />
						</td>
						<td width="10%">
							Zipcode : <br />
							<input type="text" id="zipcode" name="zipcode" class="required input_field1" style="width:70px;" />
						</td>
						<td width="15%">
							<input onclick="javascript:alert();" type="button" name="doUpdate" id="doUpdate" value="Update" class="submit_btn float_l" />
						</td>
					</tr>
					<tr><td width="100%" colspan="5">  </td></tr>
			</table>
            </form>
			</div>
			<div id="searchedResult" style="overflow:auto;border:1px solid #CCCCCC;margin-left:0px;margin-top:20px;width:1000px;height:150px;text-align:center;">
				Please enter your city & time values to do a search on this sytem and to find the matching results.
			</div>
        </div>
        <div class="clear"></div>
</div>