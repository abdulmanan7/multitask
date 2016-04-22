<?php $this->load->view('auth/template/auth_header'); ?>

<?php echo form_open("auth/deactivate/".$user->id,'class="login-wrapper"');?>
<div class="header">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<h3><?php echo lang('deactivate_heading');?><img src="<?php echo load_img('logo.jpg')?>" alt="solarvent Logo" class="pull-right"></h3>
		</div>
	</div>
</div>
<div class="content">
<p>
<?php echo sprintf(lang('deactivate_subheading'), $user->username);?>
</p>
  <div class="checkbox">
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </div>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>
 <br/>
  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'),"class='btn btn-success'");?></p>
</div>
<?php echo form_close();?>
<?php $this->load->view('auth/template/auth_footer'); ?>