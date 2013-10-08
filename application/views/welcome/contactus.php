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
        <h4>Company Name</h4>
        120-240 Quisque odio quam, <br />
        Pulvinar sit amet convallis eget, 10980<br />
        Venenatis ut turpis<br /><br />
        <strong>Email:</strong> info@yourcompany.com  
        
        <div class="cleaner_h40"></div>
        
        <h4>Send us a message now!</h4>
        <div id="contact_form">
        
            <form method="post" name="contactForm" action="<?php echo base_url();?>welcome/process_contact" class="jqtransform">
			<table width="100%" cellpadding="4" cellspacing="3">
				<tr><td width="100%" colspan="2" align="left">
				<div id="errorDisplay" style="color:#ff0000;margin-left:130px;float:left;">
				<?php if($this->session->flashdata('flash_message') !='') { ?>
					<?php echo $this->session->flashdata('flash_message'); ?>
				<?php } ?>
				</div></td></tr>
				<tr>
					<td width="50%"> Name : </td>
					<td width="50%"><input type="text" id="full_name" name="full_name" class="required input_field" /></td>
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
					<td width="50%"><input type="text" id="email_address" name="email_address" class="required input_field" /></td>
				</tr>
				<tr>
					<td width="50%"> Phone : </td>
					<td width="50%"><input type="text" id="phone_number" name="phone_number" class="required input_field" /></td>
				</tr>
				<tr>
					<td width="50%"> Message : </td>
					<td width="50%"><textarea id="message_text" name="message_text" rows="8" cols="75" class="required"></textarea></td>
				</tr>
				<tr>
					<td width="100%" colspan="2" align="center">
						<input style="font-weight: bold;" type="button" name="doContact" id="doContact" value="Submit " /> &nbsp; &nbsp; 	
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