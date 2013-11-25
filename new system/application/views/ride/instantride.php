<div id="website_main" class="wrapper">
	<div id="content_full" class="left">
        <div class="post">
            <h2>Post an Instant Ride</h2>
			<div style="border:1px solid #CCCCCC;line-height:25px;"><!-- 918F8D-->
			<form action="<?php echo base_url();?>ride/process_instantride" method="post" style="margin:10px;" onsubmit="return isValidInstantRide();" style="color:#555555;">
				<table width="90%" cellpadding="4" cellspacing="3" align="center">
					<tr>
						<td width="100%" colspan="4">
							<div id="errorDisplay" style="color:#ff0000;margin-left:200px;float:left;font-weight:bold;">
							<?php if($this->session->flashdata('flash_message') !='') { ?>
								<?php echo $this->session->flashdata('flash_message'); ?>
							<?php } ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="100%" colspan="4" style="color:#E16715;font-weight:bold;">
							Ride Type :&nbsp;   
							<input type="radio" id="one_way" name="one_way" value="0" checked="checked" onclick="javascript:changeTrip(this.value)" /> Up & Down &nbsp; &nbsp;
							<input type="radio" id="one_way" name="one_way" value="1" onclick="javascript:changeTrip(this.value)" /> One Way
						</td>
					</tr>
					<tr>
						<td width="25%">						
						City: <br />
							<select name="city" id="city">
								<option value="0" selected="selected">Select City</option>
								<?php foreach($cities_list as $key=>$value) { ?>
									<option value="<?php echo $value;?>"><?php echo $value;?></option>
								<?php } ?>
							</select>
						</td>						
						<td width="25%">
						I am a : <br />
							<select name="travel_type" id="travel_type" onchange="javascript:otherInput(this.value);">
								<option value="driver" selected="selected">Vehicle Owner</option>
								<option value="passenger">Passenger</option>
							</select>
						</td>
						<td width="25%">						
						Start Time: <br />
							<select name="start_time" id="start_time">
							<?php foreach($time_slots as $value) { ?>
								<option value="<?php echo $value->slot_value;?>" <?php if($value->slot_value=='08:00:00'){ ?> selected="selected" <?php } ?>><?php echo $value->slot_label;?></option>
							<?php } ?>
							</select>
						</td>						
						<td width="25%">
						Return Time : <br />
							<select name="return_time" id="return_time">
							<?php foreach($time_slots as $value) { ?>
								<option value="<?php echo $value->slot_value;?>" <?php if($value->slot_value=='17:00:00'){ ?> selected="selected" <?php } ?>><?php echo $value->slot_label;?></option>
							<?php } ?>
							</select>
						</td>						
					</tr>
					<tr>
						<td width="50%"> Origin :&nbsp; <br /> <input onKeyPress="return disableEnterKey(event)" type="text" name="origin_from" id="searchTextField" class="required input_field" style="width:250px;" /></td>
						<td width="50%"> Destination :&nbsp;<br /> <input onKeyPress="return disableEnterKey(event)" type="text" name="destination_to" id="searchTextField2" class="required input_field" style="width:250px;" /></td>
						<td width="25%"> Vehicle Type : <br />
							<select name="vehicle_type" id="vehicle_type">
								<option value="Car" selected="selected">Car</option>
								<option value="Bike">Bike</option>
							</select>
						</td>
						<td width="25%"> Fuel Type :&nbsp; 	<br/> 
							<select name="fuel_type" id="fuel_type">
								<option value="Diesel" selected="selected">Diesel</option>
								<option value="Petrol">Petrol</option>
								<option value="LPG">LPG</option>
							</select>						
						</td>
					</tr>
					<tr>
						<td width="40%"> Model Type : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" /> <br />
							[Eg: Hero Honda, Yemaha, etc]
						</td>						
						<td width="60%" colspan="3" align="center">
							<input class="submit_btn float_l" type="submit" name="post_ride" id="post_ride" value="Submit" /> &nbsp; &nbsp;
							<input class="submit_btn float_l" type="button" name="doCancel" id="doCancel" value="Cancel" />  	
						</td>
					</tr>
					<tr><td width="100%" colspan="4">  </td></tr>
					<tr style="display:none;">
						<td width="50%" style="padding-left:15px;" colspan="2"><div id="map-canvas" style="width: 380px;height:190px;"></div></td>
						<td width="50%" style="padding-left:50px;" colspan="2"><div id="map-canvas2" style="width: 380px;height:190px;"></div></td>
					</tr>
				</table>
				</form>
				</div>
        </div>
    </div> <!-- END of content half -->
    <div class="clear"></div>
</div>