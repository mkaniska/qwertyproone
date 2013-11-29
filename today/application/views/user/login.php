<div id="website_main" class="wrapper">
	<div id="content_login" class="left">
        <div class="post">
            <h2>Login</h2>
            <div class="img_frame img_frame_23_new">
			<span style="margin-top:15px;margin-left:140px;">
				<form action="" method="post" style="margin-top:40px;margin-left:45px;">
					<table width="100%" cellpadding="4" cellspacing="3" align="center">
						<tr><td width="100%" colspan="2" align="left">
							<div id="errorDisplay" style="color:#ff0000;margin-left:150px;float:left;font-weight:bold;">
								<?php if($this->session->flashdata('flash_message') !='') { ?>
									<?php echo $this->session->flashdata('flash_message'); ?>
								<?php } ?>
							</div>
						</td></tr>
						<tr>
							<td width="25%">* User Name/Email : </td>
							<td width="75%"><input type="text" id="user_name" name="user_name" class="required input_field" value="" /></td>
						</tr>
						<tr>
							<td width="25%">*  Password : </td>
							<td width="75%"><input type="password" id="password_value" name="password_value" class="required input_field" /></td>
						</tr>
						<tr><td width="100%" colspan="2">   </td></tr>
						<tr>
							<td width="100%" colspan="2" align="left" style="padding-left:152px;">
								<input class="submit_btn float_l" type="button" name="submitlogin" id="submitlogin" value="Login" onclick="javascript:doLogin();" /> &nbsp; &nbsp;  &nbsp;	
								<input class="submit_btn float_l" type="button" name="doCancel" id="doCancel" value="Cancel" />
								<div style="font-weight:bold;float:right;margin-right:10px;">
								<a href="<?php echo base_url();?>user/register">New User ?</a> / 
								<a href="<?php echo base_url();?>user/getpassword">Forgot Password ?</a>
								</div>
							</td>
						</tr>				
					</table>				
				</form>
				</span>
			</div>
        </div>
    </div> <!-- END of content half -->
    <!-- START of sidebar -->
	<?php //$this->load->view('sidebar_login'); ?>
    <!-- END of sidebar -->
    <div class="clear"></div>
</div>