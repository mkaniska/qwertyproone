<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">Global Setting & Enabled IP List</h5>
		</div>
        <div class="clear"></div>
        <div id="contact_form">
            <div style="border:5px solid #CCCCCC;width:1000px;margin-top:-5px;"> <!-- 918F8D-->
				<form style="margin:5px;" method="post" name="settingsForm" id="settingsForm" action="<?php echo base_url();?>user/update_settings">
				<table width="95%" cellpadding="0" cellspacing="2" align="center">
					<tr>
						<td width="100%" colspan="5">
							<div id="errorDisplay" style="color:#ff0000;margin-left:340px;float:left;font-weight:bold;">
							<?php if($this->session->flashdata('flash_message') !='') { ?>
								<?php echo $this->session->flashdata('flash_message'); ?>
							<?php } ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="25%">
							Email Domain :<br />
							<input value="<?php echo $user_settings->pro_user_domain;?>" type="text" id="email_domain" name="email_domain" class="required input_field" style="width:200px;" />
						</td>
						<td width="25%">
							Address : <br />
							<input value="<?php echo $user_settings->pro_user_address;?>" type="text" id="address" name="address" class="required input_field1" style="width:180px;" />
						</td>						
						<td width="25%">						
							City : <br />
							<select name="city" id="city">
								<option value="0" selected="selected">Select City</option>
								<?php foreach($cities_list as $key=>$value) { ?>
									<option value="<?php echo $value;?>" <?php if($user_settings->pro_user_city==$value){?> selected="selected" <?php } ?>><?php echo $value;?></option>
								<?php } ?>
							</select>
						</td>
						<td width="25%" colspan="2">						
							Zipcode : <br />
							<input value="<?php echo $user_settings->pro_user_zipcode;?>" type="text" id="zipcode" name="zipcode" class="required input_field1" style="width:70px;" />
						</td>
					</tr>
					<tr>
						<td width="25%">
							State: <br />
							<select name="state" id="state">
								<option value="0" selected="selected">Select State</option>
								<?php foreach($states_list as $key=>$value) { ?>
									<option value="<?php echo $value->city_state;?>" <?php if($user_settings->pro_user_state==$value->city_state){?> selected="selected" <?php } ?>><?php echo $value->city_state;?></option>
								<?php } ?>
							</select>
						</td>
						<td width="30%" colspan="2">						
							Contact Email : <br />
							<input readonly="readonly" value="<?php echo $user_settings->pro_user_email;?>" type="text" id="email_address" name="email_address" class="required input_field1" style="width:300px;" />
						</td>
						<td width="20%">
							Phone Number :<br />
							<input value="<?php echo $user_settings->pro_user_phone;?>" type="text" id="phone_number" name="phone_number" class="required input_field" style="width:150px;" />
						</td>
						<td width="25%">
							<input type="submit" name="doUpdate" id="doUpdate" value="Update" class="submit_btn float_l" />
						</td>
					</tr>
					<tr><td width="100%" colspan="5">  </td></tr>
			</table>
            </form>
			</div>
			<div id="searchedResult" style="overflow:auto;border:1px solid #CCCCCC;margin-left:100px;margin-top:20px;padding-top:20px;width:800px;height:350px;text-align:center;">
				<div style="float:right:margin-right:10px;margin-bottom:20px;font-weight:bold;">
					<a href="javascript:addIP();">Add IP Access <img align="absmiddle" src="<?php echo base_url();?>admin-images/pluse.png" /></a>
				</div>
				<table width="90%" cellpadding="3" cellspacing="0" align="center" border="1">
					<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
						<td width="10%">S.No</td>
						<td width="30%">IP Address</td>
						<td width="30%">Added On</td>
						<td width="20%">Action</td>
					</tr>
					<?php if(count($ip_list)>0) { $inc=1;foreach($ip_list as $key=>$out) { ?>
					<tr style="font-size:11px;text-align:left;padding-left:3px;"> 				
						<td><?php echo $inc++;?></td>
						<td><?php echo $out->ip_address;?></td>
						<td><?php echo date("d M 'y",$out->ip_added_on);?></td>
						<td align="center">
						<a href="<?php echo base_url();?>user/delete_ip/<?php echo $out->ip_id;?>" alt="Delete" title="Delete" onclick="return confirm('Are you sure to delete this entry ?');">
							<img src="<?php echo base_url();?>images/delete.png" border="0" />
						</a>
						</td>
					</tr>	
					<?php } ?>
					<tr style="font-size:11px;">
						<td colspan="4" align="center"><?php //echo $pagelink;?></td>
					</tr>				
					<?php }else { ?>
					<tr>
						<td colspan="4" align="center">No IP Addresses Added</td>
					</tr>
					<?php } ?>
				</table>
			</div>
        </div>
        <div class="clear"></div>
</div>
<div id="dialog" title="Add New IP Address">
	<form action="<?php echo base_url();?>user/process_addipaddress" method="post" onsubmit="return isValidIP()">
		<table width="50%" cellpadding="0" cellspacing="0" align="center" border="0">
			<tr><td id="iperror" style="color:#ff0000;"> &nbsp; </td></tr>
			<tr>
				<td> IP Address :
					<input type="text" name="ip_address"  class="required input_field" id="ip_address" style="width:175px;" />
				</td>
			</tr>
			<tr><td> &nbsp; </td></tr>
			<tr>
				<td align="center">
					<input type="submit" name="addIP" id="addIP" value="Add" class="submit_btn float_l" />
				</td>
			</tr>
		</table>
	</form>
</div>