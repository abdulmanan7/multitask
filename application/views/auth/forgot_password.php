<?php $this->load->view('auth/template/auth_header'); ?>
<?php echo form_open("auth/forgot_password",'class="login-wrapper"');?>
<div class="header">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<h3><?php echo lang('forgot_password_heading');?><img src="<?php echo load_img('logo.jpg')?>" alt="solarvent Logo" class="pull-right"></h3>
		</div>
	</div>
</div>
<div class="content">
<p>
<?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?>
</p>
      <div class="form-control">
      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
      	<?php echo form_input($email);?>
      </div>

      <p>
      <?php echo form_submit('submit', lang('forgot_password_submit_btn'),"class='btn btn-success'");?>
      </p>
      </div>
<?php echo form_close();?>
<?php $this->load->view('auth/template/auth_footer'); ?>