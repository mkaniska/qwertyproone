        <div id="templatemo_banner">
        
   			<h3>Contact Information</h3>
            
            <p>Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor.</p>
            
            <p>Vivamus laoreet pharetra eros. In quam nibh, placerat ac, porta ac, molestie non, purus. Curabitur sem ante, condimentum non, cursus quis, eleifend non, libero. Nunc a nulla. Suspendisse vitae orci a ligula egestas bibendum. Vestibulum ultrices. Pellentesque tempus sapien nec sem commodo ullamcorper.</p>
            
        </div>

</div> <!-- end of header_wrapper -->

<div id="templatemo_content_wrapper_outer">
<div id="templatemo_content_wrapper_inner">
<div id="templatemo_content_wrapper">

    <div id="templatemo_content">
        
        <h4>Registration</h4>
        <div id="contact_form">
        
            <form method="post" name="contact" action="#" class="jqtransform">
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
						<select name="state" style="width:20px;">
							<option value="0" selected="selected">Select</option>
							<option value="India">TamilNadu</option>
							<option value="USA">Karnataka</option>
							<option value="UK">Andhra</option>
							<option value="UK">Kerala</option>
						</select>
					</td>
				</tr>				
				<tr>
					<td width="50%"> City : </td>
					<td width="50%"><input type="text" id="city" name="city" class="required input_field" /></td>
				</tr>
				<tr>
					<td width="50%"> Country : </td>
					<td width="50%">						
						<select name="country" style="width:20px;">
							<option value="0" selected="selected">Select</option>
							<option value="India">India</option>
							<option value="USA">USA</option>
							<option value="UK">UK</option>
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
						<input style="font-weight: bold;" type="submit" name="reset" id="reset" value="Submit " />	
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