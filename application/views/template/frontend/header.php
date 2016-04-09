<base href="<?php echo base_url();?>">
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php $class = $this->router->fetch_class();?>
    <meta charset="utf-8">
    <title>Welcome</title>
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/upload/css/style.css')?>">
    <?php if ($class == "reports"): ?>

<link href="<?=base_url('assets/SmartWizard/styles/smart_wizard.css')?>" rel="stylesheet" type="text/css">
    <!-- blueimp Gallery styles -->
    <!-- <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"> -->
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/upload/css/jquery.fileupload.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/upload/css/jquery.fileupload-ui.css')?>">
    <link href="<?php echo load_fonts('font-awesome.min.css');?>" rel="stylesheet">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="<?=base_url('assets/plugins/upload/css/jquery.fileupload-noscript.css')?>"></noscript>
    <noscript><link rel="stylesheet" href="<?=base_url('assets/plugins/upload/css/jquery.fileupload-ui-noscript.css')?>"></noscript>
    <?php endif?>
        <script src="<?=base_url('assets/plugins/upload/js/jquery.js')?>"></script>
    <script type="text/javascript">
     var base = "<?=base_url();?>";
     function baseUrl(url){
        return base+url;
    }
    $(document).ready(function(){
        // Smart Wizard
        $('#wizard').smartWizard({
            transitionEffect:'slideleft',
            onFinish:onFinishCallback,
            onShowStep:onShowStepCallback,
            enableFinishButton:true,
            labelNext:"Nächster",
            enableAllSteps:true,
            labelPrevious:"früher",
            labelFinish:"Formular jetzt absenden",
            includeFinishButton: false,
        btFinish:false
    });
        function onFinishCallback(){
            $('#fileupload').submit();
        }
        function onShowStepCallback(obj){
            currentStep = $(obj.attr('href'));
            currentStep.addClass('FocusedStep');
            currentStep.siblings().removeClass('FocusedStep');
            $('#fileupload').fileupload("option","filesContainer",$(".FocusedStep").find("tbody.files"));
            if (obj.attr('href') == "#step-1") {
            $('.buttonNext').text('Nächste').css('display', 'block');
            $('.buttonPrevious').text("weiter");
            $('#submit').css('display', 'none');
            }else if(obj.attr('href') == "#step-7"){
            $('.buttonNext').css('display',"none");
            if ($('#submit').length==0) {
             var finish = $("<button>",{
                id:"submit",
                class:"btn btn-success",
                type:"submit",
                text:"Formular jetzt absenden !"
             }).insertAfter(".actionBar .loader");
            }else{
            $('#submit').css('display', 'block');
            }
            }
            else{
            $('.buttonNext').text('zurück').css('display', 'block');
            $('.buttonPrevious').text("weiter");
            $('#submit').css('display', 'none');
            }
        }
    });
</script>
<?php if ($class == "welcome"): ?>
<link href="<?=base_url('assets/plugins/kendo/kendo.common.min.css');?>" rel="stylesheet">
<link href="<?=base_url('assets/plugins/kendo/kendo.custom.css');?>" rel="stylesheet">
<script type="text/javascript" src="<?=base_url('assets/plugins/kendo/kendo.all.min.js')?>"></script>
<?php endif?>
<link rel="stylesheet" href="<?=base_url('assets/css/fcustom.css')?>">
</head>
<body>
    <div id="container" class="question-box effect7">