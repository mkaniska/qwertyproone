<?php if($this->session->flashdata('data_restore')!=''){$data_back = $this->session->flashdata('data_restore');} ?>
<div id="website_main" class="wrapper">
<h3>Registration</h3>
	<div id="content" class="left">
       <div id="contact_form" style="border:1px solid #ccc;padding:20px;">
           <form method="post" name="registration_form" action="<?php echo base_url();?>user/process_signup" onsubmit="return isValidSignup();">
		   
			<table width="100%" cellpadding="4" cellspacing="3" align="center">
				<tr><td width="100%" colspan="2" align="left">
				<div id="errorDisplay" style="color:#ff0000;margin-left:130px;float:left;font-weight:bold;">
				<?php if($this->session->flashdata('flash_message') !='') { ?>
					<?php echo $this->session->flashdata('flash_message'); ?>
				<?php } ?>
				</div></td></tr>
				<tr>
					<td width="20%">* Full Name : </td>
					<td width="80%"><input type="text" id="full_name" name="full_name" class="required input_field" value="<?php if(isset($data_back))echo $data_back['pro_user_full_name'];?>" /></td>
				</tr>
				<tr>
					<td width="20%"> &nbsp; &nbsp;Gender : </td>
					<td width="80%">
						<input type="radio" id="gender" name="gender" value="Male" checked="checked" />Male &nbsp; 
						<input type="radio" id="gender" name="gender" value="Female" <?php if(isset($data_back)){if($data_back['pro_user_gender']=='Female')echo 'checked="checked"';}?> /> Female
					</td>
				</tr>
				<tr>
					<td width="20%">*  Email : </td>
					<td width="80%"><input type="text" id="email_address" name="email_address" value="<?php if(isset($data_back))echo $data_back['pro_user_email'];?>" class="required input_field" onblur="javascript:isEmailAvailable(this.value,'#errorDisplay');" /></td>
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
					<td width="20%">*  State : </td>
					<td width="80%">						
						<select name="state" onchange="javascript:get_cities(this.value,'','city','#cityPlace');">						
						<?php foreach($states_list as $key=>$value) { ?>
							<option value="<?php echo $value->city_state;?>" <?php if(isset($data_back)){if($data_back['pro_user_state']==$value->city_state)echo 'selected="selected"';}?>><?php echo $value->city_state;?></option>
						<?php } ?>
						</select>
					</td>
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
						<input type="hidden" id="e_mail" name="e_mail" value="1" />
					</td>
				</tr>
				<tr>
					<td width="20%">*  Zip Code : </td>
					<td width="80%"><input type="text" id="zipcode" name="zipcode" value="<?php if(isset($data_back))echo $data_back['pro_user_zipcode'];?>" class="required input_field" style="width:150px;" /></td>
				</tr>
				<tr><td width="20%">   </td><td width="80%"> </td></tr>				
				<tr><td width="20%">   </td><td width="80%"> </td></tr>				
				<tr>
					<td width="100%" colspan="2" align="center">
						<input class="submit_btn float_l" type="submit" name="doSignup" id="doSignupButton" value="Submit" /> &nbsp; &nbsp;  &nbsp;	
						<input class="submit_btn float_l" type="button" name="doCancel" id="doCancel" value="Cancel" />  	
					</td>
				</tr>				
			</table>
            </form>
        </div>
		<?php if(isset($data_back)){ ?>
		 <script>
			get_cities('<?php echo $data_back['pro_user_state'];?>','<?php echo $data_back['pro_user_city'];?>','city','#cityPlace');
		 </script>
		<?php }?>
    </div> <!-- END of content half -->
    <!-- START of sidebar -->
	<?php $this->load->view('sidebar'); ?>
    <!-- END of sidebar -->
    <div class="clear"></div>
</div>