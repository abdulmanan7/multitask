<!DOCTYPE html>
<html>
  <!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:23 GMT -->
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SOLARvent - Registeration</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Eckool -- eckool, is school management system ,that management fee ,examination and registration of students" />
    <meta name="keywords" content="school,eckool,school management,school management system" />
    <meta name="author" content="Bootstrap Gallery modified by Abdul Manan" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>">
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
        label.error {
            color: #FF0000;
              padding-left: 0px;
            margin-left: 0;
          }
          label {
            display: inline-block;
             max-width: 100%;
             margin-bottom: 0;
             font-weight:500;
          }
          img{
            width: 100px;
          }
        </style>
  </head>
  <body>
    <!-- Main Container start -->
    <div class="dashboard-container">
      <div class="container">
        <!-- Row Start -->
        <div class="row">
          <div class="col-lg-4 col-md-4 col-md-offset-4">
            <div class="sign-in-container">
              <?php echo form_open("signup/add", 'id="form" class="login-wrapper"');?>
                              <div class="header">
                                <div class="row">
                                  <div class="col-md-12 col-lg-12">
                                    <h3><?php echo lang('signup_heading');?><img src="<?php echo load_img('logo.jpg')?>" alt="eckool Logo" class="pull-right"></h3>
                                  </div>
                                </div>
                              </div>

               <div class="content">
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php echo form_input('first_name', set_value('first_name'), 'id="first_name" class="form-control" placeholder=' . '"' . lang('placeholder_first_name') . '"' . "'");?>
                <span class="help-block error"><?php echo form_error('first_name');?></span>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php echo form_input('last_name', set_value('last_name'), 'id="last_name" class="form-control" placeholder=' . '"' . lang('placeholder_last_name') . '"' . "'");?>
                <span class="help-block error"><?php echo form_error('last_name');?></span>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php echo form_input('company', set_value('company'), 'id="company" class="form-control" placeholder=' . '"' . lang('placeholder_company') . '"' . "'");?>
                <span class="help-block error"><?php echo form_error('company');?></span>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?php echo form_input('email', set_value('email'), 'id="email" class="form-control" placeholder=' . '"' . lang('placeholder_email') . '"' . "'");?>
                <span class="help-block error"><?php echo form_error('email');?></span>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo form_password('password', set_value('password'), 'id="password" class="form-control" placeholder=' . '"' . lang('placeholder_password') . '"' . "'");?>
                <span class="help-block error"><?php echo form_error('password');?></span>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo form_password('password_confirm', set_value('password_confirm'), 'id="password_confirm" class="form-control" placeholder=' . '"' . lang('placeholder_password_confirm') . '"' . "'");?>
                <span class="help-block error"><?php echo form_error('password_confirm');?></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" checked="checked"> I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                    <?php echo form_submit('submit', lang('signup_btn'), 'class="btn btn-success"');?>
                    </div><!-- /.col -->
                  </div>
                  <?php echo form_close();?>
              <?php echo lang('heading_already_reg');?><a href="<?php echo base_url('auth/login');?>" > <?php echo lang('heading_login');?></a>
                  </div>
            </div><!-- /.form-box -->
          </div><!-- /.register-box -->
        </div>
      </div>
    </div>
    <!-- jQuery 2.1.3 -->
      <script src="<?php echo load_js('jquery-1.11.0.min.js');?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo load_js('bootstrap.min.js');?>"></script>
    <script src="<?php echo load_js('jquery.validate.min.js');?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#form').validate(
        {
          rules: {
            first_name: {
              minlength: 2,
              required: true
            },
            last_name: {
              minlength: 2,
              required: true
            },
            company: {
              minlength: 2,
              required: true
            },
            email: {
              required: true,
              email: true
            },
            password: {
              required: true,
              minlength: 8,
            },
            confirm_password: {
              required: true,
              minlength: 8,
              equalTo: "#password"
            },
          }
        });
      });
    </script>
  </body>
</html>