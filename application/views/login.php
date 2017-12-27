<?php $this->load->view('includes/header'); ?>
 
    <div id="content">
    	<div id="login-form" class="ibox-content animated fadeInRight m-t-xs">

            <?php echo form_open('login/validate'); ?>
                <h3><?php echo $this->lang->line('panel_login_title'); ?></h3>
                <hr />
                <div class="form-group">
                	<label class="control-label gray"><?php echo $this->lang->line('email_short'); ?>:</label> <input type="text" name="username" placeholder="" class="form-control" />
                </div>
                <div class="form-group">
                	<label class="control-label gray"><?php echo $this->lang->line('password'); ?>:</label> <input type="password" name="password" placeholder="" class="form-control" />
                </div>
                <div class="form-group">
                <div class="form-group" style="position:relative;">
                	<label class="control-label gray"><?php echo $this->lang->line('remember_me'); ?>:</label> <span><input type="checkbox" name="remember" checked class="checkbox i-checks" /></span>
                    <div id="new-pass"><a href="#"><?php echo $this->lang->line('forgot_password'); ?></a></div>
                </div>
                	<input type="submit" name="giris" value="<?php echo $this->lang->line('login'); ?>" class="btn btn-sm btn-danger" style="min-width: 80px;" />
                </div>
                <span style="font-style: italic; font-size: 11px;"><?php echo $this->lang->line('please_login_first'); ?></span>
            <?php echo form_close(); ?>
    
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>