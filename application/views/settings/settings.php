<link href="<?php echo load_css('wysi/bootstrap-wysihtml5.css')?>" rel="stylesheet">
<div class="left-sidebar">
  <div class="wrapper">
    <div class="viewport">
      <div class="overview">
        <div class="featured-articles-container">
          <h3 class="heading">
            <i class="icon ion-clock text-info"></i> Einstellungen
          </h3>
          <div id="message"></div>
          <form class="form-horizontal" action="<?=base_url('settings/update/' . $email_tpl['id'])?>" method="POST" role="form" id="frmSetting">
            <div class="row">
              <div class="col-sm-12">
                <legend>Firmendetails</legend>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="com_title" class="control-label col-sm-4">Firmenname</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?=$email_tpl['company_title']?>" name="comp_title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="comp_mail" class="control-label col-sm-4">eMail Fotobegehung</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?=$email_tpl['company_email']?>" name="comp_mail">
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label for="comp_attn_name" class="control-label col-sm-3">Attn Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$email_tpl['attn_name']?>" name="attn_name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="comp_vat_no" class="control-label col-sm-3">VAT #</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$email_tpl['VAT_no']?>" name="vat_no">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="comp_desc" class="control-label col-sm-3">Company Short description</label>
                      <div class="col-sm-9">
                        <textarea name="comp_desc" class="form-control" rows="3"><?=$email_tpl['description']?>
                        </textarea>
                      </div>
                    </div> -->
                  </div>
                  <div class="col-sm-6">

                    <!-- <div class="form-group">
                      <label for="comp_post_code" class="control-label col-sm-3">Post code</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$email_tpl['post_code']?>" name="post_code">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="comp_phone" class="control-label col-sm-3">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$email_tpl['phone']?>" name="phone">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="comp_address" class="control-label col-sm-3">Address</label>
                      <div class="col-sm-9">
                        <textarea name="address" class="form-control" rows="3"><?=$email_tpl['address']?>
                        </textarea>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <fieldset>
              <legend>eMail Vorlage</legend>
              <div class="form-group">
                <label for="name">Betreff *</label>
                <input type="text" class="form-control" id="sname" value="<?=$email_tpl['subject']?>" name="sname">
              </div>
              <div class="form-group">
                <label for="description">Textfeld</label>
                <textarea name="ebody" class="form-control wysihtml5" rows="10" ><?=$email_tpl['body']?></textarea>
              </fieldset>
            </div>
            <button type="submit" class="btn btn-success" id="submit">Speichern</button>
          </form>
        </div><!--add new job panel end -->
      </div>
    </div>
  </div>
</div>
<script src="<?php echo load_js('wysi/wysihtml5-0.3.0.min.js')?>"></script>
<script src="<?php echo load_js('wysi/bootstrap3-wysihtml5.js')?>"></script>
<script>
  $('.wysihtml5').wysihtml5({
    "image": false,
    "link": false,
  });
</script>
  <!-- Left Sidebar Start -->