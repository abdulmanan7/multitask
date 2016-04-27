 </div>
        <!-- Dashboard Wrapper End -->

        <footer>
          <p>© SOLARvent 2015-16</p>
        </footer>

      </div>
    </div>
    <!-- Main Container end -->

<script type="text/javascript" src="<?php echo load_js('jquery-ui-v1.10.3.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.scrollUp.js')?>"></script>


<?php if ($page_title == "Dashboard"): ?>

     <script src="<?php echo load_js('justgage/justgage.js')?>"></script>
    <script src="<?php echo load_js('justgage/raphael.2.1.0.min.js')?>"></script>

    <!-- Flot Charts -->
    <script src="<?php echo load_js('flot/jquery.flot.js')?>"></script>
    <script src="<?php echo load_js('flot/jquery.flot.orderBar.min.js')?>"></script>
    <script src="<?php echo load_js('flot/jquery.flot.stack.min.js')?>"></script>
    <script src="<?php echo load_js('flot/jquery.flot.pie.min.js')?>"></script>
    <script src="<?php echo load_js('flot/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo load_js('flot/jquery.flot.resize.min.js')?>"></script>
     <script src="<?php echo load_js('flot/custom/area.js')?>"></script>
        <!-- Sparkline graphs -->
    <script src="<?php echo load_js('sparkline.js')?>"></script>
    <script src="<?php echo load_js('dashboard.js')?>"></script>
<?php endif?>


    <!-- Tiny Scrollbar JS -->
    <script src="<?php echo base_url('assets/js/tiny-scrollbar.js')?>"></script>
    <!-- <script src="<?php //echo base_url('assets/plugins/kendo/ext-base.js')?>"></script> -->
    <!-- <script src="<?php //echo base_url('assets/plugins/kendo/ext-all.js')?>"></script> -->

    <!-- Custom JS -->
    <script src="<?php echo base_url('assets/js/modernizr.js')?>"></script>
    <script src="<?php echo base_url('assets/js/menu.js')?>"></script>
    <?php if (isset($page_title) && $page_title == 'Extras'): ?>
    <script src="<?php echo base_url('assets/js/pricing.js')?>"></script>
    <?php endif?>
  <script type="text/javascript" src="<?php echo load_js('bootstrap-datepicker.js')?>"></script>
  <script type="text/javascript" src="<?php echo load_js('alertify.min.js');?>"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="<?=load_plugin('notify/pnotify.core.js')?>"></script>
  <!-- <script type="text/javascript" src="<?php //echo load_plugin('parsley/parsley.min.js');?>"></script> -->
  <?php $this->load->view('template/script');?>
  <?php $this->load->view('template/ajax_script');?>
  <script type="text/javascript" src="<?php echo load_js('custom.js')?>"></script>

    <?php if (isset($dtable_required) && $dtable_required == true): ?>
          <!-- <script type="text/javascript" src="<?php echo load_js('jquery.dataTables.js')?>"></script> -->
          <script type="text/javascript">
            jQuery(document).ready(function($) {
               $('.dtable').kendoGrid({
  // groupable:true,
pageable: {
        refresh: true,
        pageSize: 6,
        pageSizes:true,
        buttonCount:5
                },
  title:"Listing"
  // searchable:true

 });
 });
          </script>
    <?php endif?>
<script type="text/javascript">
 jQuery(document).ready(function($) {
   $('#loader').css('display','hide');
   $('#ajaxLoader').css('display','none');
 });
</script>
  </body>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/default.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:23 GMT -->
</html>