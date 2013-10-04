        <div id="templatemo_banner">
        
   			<h3>Contact Information</h3>
            
            <p>Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor.</p>
            
            <p>Vivamus laoreet pharetra eros. In quam nibh, placerat ac, porta ac, molestie non, purus. Curabitur sem ante, condimentum non, cursus quis, eleifend non, libero. Nunc a nulla. Suspendisse vitae orci a ligula egestas bibendum. Vestibulum ultrices. Pellentesque tempus sapien nec sem commodo ullamcorper.</p>
            
        </div>

</div> <!-- end of header_wrapper -->

<div id="templatemo_content_wrapper_outer">
<div id="templatemo_content_wrapper_inner">
<div id="templatemo_content_wrapper">

    <div id="templatemo_content_full">
        
        <h4>Announce Your Availability</h4>
<form method="post" name="contact" action="#" class="jqtransform">
<div style="border:1px solid #90B8FD; width:900px; margin-bottom: 1em; padding: 10px;" id="tabs">

<ul>
<li><a href="#tabs-1">Post Location - Step 1</a></li>
<li><a href="#tabs-2">Ride Details - Step 2</a></li>
<li><a href="#tabs-3">Personal Details - Step 3</a></li>
</ul>
<div id="tabs-1">
  
		<form method="post" name="contact" action="#" class="jqtransform">
		
		<table width="100%" cellpadding="4" cellspacing="3">		
			<tr>
				<td width="75%" colspan="2"> <label>City:&nbsp;</label>
					<p style="margin-left:60px;"><select name="city" id="city">
						<option value="0" selected="selected">Select</option>
						<?php foreach($cities_list as $key=>$value) { ?>
							<option value="<?php echo $value;?>"><?php echo $value;?></option>
						<?php } ?>							
					</select></p>
				</td>
			</tr>
			<tr><td width="50%">   </td><td width="50%"></td></tr>
			<tr>
				<td width="50%"><label>Origin:&nbsp;</label><input type="text" name="origin_from" id="searchTextField" class="required input_field" style="width:250px;" /></td>
				<td width="50%"><label>Destination:&nbsp;</label><input type="text" name="destination_to" id="searchTextField2" class="required input_field" style="width:250px;" /></td>
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

	
		
		<table width="100%" cellpadding="4" cellspacing="3">
			<tr>
				<td width="50%"> Full Name : </td>
				<td width="50%"><input type="text" id="full_name" name="full_name" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Gender : </td>
				<td width="50%">
					<input type="radio" id="gender" name="gender" value="male" /> <label>Male</label> &nbsp; 
					<input type="radio" id="gender" name="gender" value="female" /> <label>Female</label>
				</td>
			</tr>
			<tr>
				<td width="50%"> Email : </td>
				<td width="50%"><input type="text" id="email_address" name="email_address" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Password : </td>
				<td width="50%"><input type="password" id="password" name="password" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Re-Type Password : </td>
				<td width="50%"><input type="password" id="re_password" name="re_password" class="required input_field" /></td>
			</tr>				
			<tr>
				<td width="50%"> Phone : </td>
				<td width="50%"><input type="text" id="phone_number" name="phone_number" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Address : </td>
				<td width="50%"><input type="text" id="address" name="address" class="required input_field" size="25" /></td>
			</tr>
			<tr>
				<td width="50%"> State : </td>
				<td width="50%">						
					<select name="state">						
					<?php foreach($states_list as $key=>$value) { ?>
						<option value="<?php echo $value->city_state;?>"><?php echo $value->city_state;?></option>
					<?php } ?>
					</select>
				</td>
			</tr>				
			<tr>
				<td width="50%"> City : </td>
				<td width="50%" id="cityPlace">					
					<select name="city" id="city">
						<option value="0" selected="selected">Select</option>
						<?php foreach($cities_list as $key=>$value) { ?>
							<option value="<?php echo $value;?>"><?php echo $value;?></option>
						<?php } ?>							
					</select>					
				</td>
			</tr>
			<tr>
				<td width="50%"> Country : </td>
				<td width="50%">						
					<select name="country">							
						<option value="India" selected="selected">India</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="50%"> Interested To Receive : </td>
				<td width="50%">
					<input type="checkbox" id="interest" class="input_field" name="interest" value="Newsletter" /> <label>&nbsp;Newsletter</label> &nbsp; 
					<input type="checkbox" id="interest" class="input_field" name="interest" value="Updates" /> <label>&nbsp;Updates</label>
				</td>
			</tr>
			<tr>
				<td width="50%"> About You : </td>
				<td width="50%"><textarea id="text" name="about_you" rows="5" cols="75" class="required"></textarea></td>
			</tr>
			<tr>
				<td width="100%" colspan="2" align="center">
					<input style="font-weight: bold;" type="button" name="next2" id="next2" value="Continue" />	
				</td>
			</tr>
		</table>
		
		
