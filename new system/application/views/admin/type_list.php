<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Industry Types <font style="color:#E16715;">[ Total <?php echo $total;?> Types ]</font></h2>
            <div style="line-height:25px;padding-top:10px;"> <!-- 918F8D-->
			<table width="60%" cellpadding="3" cellspacing="3" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="2">
						<div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="2" align="center"><?php echo $pagelink;?></td>
				</tr>				
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
					<td width="10%">S.No</td>
					<td width="90%">Type of Industry</td>
				</tr>
				<?php $inc = 1; if(count($type_list)>0){foreach($type_list as $out) { ?>
				<tr style="font-size:11px;"> 				
					<td align="center"><?php echo $inc++;?></td>
					<td><?php echo $out->company_type;?></td>
				</tr>
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="2" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="2" align="center"> No Company Types Available</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div class="clear"></div>