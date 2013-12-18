<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">Search for a Ride</h5>
		</div>
        <div class="clear"></div>
        <div id="contact_form">
            <div style="border:6px solid #CCCCCC;width:960px;"> <!-- 918F8D-->
				<form style="margin:5px;" method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact" onsubmit="return isValidContact();">
				<table width="100%" cellpadding="4" cellspacing="3" align="center">
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
						<td width="25%"> Origin :<br /><input onKeyPress="return disableEnterKey(event)" type="text" name="origin_from" id="searchTextField" class="required input_field" style="width:250px;" /></td>
						<td width="25%" style="padding-right:10px;"> Destination :<br /><input onKeyPress="return disableEnterKey(event)" type="text" name="destination_to" id="searchTextField2" class="required input_field" style="width:250px;" /></td>
						<td width="25%">						
						Start Time: <br />
							<select name="start_time" id="start_time">
							<option value="0" selected="selected">Select Start Time</option>					
							<?php $inc=12;for($i=0;$i<24;$i++) { $ampm=($i<12?' AM':' PM');?>
								<?php for($j=0;$j<=55;$j=$j+5) { ?>
									<option value="<?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?>"><?php echo $inc.':'.(($j<10)?'0'.$j:$j).$ampm;?></option>
								<?php } $inc=($i<12?($i+1):($i-11));?>
							<?php } ?>
							</select>
						</td>
						<td width="25%">
						Return Time : <br />
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
					<tr>
						<td width="25%">
							Vehicle Type: <br />
							<select name="vehicle_type" id="vehicle_type" onchange="javascript:enableFields(this.value);">
								<option value="0" selected="selected">Select Vehicle Type</option>
								<option value="Car">Car</option>
								<option value="Bike">Bike</option>
							</select>
						 </td>
						 <td width="25%" style="padding-right:20px;">
							I am searching for : <br />
							<select name="travel_type" id="travel_type" onchange="javascript:enableFields(this.value);">
								<option value="0" selected="selected">Select Option</option>
								<option value="driver">A Vehichle</option>
								<option value="passenger">A Passenger</option>
							</select>
						</td>						
						<td width="50%" colspan="2" style="padding-right:20px;padding-top:20px;">
							<input type="button" name="doSearch" id="doSearch" value="Search" class="submit_btn float_l" /> &nbsp; &nbsp;
							<input type="reset" name="doReset" id="doReset" value="Reset" class="submit_btn float_l" />  
						</td>
					</tr>
					<tr><td width="100%" colspan="4">  </td></tr>
			</table>
			<table width="100%" cellpadding="3" cellspacing="0" align="center" border="1">
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
					<td>Person Name</td>
					<td>City</td>
					<td>Vehicle</td>
					<td>Origin</td>
					<td>Destination</td>
					<td>Start Time</td>
					<td>Return Time</td>
				</tr>
				<?php if(count($ride_list)>0) { foreach($ride_list as $out) { ?>
				<tr style="font-size:11px;"> 				
					<td><?php echo $out->person_name;?></td>
					<td><?php echo $out->passenger_city;?></td>
					<td><?php echo $out->vehicle_type;?></td>
					<td><?php echo $out->origin_location;?></td>
					<td><?php echo $out->destination_location;?></td>
					<td><?php echo $out->start_time;?></td>
					<td><?php echo $out->return_time;?></td>
				</tr>	
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>				
				<?php }else { ?>
				<tr style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
					<td colspan="7" align="center">No Results Found</td>
				</tr>
				<?php } ?>
			</table>
            </form>
			</div>
        </div>
        <div class="clear"></div>
</div>