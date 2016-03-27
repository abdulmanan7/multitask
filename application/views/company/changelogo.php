<?php if (null !== $this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
}?>
                <?php if (!empty($message)): ?>
                            <?php echo $message;?>
                <?php endif?>
<?php if (!isset($record)) {echo "No Record ";}?>
<div class="box">
    <div class="box-header with-border">
        <i class="glyphicon glyphicon-picture" aria-hidden="true"></i>
        <?php echo lang('heading_change_logo');?>
    </div>
    <div class="box-body">
        <?php echo form_open_multipart('company/do_upload', 'class="form-horizontal" role="form"');?>
        <div class="form-group">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="#"><img src="<?php echo base_url();
echo $record['logo'];?>"></a>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="input-group input-prepend">
                    <div class="form-group">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <span class="help-block">Supported Files jpg,gif,png,jpeg<br/>File size must not be greater then 200kb.</span>
                        <?php echo form_upload('logo', $record['logo'], 'id="logo" class="form-control upload"' . 'placeholder=' . '"' . lang('placeholder_logo') . '"' . "'");?>
                        <?php echo form_error('logo');?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-upload"></i><?php echo lang('update_btn');?></button>
                    </div>
                </div>
            </div>
        </div>
        <?php form_close();?>
    </div>
</div>