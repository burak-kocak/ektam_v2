<?php $this->load->view('includes/header'); ?>
 
    <div id="content">
    	<div id="login_form" class="ibox-content animated fadeInRight m-t-xs">

            Hi, this is the customer page.

            <code><?php echo $this->session->userdata['user']->email; ?></code>

        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>