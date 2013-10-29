<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">List of Users <font style="color:#E16715;">[ Total <?php echo $total;?> users joined ]</font></h5>
            <div class="cleaner"></div>
		</div>
        <div class="clear"></div>          
        <div id="list_form">
            <div style="border:1px solid #CCCCCC;line-height:25px;"> <!-- 918F8D-->
			<table width="100%" cellpadding="3" cellspacing="0" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="7">
						<div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
					<td width="20%">Name</td>
					<td width="5%">Gender</td>
					<td width="25%">Email</td>
					<td width="30%">Address</td>
					<td width="8%">Phone</td>
					<td width="10%">Joined On</td>
					<td width="5%">Status</td>
				</tr>
				<?php if(count($user_list)>0){foreach($user_list as $out) { ?>
				<tr style="font-size:11px;"> 				
					<td><?php echo $out->pro_user_full_name;?></td>
					<td><?php echo $out->pro_user_gender;?></td>
					<td><?php echo $out->pro_user_email;?></td>
					<td><?php echo $out->pro_user_address.', '.$out->pro_user_city.', '.$out->pro_user_state;?></td>
					<td><?php echo $out->pro_user_phone;?></td>
					<td><?php echo date("d M 'y",$out->pro_user_joined);?></td>
					<td><?php echo $out->pro_user_status=='1'?'Active':'Inactive';?></td>
				</tr>
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"> No Users Joined</td>
				</tr>
				<?php } ?>
			</table>
			</div>
        </div>
        <div class="clear"></div>
</div>