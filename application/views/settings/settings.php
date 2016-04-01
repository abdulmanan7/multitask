<link href="<?php echo load_css('wysi/bootstrap-wysihtml5.css')?>" rel="stylesheet">
<div class="left-sidebar">
  <div class="wrapper">
    <div class="viewport">
      <div class="overview">
        <div class="featured-articles-container">
          <h3 class="heading">
            <i class="icon ion-clock text-info"></i> Settings
          </h3>
          <div id="message"></div>
          <form action="<?=base_url('settings/update/' . $email_tpl['id'])?>" method="POST" role="form">
            <legend>Company info</legend>
            <div class="form-group">
              <label for="com_title">Company title</label>
              <input type="text" class="form-control" value="<?=$email_tpl['company_title']?>" name="comp_title">
            </div>
            <div class="form-group">
              <label for="comp_mail">Company Mail</label>
              <input type="text" class="form-control" value="<?=$email_tpl['company_email']?>" name="comp_mail">
            </div>
             <div class="form-group">
              <label for="comp_desc">Company Short description</label>
              <input type="text" class="form-control" value="<?=$email_tpl['description']?>" name="comp_desc">
            </div>

          <fieldset>
            <legend>Email Template</legend>
            <div class="form-group">
              <label for="name">Subject *</label>
              <input type="text" class="form-control" id="sname" value="<?=$email_tpl['subject']?>" name="sname">
            </div>
            <div class="form-group">
              <label for="description">Body</label>
              <textarea name="ebody" class="form-control wysihtml5" rows="10" ><?=$email_tpl['body']?></textarea>
          </fieldset>
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
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