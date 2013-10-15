<div id="website_main" class="wrapper">

		<h5 style="padding-bottom:15px;">Post a New Ride</h5>
		
		<div class="cleaner"></div>
    
        <div id="contact_form">
           <form method="post" name="postride" id="postride" action="<?php echo base_url();?>user/process_signup" onsubmit="return finalValidationOnRide();">
           
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Post Location - Step 1 &nbsp; &nbsp;</a></li>
					<li><a href="#tabs-2">Ride Details - Step 2&nbsp; &nbsp;</a></li>
					<li><a href="#tabs-3">Personal Details - Step 3&nbsp; &nbsp;</a></li>
				</ul>
				<div id="tabs-1">
					<table width="100%" cellpadding="4" cellspacing="3" align="center">
								<tr><td width="100%" colspan="2"><div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;"></div></td></tr>
								<tr>
									<td width="100%" colspan="2">
									<div style="width:250px;float:left;display:clear;padding-right:30px;">
									City :
										<select name="city" id="city">
											<option value="0" selected="selected">Select</option>
											<?php foreach($cities_list as $key=>$value) { ?>
												<option value="<?php echo $value;?>"><?php echo $value;?></option>
											<?php } ?>							
										</select>
									</div>
									<div style="width:250px;float:left;display:clear;padding-right:30px;">
									&nbsp; &nbsp; 
										Start Time : &nbsp; 
										<select name="start_time" id="start_time">
										<option value="0" selected="selected">Select Time</option>					
										<?php $inc=12;for($i=0;$i<24;$i++) { $ampm=($i<12?' AM':' PM');?>
											<?php for($j=0;$j<=55;$j=$j+5) { ?>
												<option value="<?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?>"><?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?></option>
											<?php } $inc=($i<12?($i+1):($i-11));?>
										<?php } ?>
										</select>
									</div>
										&nbsp; &nbsp;
									<div style="width:250px;float:left;">
										Return Time : &nbsp;
										<select name="return_time" id="return_time">
										<option value="0" selected="selected">Select Time</option>					
										<?php $inc=12;for($i=0;$i<24;$i++) { $ampm=($i<12?' AM':' PM');?>
											<?php for($j=0;$j<=55;$j=$j+5) { ?>
												<option value="<?php echo $default=$inc.':'.(($j<10)?'0'.$j:$j).$ampm;?>"><?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?></option>
											<?php } $inc=($i<12?($i+1):($i-11));?>
										<?php } ?>
										</select>
									</div>
									</td>
								</tr>
								<tr><td width="50%">   </td><td width="50%"></td></tr>			
								<tr>
									<td width="50%"> Origin :&nbsp; <input onKeyPress="return disableEnterKey(event)" type="text" name="origin_from" id="searchTextField" class="required input_field" style="width:250px;" /></td>
									<td width="50%"> Destination :&nbsp; <input onKeyPress="return disableEnterKey(event)" type="text" name="destination_to" id="searchTextField2" class="required input_field" style="width:250px;" /></td>
								</tr>
								<tr><td width="50%">   </td><td width="50%"></td></tr>
								<tr>
									<td width="50%" style="padding-left:15px;"><div id="map-canvas" style="width: 380px;height:190px;"></div></td>
									<td width="50%" style="padding-left:50px;"><div id="map-canvas2" style="width: 380px;height:190px;"></div></td>
								</tr>
								<tr><td width="50%">   </td><td width="50%"></td></tr>
								<tr>
									<td width="100%" colspan="2" align="center">
										<input class="submit_btn float_l" type="button" name="next1" id="next1" value="Continue" />	
									</td>
								</tr>
							</table>					
				</div>
				<div id="tabs-2">
					<table width="80%" cellpadding="4" cellspacing="3" align="center">
						<tr><td width="100%" colspan="2" align="left">
						<div id="errorDisplay1" style="color:#ff0000;margin-left:100px;float:left;font-weight:bold;"></div>
						</td></tr>
						<tr>
							<td width="100%" colspan="2" align="left"> I am a : 
								<input type="radio" id="travel_type2" name="travel_type" value="driver" checked="checked" /> Vehicle Owner &nbsp; 
								<input type="radio" id="travel_type1" name="travel_type" value="passenger" /> Passenger
							</td>
						</tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr>
							<td width="100%" colspan="2" align="left">
								<input type="checkbox" id="travel_alert" name="travel_alert" value="passenger" /> Alert me when someone Joins on my Route
							</td>
						</tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr id="vehicle">
							<td width="20%"> Vehicle Type : </td>
							<td width="80%">
								<input type="radio" id="vehicle_type" name="vehicle_type" value="Car" checked="checked" />
								 Car &nbsp; &nbsp;
								<input type="radio" id="vehicle_type" name="vehicle_type" value="Bike" />
								 Bike 
							</td>
						</tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr id="model">
							<td width="20%"> Model Type : </td>
							<td width="80%">
								<input type="text" id="model_type" name="model_type" class="required input_field" style="width:250px;" />
								[Eg: Hero Honda, Yemaha, etc]
							</td>
						</tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr id="fuel">
							<td width="20%"> Fuel Type : </td>
							<td width="80%">
								<input type="radio" id="fuel_type" name="fuel_type" value="Diesel" checked="checked" /> Diesel &nbsp; 
								<input type="radio" id="fuel_type" name="fuel_type" value="Petrol" /> Petrol &nbsp;
								<input type="radio" id="fuel_type" name="fuel_type" value="LPG" /> LPG &nbsp;
							</td>
						</tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr>
							<td width="100%" colspan="2" align="center">
								<input class="submit_btn float_l" type="button" name="next2" id="next2" value="Continue" />	
							</td>
						</tr>
					</table>
				</div>
				<div id="tabs-3">
					
					<table width="80%" cellpadding="4" cellspacing="3" align="center">
						<tr><td width="100%" colspan="2" align="left">
							<div id="errorDisplay2" style="color:#ff0000;margin-left:100px;float:left;font-weight:bold;"></div>
						</td></tr>
						<tr>
							<td width="20%">* Full Name : </td>
							<td width="80%"><input type="text" id="full_name" name="full_name" class="required input_field" value="<?php if(isset($data_back))echo $data_back['pro_user_full_name'];?>" /></td>
						</tr>
						<tr>
							<td width="20%"> &nbsp; &nbsp;Gender : </td>
							<td width="80%">
								<input type="radio" id="gender" name="gender" value="male" checked="checked" />Male &nbsp; 
								<input type="radio" id="gender" name="gender" value="female" <?php if(isset($data_back)){if($data_back['pro_user_gender']=='female')echo 'checked="checked"';}?> /> Female
							</td>
						</tr>
						<tr>
							<td width="20%">*  Email : </td>
							<td width="80%"><input type="text" id="email_address" name="email_address" value="<?php if(isset($data_back))echo $data_back['pro_user_email'];?>" class="required input_field" /></td>
						</tr>
						<tr>
							<td width="20%">*  Password : </td>
							<td width="80%"><input type="password" id="password_text" name="password_text" class="required input_field" /></td>
						</tr>
						<tr>
							<td width="25%">*  Re-Type Password : </td>
							<td width="75%"><input type="password" id="re_password_text" name="re_password" class="required input_field" /></td>
						</tr>				
						<tr>
							<td width="20%">*  Phone : </td>
							<td width="80%"><input type="text" id="phone_number" name="phone_number" value="<?php if(isset($data_back))echo $data_back['pro_user_phone'];?>" class="required input_field" /></td>
						</tr>
						<tr>
							<td width="20%">*  Address : </td>
							<td width="80%"><input type="text" id="address" name="address" value="<?php if(isset($data_back))echo $data_back['pro_user_address'];?>" class="required input_field" size="30" /></td>
						</tr>				
						<tr>
							<td width="20%">*  City : </td>
							<td width="80%" id="cityPlace">					
								<select name="city" id="city">
									<option value="0" selected="selected">Select</option>
									<?php foreach($cities_list as $key=>$value) { ?>
										<option value="<?php echo $value;?>" <?php if(isset($data_back)){if($data_back['pro_user_city']==$value)echo 'selected="selected"';}?>><?php echo $value;?></option>
									<?php } ?>							
								</select>					
							</td>
						</tr>
						<tr>
							<td width="20%">*  Zip Code : </td>
							<td width="80%"><input type="text" id="zipcode" name="zipcode" value="<?php if(isset($data_back))echo $data_back['pro_user_zipcode'];?>" class="required input_field" style="width:150px;" /></td>
						</tr>
						<tr>
							<td width="20%">*  State : </td>
							<td width="80%">						
								<select name="state">						
								<?php foreach($states_list as $key=>$value) { ?>
									<option value="<?php echo $value->city_state;?>" <?php if(isset($data_back)){if($data_back['pro_user_state']==$value->city_state)echo 'selected="selected"';}?>><?php echo $value->city_state;?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr>
							<td width="100%" colspan="2" align="center">
								<input class="submit_btn float_l" type="submit" name="submitride" id="submitride" value="Submit" /> &nbsp; &nbsp;  &nbsp;	
								<input class="submit_btn float_l" type="button" name="doCancel" id="doCancel" value="Cancel" />  	
							</td>
						</tr>				
					</table>
					
				</div>
			</div> 

            </form>
        </div>
        <div class="clear"></div> 
</div>