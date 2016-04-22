<?php $this->load->view('auth/template/auth_header'); ?>

<?php echo form_open("auth/change_password",'class="login-wrapper"');?>
<div class="header">
      <div class="row">
            <div class="col-md-12 col-lg-12">
                  <h3><?php echo lang('change_password_heading');?><img src="<?php echo load_img('logo.jpg')?>" alt="solarvent Logo" class="pull-right"></h3>
            </div>
      </div>
</div>
<div class="content">
  <div class="form-control">
      <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
      <?php echo form_input($old_password);?>
</div>

<div class="form-control">
      <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
      <?php echo form_input($new_password);?>
</div>

<div class="form-control">
      <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
      <?php echo form_input($new_password_confirm);?>
</div>

<div class="form-control">
<?php echo form_input($user_id);?>
</div>
 <br/>
 <p><?php echo form_submit('submit', lang('change_password_submit_btn'),"class='btn btn-success'");?></p>
</div>
<?php echo form_close();?>
<?php $this->load->view('auth/template/auth_footer'); ?>
