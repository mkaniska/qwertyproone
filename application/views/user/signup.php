        <div id="templatemo_banner">        
   			<h3>Registration</h3>            
            <p>Register with "Save my Expense" is Free. Save My Expense is a place where people who would like to reduce their transportation cost. 
			You can share your Travel Expense with your Colleque or friends or any other new person who also like to save the cost. 
			To achieve this, only thing you need to do is, Post your Ride information & start saving your cost.</p>
        </div>

</div> <!-- end of header_wrapper -->

<div id="templatemo_content_wrapper_outer">
<div id="templatemo_content_wrapper_inner">
<div id="templatemo_content_wrapper">

    <div id="templatemo_content">
        
        <h4>Registration</h4>
		
        <div id="contact_form">
        
            <form method="post" id="signupForm" action="<?php echo base_url();?>user/process_signup" class="jqtransform">
			<table width="100%" cellpadding="4" cellspacing="3">
				<tr><td width="100%" colspan="2" align="left">
				<div id="errorDisplay" style="color:#ff0000;margin-left:130px;float:left;">
				<?php if($this->session->flashdata('flash_message') !='') { ?>
					<?php echo $this->session->flashdata('flash_message'); ?>
				<?php } ?>
				</div></td></tr>
				<tr>
					<td width="50%">Full Name : </td>
					<td width="50%"><input type="text" id="full_name" name="full_name" class="required input_field" value="<?php if(isset($data_back))echo $data_back['pro_user_full_name'];?>" /></td>
				</tr>
				<tr>
					<td width="50%"> Gender : </td>
					<td width="50%">
						<input type="radio" id="gender" name="gender" value="male" checked="checked" /> <label>Male</label> &nbsp; 
						<input type="radio" id="gender" name="gender" value="female" <?php if(isset($data_back)){if($data_back['pro_user_gender']=='female')echo 'checked="checked"';}?> /> <label>Female</label>
					</td>
				</tr>
				<tr>
					<td width="50%"> Email : </td>
					<td width="50%"><input type="text" id="email_address" name="email_address" value="<?php if(isset($data_back))echo $data_back['pro_user_email'];?>" class="required input_field" /></td>
				</tr>
				<tr>
					<td width="50%"> Password : </td>
					<td width="50%"><input type="password" id="password_text" name="password_text" class="required input_field" /></td>
				</tr>
				<tr>
					<td width="50%"> Re-Type Password : </td>
					<td width="50%"><input type="password" id="re_password_text" name="re_password" class="required input_field" /></td>
				</tr>				
				<tr>
					<td width="50%"> Phone : </td>
					<td width="50%"><input type="text" id="phone_number" name="phone_number" value="<?php if(isset($data_back))echo $data_back['pro_user_phone'];?>" class="required input_field" /></td>
				</tr>
				<tr>
					<td width="50%"> Address : </td>
					<td width="50%"><input type="text" id="address" name="address" value="<?php if(isset($data_back))echo $data_back['pro_user_address'];?>" class="required input_field" size="30" /></td>
				</tr>
				
				<tr>
					<td width="50%"> City : </td>
					<td width="50%" id="cityPlace">					
						<select name="city" id="city">
							<option value="0" selected="selected">Select</option>
							<?php foreach($cities_list as $key=>$value) { ?>
								<option value="<?php echo $value;?>" <?php if(isset($data_back)){if($data_back['pro_user_city']==$value)echo 'selected="selected"';}?>><?php echo $value;?></option>
							<?php } ?>							
						</select>					
					</td>
				</tr>
				<tr>
					<td width="50%"> Zip Code : </td>
					<td width="50%"><input type="text" id="zipcode" name="zipcode" value="<?php if(isset($data_back))echo $data_back['pro_user_zipcode'];?>" class="required input_field" /></td>
				</tr>
				<tr>
					<td width="50%"> State : </td>
					<td width="50%">						
						<select name="state">						
						<?php foreach($states_list as $key=>$value) { ?>
							<option value="<?php echo $value->city_state;?>" <?php if(isset($data_back)){if($data_back['pro_user_state']==$value->city_state)echo 'selected="selected"';}?>><?php echo $value->city_state;?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
				<tr><td width="50%">   </td><td width="50%"> </td></tr>				
				<tr>
					<td width="100%" colspan="2" align="center">
						<input style="font-weight: bold;" type="button" name="doSignup" id="doSignup" value="Submit " /> &nbsp; &nbsp; 	
						<input style="font-weight: bold;" type="button" name="doCancel" id="doCancel" value="Cancel " />  	
					</td>
				</tr>
				
			</table>
            
            </form>
            
        </div>
        
    </div> <!-- end of templatemo_content -->
        
    <?php $this->load->view('sidebar'); ?>

	<div class="cleaner"></div>
</div>
<div class="cleaner"></div>
</div>
</div>   