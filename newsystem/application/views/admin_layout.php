<?php $this->load->view('admin/admin_header'); ?>
<?php $this->load->view('admin/admin_menu'); ?>
<?php if(1) { // $this->session->userdata('admin_user_id')!=''?>
<?php $this->load->view('admin/admin_sidebar'); ?>
<?php } ?>
<?php $this->load->view($page_name); ?>
<?php $this->load->view('admin/admin_footer'); ?>