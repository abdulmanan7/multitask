 </div>
        <!-- Dashboard Wrapper End -->

        <footer>
          <p>© Eckool 2015-16</p>
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
                            //Data Tables
                          //   $('.dtable').dataTable({
                          //     "sPaginationType": "full_numbers",
                          //     'iDisplayLength': 10
                          //   });
                          //   var records=$('.paginate_active').html();
                          //   if (parseInt(records)<10 || records=="undefined") {
                          //     $('.paginate_active').css('display', 'none');
                          //     $('#data-table_filter').css('display', 'none');
                          //   };
                          // });
          </script>
    <?php endif?>
<script type="text/javascript">
// jQuery(document).ready(function($) {
//   ajaxHelper.init({
//     url:"<?php echo base_url('ajax/add_fee');?>",
//   });
// });
 // Ext.onReady(function(){
 //    var searchData = new Ext.data.JsonStore({
 //    paramsAsHash: true,
 //    // root: "data",
 //    url: "<?php echo base_url('studnets/search');?>",
 //    idProperty: "student_id",
 //    totalProperty: "totalCount",
 //    //paramOrder: ["start", "limit", "query", "cus_id"],
 //    fields: ["first_name","last_name","course","section"]
 //    });

 //    var pref = new Ext.form.ComboBox({
 //      store: searchData,
 //      displayField: "first_name",
 //      valueField: "student_id",
 //      typeAhead: false,
 //      name: "first_name",
 //      fieldLabel: "Studnet ID #",
 //      loadingText: "Searching...",
 //      allowSearchMinChars: 3,
 //      selectOnFocus: false,
 //      forceSelection: false,
 //      validateOnBlur: false,
 //      anchor: "100%",
 //      pageSize: 7,
 //      minChars: 3,
 //      width:260,
 //      itemSelector: "div.search-item",
 //      hideTrigger: true,

 //       tpl: new Ext.XTemplate('<tpl for="."><div class="search-item">',  "<B>Name #: </B>{first_name} {last_name} <B> Course # : </B> {course}<br/>", "<B>section : </B>{section}<br/></tpl>"),
 //      applyTo: 'gSearch', //input field ID
 //      onSelect: function(fields){
 //      // override default onSelect to do redirect
 //          // if(fields.data.UNIT_PREFERRED_NUMBER == 'null' || fields.data.UNIT_PREFERRED_NUMBER == null)
 //          //  $("#gSearch").val(fields.data.RTMI_NUMBER);
 //          // else
 //          //  $("#gSearch").val(fields.data.UNIT_PREFERRED_NUMBER);
 //          // $("#rtmi_number").val(fields.data.RTMI_NUMBER);
 //          // $("#masagr_id").val(fields.data.MASAGR_ID);
 //          // $("#agrsta_id").val(fields.data.AGRSTA_ID);
 //          // update_rtmi();
 //          // this.collapse();
 //        }
 //    });

 //  widths();
 //  });

</script>
  </body>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/default.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:54:23 GMT -->
</html>