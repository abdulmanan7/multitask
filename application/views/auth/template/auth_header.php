<!DOCTYPE html>
<html>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:23 GMT -->
<head>
	<title>Users - SOLARvent</title>
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
  </head>

  <body>

  	<!-- Main Container start -->
  	<div class="dashboard-container">

  		<div class="container">
  			<!-- Row Start -->
  			<div class="row">
  				<div class="col-lg-4 col-md-4 col-md-offset-4">
  					<div class="sign-in-container">
  						<?=isset($message) ? $message : "";?>