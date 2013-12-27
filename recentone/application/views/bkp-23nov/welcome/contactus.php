<div id="website_main" class="wrapper">
        <div class="col one_third_1">
            <h5 style="padding-bottom:5px;">Corporate Office</h5>
            140-320 lacus risus accumsan, Pestibulum auctor, 12430, Vivamus, viverra massa, email: info [ at ] yoursite [ dot ] com  <br />
            <div class="cleaner"></div>
		</div>
        <div class="clear"></div>          
        <div id="contact_form">
           <form method="post" name="contact_us_form" id="contact_us_form" action="<?php echo base_url();?>welcome/process_contact" onsubmit="return isValidContact();">
				
				<div id="errorDisplay" style="color:#ff0000;float:left;margin-left:300px;font-weight:bold;">
				<?php if($this->session->flashdata('flash_message') !='') { ?>
					<?php echo $this->session->flashdata('flash_message'); ?>
				<?php } ?>
				</div><div class="cleaner h20"></div>
           		<div class="col one_third">
                    <label for="subject">* Subject :-</label> <input type="text" id="subject" name="subject" class="required input_field" />
                    <div class="cleaner h10"></div>
                    
                    <label for="full_name">* Name :-</label> <input type="text" id="full_name" name="full_name" class="validate-email required input_field" />
                    <div class="cleaner h10"></div>
                        
					<label for="email_address">* Email :-</label> <input type="text" name="email_address" id="email_address" class="input_field" />
                    <div class="cleaner h10"></div>
					
					<label for="phone_number">* Phone :-</label> <input type="text" name="phone_number" id="phone_number" class="input_field" />
                    <div class="cleaner h10"></div>					
				</div>
                
                <div class="col two-third no_margin_right">
                    <label for="message_text">* Message :-</label> <textarea id="message_text" name="message_text" rows="0" cols="0" class="required" style="height:220px;"></textarea>
                    <div class="cleaner h10"></div>
				</div>
                
                <div class="cleaner h20"></div>  
                <p style="margin-left:50px;">
                <input type="submit" value="Submit" id="doContact" name="doContact" class="submit_btn float_l" /> &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="button" value="Cancel" id="doCancel" name="doCancel" class="submit_btn float_l" />  
				</p>	
            </form>
        </div>
        <div class="clear"></div>
 
</div>