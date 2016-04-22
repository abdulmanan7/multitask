<?php $this->load->view('auth/template/auth_header'); ?>
<?php echo form_open(current_url(),'class="login-wrapper"');?>
<div class="header">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<h3><?php echo lang('edit_group_heading');?><img src="<?php echo load_img('logo.jpg')?>" alt="solarvent Logo" class="pull-right"></h3>
		</div>
	</div>
</div>
<div class="content">
	<div class="form-group">
		<?php echo lang('edit_group_subheading');?>
	</div>


	<div class="form-group">
		<?php echo lang('edit_group_name_label', 'group_name');?> <br />
		<?php echo form_input($group_name);?>
	</div>

	<div class="form-group">
		<?php echo lang('edit_group_desc_label', 'description');?> <br />
		<?php echo form_input($group_description);?>
	</div>

	<p><?php echo form_submit('submit', lang('edit_group_submit_btn'),"class='btn btn-success'");?></p>

	<?php echo form_close();?>
	</div>
<?php $this->load->view('auth/template/auth_footer'); ?>