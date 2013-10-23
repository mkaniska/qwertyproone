<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">Search for a Ride</h5>
		</div>
        <div class="clear"></div>
        <div id="contact_form">
            <div style="border:6px solid #CCCCCC;width:1000px;"> <!-- 918F8D-->
				<form style="margin:5px;" method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact">
				<table width="100%" cellpadding="4" cellspacing="3" align="center">
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
						<td width="20%"> City :<br />
							<select name="city" id="city">
								<option value="0" selected="selected">Select City</option>
								<?php foreach($cities_list as $key=>$value) { ?>
									<option value="<?php echo $value;?>"><?php echo $value;?></option>
								<?php } ?>
							</select>
						</td>
						<td width="20%">
							Address From/To: <br />
							<input type="text" id="search_address" class="required input_field1" onkeyup="javascript:getMatchingLocation(this.value);" />
						</td>						
						<td width="15%">						
						Start Time: <br />
							<select name="start_time" id="start_time">
								<?php foreach($time_slots as $value) { ?>
									<option value="<?php echo $value->slot_value;?>" <?php if($value->slot_value=='08:00:00'){ ?> selected="selected" <?php } ?>><?php echo $value->slot_label;?></option>
								<?php } ?>
							</select>
						</td>
						<td width="15%">						
						Return Time: <br />
							<select name="return_time" id="return_time">
								<?php foreach($time_slots as $value) { ?>
									<option value="<?php echo $value->slot_value;?>" <?php if($value->slot_value=='17:00:00'){ ?> selected="selected" <?php } ?>><?php echo $value->slot_label;?></option>
								<?php } ?>
							</select>
						</td>
						<td width="30%">
							Searching for : <br />
							<select name="travel_type" id="travel_type">
								<option value="driver">A Vehichle</option>
								<option value="passenger">A Passenger</option>
							</select> &nbsp; &nbsp;
							<input onclick="javascript:findMatchingRides();" type="button" name="doSearch" id="doSearch" value="Go" class="submit_btn float_l" />
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