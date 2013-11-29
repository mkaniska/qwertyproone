<script type="text/javascript">
	function isValidAdminLogin() {
		if($.trim($("#user_name").val())=='') {
			$("#errorDisplay").html("Please enter the username/email !");
			$("#user_name").focus();
			return false;
		}else if($.trim($("#password_value").val())==""){
			$("#errorDisplay").html("Please enter the password !");
			$("#password_value").focus();
			return false;
		}else {
			return true;
		}
	}		
</script>
<div id="website_main" class="wrapper">
	<div id="content_login" class="left">
        <div class="post_admin">
            <h2>Administrator Login</h2>
            <div class="img_frame img_frame_23_new">
			<span style="margin-top:25px;margin-left:190px;">
				<form action="<?php echo base_url();?>admin/process_login" method="post" style="margin-top:40px;margin-left:45px;" onsubmit="return isValidAdminLogin();">
					<table width="100%" cellpadding="4" cellspacing="3" align="center">
						<tr><td width="100%" colspan="2" align="left">
							<div id="errorDisplay" style="color:#ff0000;margin-left:160px;float:left;font-weight:bold;">
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
							<td width="100%" colspan="2" align="center" style="padding-left:25px;">
								<input class="submit_btn float_l" type="submit" name="submitlogin" id="submitlogin" value="Login" />
							</td>
						</tr>				
					</table>				
				</form>
				</span>
			</div>
        </div>
    </div> <!-- END of content half -->
    <div class="clear"></div>
</div>