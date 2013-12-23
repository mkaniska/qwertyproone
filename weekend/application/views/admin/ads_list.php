<div class="grid_10">
	<div class="box round first grid">
		<h2>List of Ads <font style="color:#E16715;">[ Total <?php echo $total;?> Ads posted ]</font></h2>
            <div style="line-height:25px;padding-top:10px;"> <!-- 918F8D-->
			<table width="90%" cellpadding="3" cellspacing="3" align="center" border="1">
			<?php if($this->session->flashdata('flash_message') !='') { ?>
				<tr>
					<td width="100%" colspan="3">
						<div id="errorDisplay" style="color:#ff0000;margin-left:300px;float:left;font-weight:bold;">
								<?php echo $this->session->flashdata('flash_message'); ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr style="font-weight:bold;font-size:11px;text-align:center;background-color:#ccc;">
					<td width="30%">Ads Details</td>
					<td width="30%"> Comments</td>
					<td width="10%">Actions</td>
				</tr>
				<?php if(count($ads_list)>0){foreach($ads_list as $out) { ?>
				<tr style="font-size:11px;"> 				
					<td>
					Title : <?php echo $out->ads_title;?> <br />
					URL : <?php echo $out->ads_url;?> <br />
					Posted On : <?php echo date("d M 'y",$out->ads_posted_on);?>
					</td>
					<td><?php echo $out->ads_comments;?></td>
					<td align="center">
						<a href="<?php echo base_url().'/ads_images/'.$out->ads_image;?>" rel="lightbox" title="View Image">
							<img src="<?php echo base_url();?>admin-images/picture.png" border="0" />
						</a> &nbsp; &nbsp;					
						<a href="<?php echo base_url();?>admin/edit_ads/<?php echo $out->ads_id;?>" title="Edit" alt="Edit">
							<img src="<?php echo base_url();?>images/edit.png" />
						</a> &nbsp; &nbsp; 
						<a title="Delete" alt="Delete" href="<?php echo base_url();?>admin/delete_ads/<?php echo $out->ads_id;?>" onclick="return confirm('Are you sure to delete this Ads ?');">
							<img src="<?php echo base_url();?>images/delete.png" />
						</a>
					</td>
				</tr>
				<?php } ?>
				<?php if($pagelink!='') { ?>
				<tr style="font-size:11px;">
					<td colspan="3" align="center"><?php echo $pagelink;?></td>
				</tr>
				<?php } ?>
				<?php }else{?>
				<tr style="font-size:11px;">
					<td colspan="3" align="center"> No Ads Posted</td>
				</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>
<div class="clear"></div>