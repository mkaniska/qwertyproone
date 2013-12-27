<div id="website_main" class="wrapper">
	<div id="content" class="left">
        <div class="post">
            <h2>Poar a New Ride</h2>
			<div style="border:1px solid #918F8D;">
			<form action="" method="post" style="margin:10px;">
				<table width="100%" cellpadding="4" cellspacing="3" align="center">
					<tr><td width="100%" colspan="2"><div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
					<?php if($this->session->flashdata('flash_message') !='') { ?>
						<?php echo $this->session->flashdata('flash_message'); ?>
					<?php } ?>
					</div></td></tr>
					<tr>
						<td width="50%">						
						City: <br />
							<select name="city" id="city">
								<option value="0" selected="selected">Select</option>
								<?php foreach($cities_list as $key=>$value) { ?>
									<option value="<?php echo $value;?>"><?php echo $value;?></option>
								<?php } ?>
							</select>
							
						</td>						
						<td width="50%">
						I am a : <br />
							<select name="travel_type" id="travel_type">
								<option value="driver" selected="selected">Vehicle Owner</option>
								<option value="passenger">Passenger</option>
							</select>								
							<input type="radio" id="travel_type2" name="travel_type" value="driver" checked="checked" /> Vehicle Owner &nbsp; 
							<input type="radio" id="travel_type1" name="travel_type" value="passenger" /> Passenger
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="50%"> Origin :&nbsp; <input onKeyPress="return disableEnterKey(event)" type="text" name="origin_from" id="searchTextField" class="required input_field" style="width:250px;" /></td>
						<td width="50%"> Destination :&nbsp; <input onKeyPress="return disableEnterKey(event)" type="text" name="destination_to" id="searchTextField2" class="required input_field" style="width:250px;" /></td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="50%"> Vehicle Type :&nbsp; <br/> <input type="radio" id="vehicle_type" name="vehicle_type" value="Car" checked="checked" />Car &nbsp; &nbsp;<input type="radio" id="vehicle_type" name="vehicle_type" value="Bike" />Bike</td>
						<td width="50%"> Fuel Type :&nbsp; 	<br/> <input type="radio" id="fuel_type" name="fuel_type" value="Diesel" checked="checked" /> Diesel &nbsp; 
							<input type="radio" id="fuel_type" name="fuel_type" value="Petrol" /> Petrol &nbsp;
							<input type="radio" id="fuel_type" name="fuel_type" value="LPG" /> LPG &nbsp;</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr id="model">
						<td width="100%" colspan="2"> Model Type : <br />
							<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
							[Eg: Hero Honda, Yemaha, etc]
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr style="display:none;">
						<td width="50%" style="padding-left:15px;"><div id="map-canvas" style="width: 380px;height:190px;"></div></td>
						<td width="50%" style="padding-left:50px;"><div id="map-canvas2" style="width: 380px;height:190px;"></div></td>
					</tr>
					<tr>
						<td width="100%" colspan="2" align="left">
							<input type="checkbox" id="travel_alert" name="travel_alert" value="1" /> Alert me when someone Joins on my Route
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
					<tr>
						<td width="100%" colspan="2" align="center">
							<input class="submit_btn float_l" type="submit" name="post_ride" id="post_ride" value="Submit" /> &nbsp; &nbsp;
							<input class="submit_btn float_l" type="button" name="doCancel" id="doCancel" value="Cancel" />  	
						</td>
					</tr>
				</table>
				</form>
				</div>
        </div>
        <div class="post2">

        </div>

    </div> <!-- END of content half -->
    <!-- START of sidebar -->
	<?php $this->load->view('sidebar'); ?>
    <!-- END of sidebar -->
    <div class="clear"></div>
</div>