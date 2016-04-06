<!DOCTYPE html>
<html>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:24 GMT -->
<head>
    <title>SOLARvent</title>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="<?php echo ASSETS . '/img/favicon.ico'?>">

    <link href="<?php echo ASSETS . "/css/bootstrap.min.css";?>" rel="stylesheet">

    <link href="<?php echo ASSETS . '/css/new.css';?>" rel="stylesheet">
    <!-- Important. For Theming change primary-color variable in main.css  -->

    <link href="<?php echo ASSETS . '/fonts/font-awesome.min.css';?>" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">

        <!-- Row Start -->
        <div class="row">
          <div class="col-lg-4 col-md-4 col-md-offset-4">

            <div class="page-not-found center-align-text">
              <div class="number">404</div>
                <h1><?php echo $heading;?></h1>
              <p>
    <?php echo $message;?>
                <br>
                Try the search bar below.
              </p>
              <form action="#">
                <div class="input-group">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Search</button>
                  </span>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- Row End -->
      </div>
    </div>
    <!-- Main Container end -->

    <script src="<?php echo ASSETS . '/js/jquery.js'?>"></script>
    <script src="<?php echo ASSETS . '/js/bootstrap.min.js'?>"></script>

  </body>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:24 GMT -->
</html>