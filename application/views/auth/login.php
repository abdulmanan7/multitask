<!DOCTYPE html>
<html>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:23 GMT -->
<head>
    <title>Login - SOLARvent</title>
    <meta charset="UTF-8" />

    <link href="<?php echo find_url('assets', 'css/bootstrap.min.css');?>" rel="stylesheet">

    <link href="<?php echo find_url('assets', 'css/new.css');?>" rel="stylesheet">
    <!-- Important. For Theming change primary-color variable in main.css  -->

    <link href="<?php echo find_url('assets', 'fonts/font-awesome.min.css');?>" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
      .introduction{
        margin: 30px auto;
        background:#88B7D4;
      }
      img{
            width: 120px;
      }
    </style>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-40304444-1', 'iamsrinu.com');
      ga('send', 'pageview');

    </script>
  </head>

  <body>

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">

        <!-- Row Start -->
        <div class="row">
          <div class="col-lg-4 col-md-4 col-md-offset-4">
            <div class="sign-in-container">
            <div id="infoMessage"><?php echo $message;?></div>
              <?php echo form_open("auth/login", 'class="login-wrapper"');?>
                <div class="header">
                  <div class="row">
                    <div class="col-md-12 col-lg-12">
                      <h3><?php echo lang('login_heading');?><img src="<?php echo load_img('logo.jpg')?>" alt="solarvent Logo" class="pull-right"></h3>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <div class="form-group">
                    <label for="userName"><?php echo lang('login_identity_label', 'identity');?></label>
                    <?php echo form_input($identity);?>
                  </div>
                  <div class="form-group">
                    <label for="Password"><?php echo lang('login_password_label', 'password');?></label>
                      <?php echo form_input($password);?>
                  </div>
                   <div class="form-group">
                    <label for="remember"><?php echo lang('login_remember_label', 'remember');?></label>
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                  </div>
                </div>
                <div class="actions">
                  <?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-success"');?>
                  <div class="clearfix"></div>
                </div>
                  <?php echo form_close();?>
            </div>
          </div>
        </div>
        <!-- Row End -->

      </div>
    </div>
    <!-- Main Container end -->

    <script src="<?php echo find_url('js', 'jquery-1.11.0.min.js');?>"></script>
    <script src="<?php echo find_url('js', 'bootstrap.min.js');?>"></script>

  </body>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:24 GMT -->
</html>