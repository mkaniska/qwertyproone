<?php $this->load->view('header'); ?>
<?php $this->load->view($page_name); ?>
<?php if($page_name!='welcome/home' && $page_name!='welcome/index' && $page_name!='user/register' && $page_name!='ride/postride' && $page_name!='welcome/thanks') { ?>
<?php $this->load->view('top_footer'); ?>
<?php } ?>
<?php $this->load->view('footer'); ?>