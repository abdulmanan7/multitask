
    <?php if (isset($sub_page_tab) && $sub_page_tab == 'Courses'): ?>
      <script type="text/javascript" src="<?php //echo load_plugin('bs_select/dist/js/bootstrap-multiselect.js');?>"></script>
      <script type="text/javascript" src="<?php //echo load_plugin('bs_select/dist/js/bootstrap-multiselect-collapsible-groups.js');?>"></script>
      <script type="text/javascript">
        // $(document).ready(function() {
        //   $('#multi_select').multiselect({
        //    includeSelectAllOption: true,
        //    buttonWidth: '209px',
        //    dropRight: true
        //  });
        // });//jQuery(document).ready(function($) {
        </script>
      <?php endif?>
<?php if (isset($country_field) && $country_field == true): ?>
        <script type= "text/javascript" src="<?php echo load_js('countries.js')?>"></script>
        <script type="text/javascript">
         jQuery(document).ready(function($) {
          populateCountries("country", "state");
<?php if ($sub_page == 'Update' && $page_title == 'Employees'): ?>
          $('#country').val("<?php echo $emp['country']?>");
<?php endif;?>
<?php if ($sub_page == 'View' && $page_title == "Students"): ?>
        $('#country').val("<?php echo $student['country']?>");
<?php endif;?>
        });
        </script>
<?php endif;?>
      <?php if (isset($upload_field) && $upload_field == true): ?>
        <script src="<?php echo load_plugin('file_input/js/fileinput.js');?>" type="text/javascript"></script>
        <script src="<?php echo load_plugin('file_input/js/fileinput_locale_es.js')?>" type="text/javascript"></script>
        <script type="text/javascript">
         jQuery(document).ready(function($) {

          var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
          'onclick="alert(\'Upload Avatar Photo or picture if any.\')">' +
          '<i class="glyphicon glyphicon-tag"></i>' +
          '</button>';
          $("#avatar").fileinput({
            language: "es",
            overwriteInitial: true,
            maxFileSize: 1000,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i> Upload',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="<?php echo load_img('profile.png')?>" alt="Avatar" style="width:197px">',
            layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
          });
        });
      $(document).ready(function() {
  $('#change_shift').on('show.bs.modal', function (e) {
  course_id = $(e.relatedTarget).data('id');
$.ajax({
    type: "POST",
    url: '<?php echo base_url("ajax/get_shifts?all=yes");?>',
    data: { 'course_id': course_id },
    success: function(data){
        var opts = $.parseJSON(data);
        $('#shift_id').append('<option value="">Specify shift</option>');
        $.each(opts, function(i, d) {
            $('#change_shift_id').append('<option value="' + d.id + '">' + d.title + '</option>');
        });
    }
  });

});
$('#change_section').on('show.bs.modal', function (e) {
  course_id = $('#sec_course_id').val();
  shift_id = $('#sec_shift_id').val();
 $.ajax({
    type: "POST",
    url: '<?php echo base_url("ajax/get_sections?just_section=yes");?>',
    data: { 'shift_id': shift_id,'course_id':course_id },
    success: function(data){
        var opts = $.parseJSON(data);
        $.each(opts, function(i, d) {
            $('#change_section_id').append('<option value="' + d.section_id + '">' + d.title + '</option>');
        });
      }
  });

});
  $('body').on('change focus', '#change_shift_id', function(event) {
  $('#shift_section_id').empty();
  var shift_id=$('#change_shift_id').val();
  if (shift_id=='') {
    return false;
  }
 $.ajax({
    type: "POST",
    url: '<?php echo base_url("ajax/get_sections?just_section=yes");?>',
    data: { 'shift_id': $('#change_shift_id').val(),'course_id':$('#shift_course_id').val() },
    success: function(data){
        var opts = $.parseJSON(data);
         $('#shift_section_id').append('<option value="">Select section</option>');
        $.each(opts, function(i, d) {
            $('#shift_section_id').append('<option value="' + d.section_id + '">' + d.title + '</option>');
        });
      }
  });
});
});
      </script>
    <?php endif?>

    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Top', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });

      //Tooltip
      $('a').tooltip('hide');
      $('i').tooltip('hide');

      //Tiny Scrollbar
      $('#scrollbar').tinyscrollbar();
      $('#scrollbar-one').tinyscrollbar();
      $('#scrollbar-two').tinyscrollbar();
      $('#scrollbar-three').tinyscrollbar();
  //Add Dynamic Row
  // $('body').on('click', '#addmore', function(event) {
  //   var cloneRow = $('.section').clone();
  //   cloneRow.find("input").val("").end();
  //       // cloneRow.find(".close").remove();
  //       cloneRow.find(".section").removeClass('section');
  //       cloneRow.appendTo('#table_body');
  //       event.preventDefault();
  //       return false;
  //     });
  function add_another() {
    var cloneRow = $('table>tbody>tr:first-child').clone();
    cloneRow.find("input").val("").end();
        // cloneRow.find(".close").remove();
        cloneRow.appendTo('#table_body');
      }
      <?php if ($page_title == 'Students'): ?>
    <?php endif?>
  </script>