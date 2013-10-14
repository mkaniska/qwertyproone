<div id="website_main" class="wrapper">

		<h5 style="padding-bottom:15px;">Corporate Office</h5>
		
		<div class="cleaner"></div>
    
        <div id="contact_form">
           <form method="post" name="contact" action="#">
           
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Nunc tincidunt</a></li>
					<li><a href="#tabs-2">Proin dolor</a></li>
					<li><a href="#tabs-3">Aenean lacinia</a></li>
				</ul>
				<div id="tabs-1">
					<table width="100%" cellpadding="4" cellspacing="3">
								<tr><td width="100%" colspan="2"><div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;"></div></td></tr>
								<tr>
									<td width="75%" colspan="2"> <label>City:&nbsp;</label>
										<p style="margin-left:60px;"><select name="city" id="city">
											<option value="0" selected="selected">Select</option>
											<?php foreach($cities_list as $key=>$value) { ?>
												<option value="<?php echo $value;?>"><?php echo $value;?></option>
											<?php } ?>							
										</select>
										</p>
									</td>
								</tr>
								<tr><td width="50%">   </td><td width="50%"></td></tr>
								<tr>
									<td width="50%"><label>Start Time:&nbsp;</label>
										<select name="start_time" id="start_time">
										<option value="0" selected="selected">Select Start Time</option>					
										<?php $inc=12;for($i=0;$i<24;$i++) { $ampm=($i<12?' AM':' PM');?>
											<?php for($j=0;$j<=55;$j=$j+5) { ?>
												<option value="<?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?>"><?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?></option>
											<?php } $inc=($i<12?($i+1):($i-11));?>
										<?php } ?>
										</select>
									</td>
									<td width="50%"><label>Return Time:&nbsp;</label>
										<select name="return_time" id="return_time">
										<option value="0" selected="selected">Select Return Time</option>					
										<?php $inc=12;for($i=0;$i<24;$i++) { $ampm=($i<12?' AM':' PM');?>
											<?php for($j=0;$j<=55;$j=$j+5) { ?>
												<option value="<?php echo $default=$inc.':'.(($j<10)?'0'.$j:$j).$ampm;?>"><?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?></option>
											<?php } $inc=($i<12?($i+1):($i-11));?>
										<?php } ?>
										</select>
									</td>
								</tr>
								<tr><td width="50%">   </td><td width="50%"></td></tr>			
								<tr>
									<td width="50%"><label>Origin:&nbsp;</label><input onKeyPress="return disableEnterKey(event)" type="text" name="origin_from" id="searchTextField" class="required input_field" style="width:250px;" /></td>
									<td width="50%"><label>Destination:&nbsp;</label><input onKeyPress="return disableEnterKey(event)" type="text" name="destination_to" id="searchTextField2" class="required input_field" style="width:250px;" /></td>
								</tr>
								<tr><td width="50%">   </td><td width="50%"></td></tr>
								<tr>
									<td width="50%"><div id="map-canvas" style="width: 350px;height:300px;"></div></td>
									<td width="50%"><div id="map-canvas2" style="width: 350px;height:300px;"></div></td>
								</tr>
								<tr><td width="50%">   </td><td width="50%"></td></tr>
								<tr>
									<td width="100%" colspan="2" align="center">
										<input style="font-weight: bold;" type="button" name="next1" id="next1" value="Continue" />	
									</td>
								</tr>
							</table>					
				</div>
				<div id="tabs-2">
					<table width="60%" cellpadding="4" cellspacing="3">
						<tr><td width="100%" colspan="2" align="left"><div id="errorDisplay1" style="color:#ff0000;margin-left:100px;float:left;"></div></td></tr>
						<tr>
							<td width="50%"> I am a : </td>
							<td width="50%">
								<input type="radio" id="travel_type1" name="travel_type" value="passenger" checked="checked" /> <label>Passenger</label> &nbsp; 
								<input type="radio" id="travel_type2" name="travel_type" value="driver" /> <label>Vehicle Owner</label>
							</td>
						</tr>
						<tr><td width="50%">   </td><td width="50%"></td></tr>
						<tr>
						<td width="50%" colspan="2" style="margin-left:50px;">
						<input type="checkbox" id="need_alert" class="input_field" name="need_alert" value="Newsletter" /> <label>&nbsp;Alert me when someone Joins on my Route</label>
						</td>
						</tr>
						<tr><td width="50%">   </td><td width="50%"></td></tr>
						<tr id="vehicle" style="display:none;">
							<td width="50%"> Vehicle Type : </td>
							<td width="50%">
								<input type="radio" id="vehicle_type" name="vehicle_type" value="Car" checked="checked" /> <label>Car</label> &nbsp; 
								<input type="radio" id="vehicle_type" name="vehicle_type" value="Bike" /> <label>Bike</label>
							</td>
						</tr>
						<tr><td width="50%">   </td><td width="50%"></td></tr>
						<tr id="model" style="display:none;">
							<td width="50%"> Model Type : </td>
							<td width="50%"><input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" /> <label>[Eg: Hero Honda, Yemaha, etc]</label></td>
						</tr>
						<tr><td width="50%">   </td><td width="50%"></td></tr>
						<tr id="fuel" style="display:none;">
							<td width="50%"> Fuel Type : </td>
							<td width="50%">
								<input type="radio" id="fuel_type" name="fuel_type" value="Diesel" checked="checked" /> <label>Diesel</label> &nbsp; 
								<input type="radio" id="fuel_type" name="fuel_type" value="Petrol" /> <label>Petrol</label>  &nbsp;
								<input type="radio" id="fuel_type" name="fuel_type" value="LPG" /> <label>LPG</label>  &nbsp;
							</td>
						</tr>
						<tr><td width="50%">   </td><td width="50%"></td></tr>
						<tr>
							<td width="100%" colspan="2" align="center">
								<input style="font-weight: bold;" type="button" name="next2" id="next2" value="Continue" />	
							</td>
						</tr>
					</table>
				</div>
				<div id="tabs-3">
					<table width="80%" cellpadding="4" cellspacing="3">
						<tr><td width="100%" colspan="2"><div id="errorDisplay2" style="color:#ff0000;margin-left:300px;float:left;"></div></td></tr>
						<tr>
							<td width="50%"> Full Name : </td>
							<td width="50%"><input type="text" id="full_name" name="full_name" class="required input_field" style="width:250px;" /></td>
						</tr>
						<tr>
							<td width="50%"> Gender : </td>
							<td width="50%">
								<input type="radio" id="gender" name="gender" value="male" checked="checked" /> <label>Male</label> &nbsp; 
								<input type="radio" id="gender" name="gender" value="female" /> <label>Female</label>
							</td>
						</tr>
						<tr>
							<td width="50%"> Email : </td>
							<td width="50%"><input type="text" id="email_address" name="email_address" class="required input_field" style="width:250px;" /></td>
						</tr>
						<tr>
							<td width="50%"> Password : </td>
							<td width="50%"><input type="password" id="password" name="password" class="required input_field" style="width:250px;" /></td>
						</tr>
						<tr>
							<td width="50%"> Re-Type Password : </td>
							<td width="50%"><input type="password" id="re_password" name="re_password" class="required input_field" style="width:250px;" /></td>
						</tr>				
						<tr>
							<td width="50%"> Phone : </td>
							<td width="50%"><input type="text" id="phone_number" name="phone_number" class="required input_field" style="width:250px;" /></td>
						</tr>
						<tr>
							<td width="50%"> Address : </td>
							<td width="50%"><textarea id="address" name="address" class="required input_field" rows="5" cols="65"></textarea></td>
						</tr>
						<tr>
							<td width="100%" colspan="2" align="center">
								<input style="font-weight: bold;" type="button" name="submitride" id="submitride" value="Submit" />	
							</td>
						</tr>
					</table>
				</div>
			</div> 

            </form>
        </div>
        <div class="clear"></div> 
</div>