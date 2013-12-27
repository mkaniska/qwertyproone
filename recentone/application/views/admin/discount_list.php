<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Discounts <font style="color:#E16715;">[ Total <?php echo $total;?> discounts added ]</font></h2>
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
					<td width="25%">Discount Title</td>
					<td width="15%">Discount Type</td>
					<td width="10%">Applicable City</td>
					<td width="15%">Discount Provider</td>
					<td width="10%">Posted On</td>
					<td width="10%">Status</td>
					<td width="10%">Action</td>
				</tr>
				<?php if(count($discount_list)>0){foreach($discount_list as $out) { ?>
				<tr style="font-size:11px;">
					<td><?php echo $out->discount_title;?></td>
					<td><?php echo $out->discount_type;?></td>
					<td><?php echo $out->discount_city;?></td>
					<td><?php echo $out->discount_provider;?></td>
					<td><?php echo date("d M 'y",$out->discount_created_on);?></td>
					<td><?php echo $out->discount_status==1?'Active':'Inactive';?></td>
					<td> &nbsp; &nbsp;
						<a href="<?php echo base_url();?>admin/edit_discount/<?php echo $out->discount_id;?>" title="Edit" alt="Edit">
							<img src="<?php echo base_url();?>images/edit.png" />
						</a> &nbsp; &nbsp; 
						<a title="Delete" alt="Delete" href="<?php echo base_url();?>admin/delete_discount/<?php echo $out->discount_id;?>" onclick="return confirm('Are you sure to delete this discount ?');">
							<img src="<?php echo base_url();?>images/delete.png" />
						</a>
					</td>
				</tr>
				<?php } ?>
				<?php if($pagelink!=''){?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php } ?>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="7" align="center">No discounts Added</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div class="clear"></div>