</div>
<div id="tabs-3">

		
		<table width="100%" cellpadding="4" cellspacing="3">
			<tr>
				<td width="50%"> Full Name : </td>
				<td width="50%"><input type="text" id="full_name" name="full_name" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Gender : </td>
				<td width="50%">
					<input type="radio" id="gender" name="gender" value="male" /> <label>Male</label> &nbsp; 
					<input type="radio" id="gender" name="gender" value="female" /> <label>Female</label>
				</td>
			</tr>
			<tr>
				<td width="50%"> Email : </td>
				<td width="50%"><input type="text" id="email_address" name="email_address" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Password : </td>
				<td width="50%"><input type="password" id="password" name="password" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Re-Type Password : </td>
				<td width="50%"><input type="password" id="re_password" name="re_password" class="required input_field" /></td>
			</tr>				
			<tr>
				<td width="50%"> Phone : </td>
				<td width="50%"><input type="text" id="phone_number" name="phone_number" class="required input_field" /></td>
			</tr>
			<tr>
				<td width="50%"> Address : </td>
				<td width="50%"><input type="text" id="address" name="address" class="required input_field" size="25" /></td>
			</tr>
			<tr>
				<td width="50%"> State : </td>
				<td width="50%">						
					<select name="state">						
					<?php foreach($states_list as $key=>$value) { ?>
						<option value="<?php echo $value->city_state;?>"><?php echo $value->city_state;?></option>
					<?php } ?>
					</select>
				</td>
			</tr>				
			<tr>
				<td width="50%"> City : </td>
				<td width="50%" id="cityPlace">					
					<select name="city" id="city">
						<option value="0" selected="selected">Select</option>
						<?php foreach($cities_list as $key=>$value) { ?>
							<option value="<?php echo $value;?>"><?php echo $value;?></option>
						<?php } ?>							
					</select>					
				</td>
			</tr>
			<tr>
				<td width="50%"> Country : </td>
				<td width="50%">						
					<select name="country">							
						<option value="India" selected="selected">India</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="50%"> Interested To Receive : </td>
				<td width="50%">
					<input type="checkbox" id="interest" class="input_field" name="interest" value="Newsletter" /> <label>&nbsp;Newsletter</label> &nbsp; 
					<input type="checkbox" id="interest" class="input_field" name="interest" value="Updates" /> <label>&nbsp;Updates</label>
				</td>
			</tr>
			<tr>
				<td width="50%"> About You : </td>
				<td width="50%"><textarea id="text" name="about_you" rows="5" cols="75" class="required"></textarea></td>
			</tr>
			<tr>
				<td width="100%" colspan="2" align="center">
					<input style="font-weight: bold;" type="button" name="gonext" id="gonext" value="Continue" />	
				</td>
			</tr>
		</table>
		
		
</div>

</div>
</form>
    </div> <!-- end of templatemo_content -->
        
    <?php //$this->load->view('sidebar'); ?>

	<div class="cleaner"></div>
</div>
<div class="cleaner"></div>
</div>
</div>   