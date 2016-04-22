<?php $this->load->view('auth/template/auth_header'); ?>
<?php echo form_open('auth/reset_password/' . $code,'class="login-wrapper"');?>
<div class="header">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<h3><?php echo lang('reset_password_heading');?><img src="<?php echo load_img('logo.jpg')?>" alt="solarvent Logo" class="pull-right"></h3>
		</div>
	</div>
</div>
<div class="content">
	<div class="form-control">
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</div>

	<div class="form-control">
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</div>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><?php echo form_submit('submit', lang('reset_password_submit_btn'),"class='btn btn-success'");?></p>
</div>
<?php echo form_close();?>
<?php $this->load->view('auth/template/auth_footer'); ?>