
	<div id="templatemo_banner">
	
		<h3>Free Website Templates</h3>
		
		<p>Vivamus laoreet pharetra eros. In quam nibh, placerat ac, porta ac, molestie non, purus. Curabitur sem ante, condimentum non, cursus quis, eleifend non, libero. Nunc a nulla. Suspendisse vitae orci a ligula egestas bibendum. Vestibulum ultrices. Pellentesque tempus sapien nec sem commodo ullamcorper. Aenean neque.</p>
		
		<div class="button"><a href="#">Read more</a></div>
		
	</div>

</div> <!-- end of header_wrapper -->

<div id="templatemo_content_wrapper_outer">
<div id="templatemo_content_wrapper_inner">
<div id="templatemo_content_wrapper">

	<div id="templatemo_content">
        
		<h2>Website Templates Gallery</h2>
        
            <p>In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero.</p>  
            
          <div class="cleaner_h40"></div>
            
            <div id="gallery">
                <ul>
				<?php foreach($results as $key=>$value) { ?>
                    <li>
                        <a href="#" title="<?php echo $value->project_name;?>">
							<img src="<?php echo base_url();?>images/gallery/thumbnail/<?php echo $value->project_image;?>" alt="01" />
						</a>
                        <h5><?php echo $value->project_name;?></h5>
                        <p><?php echo $value->project_description;?></p>
                        <div class="button"><a href="#">Visit Site</a></div>
                    </li>
				<?php  }  ?>
                </ul>

        	</div>
            
        </div> <!-- end of templatemo_content -->        
        
		<?php $this->load->view('sidebar'); ?>

	<div class="cleaner"></div>
</div>
</div>
</div> 