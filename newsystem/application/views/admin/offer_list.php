<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Offers <font style="color:#E16715;">[ Total <?php echo $total;?> offers posted ]</font></h2>
            <div style="line-height:25px;padding-top:10px;"> <!-- 918F8D-->
			<table width="100%" cellpadding="3" cellspacing="3" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="7">
						<div id="errorDisplay" style="color:#ff0000;margin-left:400px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
					<td width="25%">Offer Title</td>
					<td width="10%">Offer Type</td>
					<td width="15%">Valid From</td>
					<td width="15%">Valid Upto</td>
					<td width="10%">Offer Status</td>
					<td width="15%">Created On</td>
					<td width="15%">Action</td>
				</tr>
				<?php if(count($offer_list)>0){foreach($offer_list as $out) { ?>
				<tr style="font-size:11px;">
					<td><?php echo $out->offer_title;?></td>
					<td><?php echo $out->offer_type;?></td>
					<td><?php echo date("d M 'y",$out->offer_valid_from);?> </td>
					<td><?php echo date("d M 'y",$out->offer_valid_until);?></td>
					<td><?php echo $out->offer_status==1?'Active':'Inactive';?></td>
					<td><?php echo date("d M 'y",$out->offer_created_on);?></td>
					<td> 
						<a href="<?php echo base_url();?>admin/edit_offer/<?php echo $out->offer_id;?>">
							<img src="<?php echo base_url();?>images/edit.png" />
						</a> &nbsp; &nbsp; 
						<a href="<?php echo base_url();?>admin/delete_offer/<?php echo $out->offer_id;?>">
							<img src="<?php echo base_url();?>images/delete.png" />
						</a>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center">No Offers Added</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div class="clear"></div>