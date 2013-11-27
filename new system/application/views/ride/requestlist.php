<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">List of Requests Received</h5>
            <div class="cleaner"></div>
		</div>
        <div class="clear"></div>          
        <div id="list_form">
            <div style="border:1px solid #CCCCCC;line-height:25px;"> <!-- 918F8D-->
		    <form style="margin:10px;" method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact" onsubmit="return isValidContact();">
			<table width="100%" cellpadding="3" cellspacing="0" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="5">
						<div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#015591;color:#FFF;">
					<td width="15%">Reqested By</td>
					<td width="10%">Requested On</td>
					<td width="40%">From & To Location</td>
					<td width="15%">Start & Return <br />Time</td>
					<td width="20%">Action</td>
				</tr>
				<?php if(count($request_list)>0){foreach($request_list as $out) { ?>
				<tr style="font-size:11px;">
					<td><?php echo $out->pro_user_full_name;?></td>
					<td><?php echo date("d M 'y",$out->requested_on);?></td>
					<td>
						<div style="float:left; border-bottom:1px dotted #E96F1C;">
							<font style="font-weight:bold;color:#E96F1C;">[FROM] : </font><?php echo $out->origin_location;?> 
						</div>
						<div style="float:left;">
							<font style="font-weight:bold;color:#E96F1C;">[TO] : </font><?php echo $out->destination_location;?>
						</div>
					</td>
					<td><?php echo $out->start_time;?> - <?php echo $out->return_time==''?'One Way':$out->return_time;?> <?php $responseID = 'request_row_'.$out->request_id; ?></td>
					<td align="center" id="<?php echo $responseID;?>">
					<input class="submit_btn float_l" type="button" name="Accept" id="Accept" value="Accept" onclick="javascript:confirmRequest('#<?php echo $responseID;?>','<?php echo $out->request_id;?>','1');" /> &nbsp; 
					<input class="submit_btn float_l" type="button" name="Reject" id="Reject" value="Reject" onclick="javascript:confirmRequest('#<?php echo $responseID;?>','<?php echo $out->request_id;?>','0');" />
					</td>
				</tr>
				<?php } ?>
				<?php if($pagelink!='') { ?>
				<tr style="font-size:11px;">
					<td colspan="5" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php } ?>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="5" align="center"> No Requests Received</td>
				</tr>
				<?php } ?>
			</table>
            </form>
			</div>
        </div>
        <div class="clear"></div>
</div>