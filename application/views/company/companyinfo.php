<div class="row">
    <div class="col-sm-6">
       <div class="panel panel-warning">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Company information</div>
        <div class="panel-body" style="padding: 30px;">
        <?php echo form_open('company/update', 'class="form-horizontal" id="form" role="form"');?>
            <div class="form-group">
                <label for="name" class="control-label sr_only">Name *</label>
                <?php echo form_input('name', $record['name'], 'id="name" class="form-control" id="name" placeholder=Enter company name"');?>
                <?php echo form_error('name');?>
            </div>
            <div class="form-group">
                <label for="attn_name" class="control-label sr_only">Att Name*</label>
                <?php echo form_input('attn_name', $record['attn_name'], 'id="name" class="form-control" placeholder=Enter Att Name"');?>
                <?php echo form_error('attn_name');?>
            </div>
            <div class="form-group">
                <label for="address1"
                class="control-label sr_only">Address 1*</label>
                <?php echo form_input('address1', $record['address1'], 'id="address1" class="form-control" placeholder=Enter Address 1 "');?>
                <?php echo form_error('address1');?>
            </div>
            <div class="form-group">
                <label for="address2"
                class="control-label sr_only">Address 2</label>
                <?php echo form_input('address2', $record['address2'], 'id="address2" class="form-control" placeholder=Enter Address 2 "');?>
                <?php echo form_error('address2');?>
            </div>
            <div class="form-group">
                <label for="city" class="control-label">City *</label>
                <?php echo form_input('city', $record['city'], 'id="city" class="form-control" placeholder=Enter city name "');?>
                <?php echo form_error('city');?>
            </div>
            <div class="form-group">
                <label for="state" class="control-label">State</label>
                <?php echo form_input('state', $record['state'], 'id="state" class="form-control" placeholder=Enter state"');?>
                <?php echo form_error('state');?>
            </div>
            <div class="form-group">
                <label for="country" class="control-label">Country</label>
                <?php echo form_input('country', $record['country'], 'id="Country" class="form-control" placeholder=Enter country land name"');?>
                <?php echo form_error('country');?>
            </div>
            <div class="form-group">
                <label for="postcode" class="control-label">Post code</label>
                <?php echo form_input('postcode', $record['postcode'], 'id="postcode" class="form-control" placeholder=Enter Post code"');?>
                <?php echo form_error('z_code');?>
            </div>
            <div class="form-group">
                <label for="email" class="control-label sr_only">Email *</label>
                <?php echo form_input('email', $record['email'], 'id="email" class="form-control" placeholder=Enter email"');?>
                <?php echo form_error('email');?>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label sr_only">Phone</label>
                <?php echo form_input('phone', $record['phone'], 'id="phone" class="form-control" placeholder=Enter phone"');?>
                <?php echo form_error('phone');?>
            </div>
            <div class="form-group">
                <label for="fax" class="control-label sr_only">Fax</label>
                <?php echo form_input('fax', $record['fax'], 'id="fax" class="form-control" placeholder=Enter fax "');?>
                <?php echo form_error('fax');?>
            </div>
            <div class="form-group">
                <label for="VAT_no"
                class="control-label sr_only">VAT #</label>
                <?php echo form_input('VAT_no', $record['VAT_no'], 'id="VAT_no" class="form-control" placeholder=Enter VAT Number "');?>
                <?php echo form_error('VAT_no');?>
            </div>
            <div class="form-group">
                <label for="registration_no"
                class="control-label sr_only">Registration #</label>
                <?php echo form_input('registration_no', $record['registration_no'], 'id="registration_no" class="form-control" placeholder=Enter registration number"');?>
                <?php echo form_error('registration_no');?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        <?php form_close();?>
        </div>
    </div>
</div>
    </div><!-- top row