<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">Search for a Ride</h5>
		</div>
        <div class="clear"></div>
        <div id="contact_form">
            <div style="border:6px solid #CCCCCC;width:960px;"> <!-- 918F8D-->
				<form style="margin:5px;" method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact" onsubmit="return isValidContact();">
				<table width="80%" cellpadding="4" cellspacing="3" align="center">
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
						<td width="50%"> Origin :<br /><input onKeyPress="return disableEnterKey(event)" type="text" name="origin_from" id="searchTextField" class="required input_field" style="width:250px;" /></td>
						<td width="50%"> Destination :<br /><input onKeyPress="return disableEnterKey(event)" type="text" name="destination_to" id="searchTextField2" class="required input_field" style="width:250px;" /></td>
					</tr>
					<tr>
						<td width="50%">						
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
						<td width="50%">
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
						<td width="50%">						
						<div style="width:140px;float:left;">
							Vehicle Type: <br />
							<select name="vehicle_type" id="vehicle_type" onchange="javascript:enableFields(this.value);">
								<option value="Car" selected="selected">Car</option>
								<option value="Bike">Bike</option>
							</select>
						</div>
						<div style="width:210px;float:right;">
							I am searching for : <br />
							<select name="travel_type" id="travel_type" onchange="javascript:enableFields(this.value);">
								<option value="driver" selected="selected">A Vehichle</option>
								<option value="passenger">A Passenger</option>
							</select>						
						</div>
						</td>						
						<td width="50%">
							<input type="button" name="doSearch" id="doSearch" value="Search" class="submit_btn float_l" /> &nbsp; &nbsp;
							<input type="reset" name="doReset" id="doReset" value="Reset" class="submit_btn float_l" />  
						</td>
					</tr>
					<tr><td width="100%" colspan="2">  </td></tr>
			</table>
            </form>
			</div>
        </div>
        <div class="clear"></div>
</div>