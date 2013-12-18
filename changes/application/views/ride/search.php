<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">Search for a Ride</h5>
		</div>
        <div class="clear"></div>
        <div id="contact_form">
            <div style="border:6px solid #CCCCCC;width:1000px;margin-top:-10px;"> <!-- 918F8D-->
				<form style="margin:5px;" method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact">
				<table width="90%" cellpadding="4" cellspacing="3" align="center">
					<tr>
						<td width="100%" colspan="4">
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
						<td width="40%">
							Address From/To: <br />
							<input type="text" id="search_address" class="required input_field" onkeyup="javascript:getMatchingLocation(this.value);" />
						</td>						
						<td width="20%">						
						Start Time: <br />
							<select name="start_time" id="start_time">
								<?php foreach($time_slots as $value) { ?>
									<option value="<?php echo $value->slot_value;?>" <?php if($value->slot_value=='08:00:00'){ ?> selected="selected" <?php } ?>><?php echo $value->slot_label;?></option>
								<?php } ?>
							</select>
						</td>
						<td width="20%">						
						Return Time: <br />
							<select name="return_time" id="return_time">
								<?php foreach($time_slots as $value) { ?>
									<option value="<?php echo $value->slot_value;?>" <?php if($value->slot_value=='17:00:00'){ ?> selected="selected" <?php } ?>><?php echo $value->slot_label;?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
				</table>
				<table width="60%" cellpadding="4" cellspacing="3" align="center">
					<tr>
						<td width="15%">
							Searching for : <br />
							<select name="travel_type" id="travel_type" onchange="javascript:enableDisable(this.value)">
								<option value="driver">Vehichle</option>
								<option value="passenger">Passenger</option>
							</select>
						</td>
						<td width="15%">
							Vehicle Type : <br />
							<select name="vehicle_type" id="vehicle_type">
								<option value="Any">Any</option>
								<option value="Car">Car</option>
								<option value="Bike">Bike</option>
							</select> &nbsp; &nbsp;
						</td>
						<td width="15%">
							Gender Preference : <br />
							<select name="preferred_gender" id="preferred_gender">
								<option value="All">Any</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select> &nbsp; &nbsp;							
						</td>
						<td width="20%"> <br />
							<input onclick="javascript:findMatchingRides();" type="button" name="doSearch" id="doSearch" value="Search" class="button" />
						</td>
					</tr>
					<tr><td width="100%" colspan="4">  </td></tr>
			</table>
            </form>
			</div>
			<div id="searchedResult" style="overflow:auto;border:1px solid #CCCCCC;margin-left:0px;margin-top:20px;width:1000px;height:150px;text-align:center;">
				Please enter your city & time values to do a search on this sytem and to find the matching results.
			</div>
        </div>
        <div class="clear"></div>
</div>