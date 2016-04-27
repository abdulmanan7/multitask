<!DOCTYPE html>
<html>
<head>
    <title>SOLARvent - <?php echo $page_title;?></title>
    <meta charset="UTF-8" />
    <meta name="author" content="abdulmanan" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>">

    <link href="<?php echo load_css('bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo load_css('new.css');?>" rel="stylesheet">

   <!-- Datepicker CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo load_css('datepicker.css')?>"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo load_css('alertify.core.css')?>">

    <link href="<?php echo load_fonts('font-awesome.min.css');?>" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <!-- <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','<?=load_js("google-api.js")?>','ga');
      ga('create', 'UA-40304444-1', 'iamsrinu.com');
      ga('send', 'pageview');

    </script> -->

    <link href="<?php echo load_plugin('kendo/kendo.default.min.css');?>" rel="stylesheet">
    <link href="<?php echo load_plugin('kendo/kendo.common.min.css');?>" rel="stylesheet">
  <link href="<?php echo load_css('style.css')?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo load_plugin('kendo/kendo.all.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo load_plugin('kendo/default/kendo.de-DE.js')?>"></script>
  <script>
  var module="<?php echo $this->router->fetch_class()?>";
  var method="<?php echo $this->router->fetch_method()?>";
  var base_url = "<?=base_url();?>";
  function baseUrl(url) {
    return base_url+url;
  }
   var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
var ajaxHelper = {
  config:{
    formId:$('#form'),
    status:1,
    formDel:$('.delete'),
    fetchURL:'',
    getTerm:'',
    messageDiv:$('#message'),
    ajaxType:'json',
    url:null,
    request:'POST',
    // formSubmit:$('#submit'),
    // formData:formId.serializeArray(),
  },
  init:function( config ){
    $.extend(this.config, config);
    this.bindEvents();
    return this;
  },
  bindEvents:function(){
    // this.config.formId.on('submit', this.submitData);
    this.config.formDel.on('click', this.delRequest);
    // console.log(this.config.formId.attr('action'));
  },
  submitForm:function(){
    var self = ajaxHelper;
    var url = (url != null)?url:self.config.formId.attr('action');
    var promise = $.ajax({
      url: url,
      type: self.config.request,
      dataType: self.config.ajaxType,
      data: self.config.serialize(),
    });
    return promise;
  },
  postData:function(){
    var result = this.submitForm();
    result.done(function(response){
      self.config.messageDiv.append(response);
    });
  },
  fetch:function(url){
    var self = this;
    url = url || self.config.fetchURL;
    var promise = $.ajax({
      url: url,
      type: self.config.request,
      dataType: self.config.ajaxType,
      data: self.config.getTerm,
    });
    return promise;
  },
  submitData:function(url,pData){
   var self=ajaxHelper;
   return $.ajax({
    url: url || self.config.formId.attr('action'),
    type: 'POST',
    dataType: self.config.Ajaxtype,
    data: pData || self.config.formId.serialize(),
    success:function(response){
      self.feedback(response);
    }
  });
    e.preventDefault();
 },
 get_data:function(){
  var response = this.fetch();
  var result = response.done(function(data) {
    return data;
  });
  return result;
 },
 feedback:function(res){
     var self=ajaxHelper;
     if (self.config.Ajaxtype == "json") {
       var result = $.parseJSON(res);
      if (result.status > 0) {
         showMessage(result.message,'success','Success');
      }else{
         showMessage(result.message,'error','Failer');
      }
    }else{
      self.config.messageDiv.appendTo(res);
    };
  },
  delRequest:function(){
    var self=ajaxHelper;
    var deleteButton=self.config.formDel;
    var row=deleteButton.parents('tr');
    var loc = deleteButton.attr('href');
    alertify.confirm("Are you sure you want to delete?", function (e) {
      if (e) {
        alertify.success("Delete Request Processing...");
        $.ajax({
          url:loc,
          success: function(data){
            var result=$.parseJSON(data);
            self.feedback(result);
            if (result.status>0) {
              row.remove();
            };
          }
        });
      } else {
        alertify.error("You've just Cancel Delete request!");
        return false;
      }
    });
    return false;
  },
};
  </script>
  </head>

  <body>

    <!-- Header Start -->
    <header>
      <a href="<?php echo base_url('dashboard');?>" class="logo">
        <img src="<?php echo base_url('assets/img/logo.jpg')?>" alt="Logo"/>
      </a>
      <div class="pull-right">
        <ul id="mini-nav" class="clearfix">
          <li class="list-box user-profile">
            <a id="drop7" href="#" role="button" class="dropdown-toggle user-avtar" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/img/profile.png')?>" alt="Bluemoon User">
            </a>
            <ul class="dropdown-menu server-activity">
              <li>
                <p>
                <i class="fa fa-cog text-info"></i> <?php echo $this->ion_auth->login_user();?>
                </p>
              </li>
              <li>
                <p><a href="<?php echo base_url('auth/logout');?>" style="padding:5px 10px;" class="btn btn-danger pull-right">
                    <i class="fa fa-power-off text-danger" style="margin:0 5px;"></i>
                  </a></p>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <!-- Header End -->
    <!-- <div id="loader" class="fade in">
      <p class="img"><img src="<?php echo load_img('loader.gif');?>"></p>
    </div> -->
    <div id="ajaxLoader" class="fade in" style="display: none;">
      <p class="img"><img src="<?php echo load_img('ajax-loader.gif');?>"></p>
    </div>