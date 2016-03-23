<base href="<?php echo base_url();?>">
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $class = $this->router->fetch_class();?>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="assets/plugins/upload/css/style.css">
    <?php if ($class == "reports"): ?>
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="assets/plugins/upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="assets/plugins/upload/css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="assets/plugins/upload/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="assets/plugins/upload/css/jquery.fileupload-ui-noscript.css"></noscript>
    <?php endif?>
    <script type="text/javascript" src="<?=base_url('assets/plugins/kendo/jquery.min.js')?>">
    </script>
    <script>
     var base = "<?=base_url();?>";
     function baseUrl(url){
        return base+url;
    }
</script>
<?php if ($class == "welcome"): ?>
<link href="<?=base_url('assets/plugins/kendo/kendo.common.min.css');?>" rel="stylesheet">
<link href="<?=base_url('assets/plugins/kendo/kendo.custom.css');?>" rel="stylesheet">
<script type="text/javascript" src="<?=base_url('assets/plugins/kendo/kendo.all.min.js')?>"></script>
<?php endif?>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="container" class="question-box effect7">