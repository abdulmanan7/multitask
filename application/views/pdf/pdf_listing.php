<div id="grid"></div>
<script type="text/x-kendo-template" id="Searchtemplate">
  <div class="toolbar">
    <div class="pull-left">
      <a data-toggle="modal" href="<?=base_url('fotobegehung')?>" type="button" class="btn btn-success pull-right" target="_black">Neue Fotobegehung anlegen</a>
    </div>
    <div id="example" class="srach_clear pull-right" >
      <div class="input-group" style="width:100%;" id="ext-gen3">
        <div class="x-form-field-wrap x-form-field-trigger-wrap x-trigger-wrap-focus" id="ext-gen4">
          <input autocomplete="off" type="text" id="userSearch" name="userSearch" class="form-control x-form-text x-form-field x-form-focus searching" placeholder="Suche nach Name, eMail oder PLZ">
        </div>
      </div>
    </div>
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      list();
    });
    $(document).on('click','.clear', function(){
      $('.searching').val('');
      list();
    });
    function list(){
      $("#grid").kendoGrid({
        dataSource: {
          transport: {
            read: {
              url:"<?php echo base_url('planung/listing')?>",
              dataType: "json"
            },
            serverPaging: true,pageSize: 5,serverSorting: true,
          },
          schema: { data: "data", total: "total" },
          pageSize: 10
        },
        groupable: true,
        sortable: true,
        resizable: true,
        filterable: true,
        columnMenu: true,
        toolbar: kendo.template($("#Searchtemplate").html()),
        pageable: {
          refresh: true,
          pageSizes: [10 ,50 ,100,250],
          buttonCount: 5
        },
        columns: [{hidden: true, field: "att_id",menu:false
      },{
        field: "anfragedatum",
        title: "Anfragedatum",
        width:"94px",
      },{
        field: "vorname",
        title: "Vorname",
        width:"73px",
      },{
        field: "nachname",
        title: "Nachname",
        width:"80px",
      },{
        field: "strabe_nr",
        title: "Straße",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=strabe_nr#,#=PLZ#,#=ort#,#=land#'><i class='fa fa-map-marker'></i> #=strabe_nr#</a>",
        width:"95px",
      },{
        field: "PLZ",
        title:"PLZ",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=strabe_nr#,#=PLZ#,#=ort#,#=land#'>#=PLZ#</a>",
        width:"90px",
      },{
        field: "ort",
        title:"Ort",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=strabe_nr#,#=PLZ#,#=ort#,#=land#'>#=ort#</a>",
        width:"95px",
      },{
        field: "land",
        title:"Land",
        width:"80px",
      },{
        field: "email",
        title:"eMail",
        width:"144px",
      },{
        field: "bauobjektadress",
        title:"Objektadresse",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=bauobjektadress#,#=land#'><i class='fa fa-map-marker'></i> #=bauobjektadress#</a>",
        width:"100px",
      },{
        field: "telefon",
        title:"Telefon",
        width:"79px",
      },
      {
        title: "Dokument",
        width:"42px",
        template:'<a href="<?=base_url('uploads/docs/')?>/#=vorname##=att_id#.pdf" target="_black" class="btn btn-sm btn-success pdfLink"><i class="fa fa-download"></i></a>',
      },{
        title: "Löschen",
        width:"40px",
        template:'<a href="<?=base_url()?>fotobegehung/delete/#=att_id#" class="btn btn-sm btn-danger del"><i class="fa fa-trash-o"></i></a>',
      }
      ],
    });
    }
    $(document).on("keyup", "#grid .k-header .toolbar .searching",function(){
      var selecteditem =  $.trim($(this).val());
  var kgrid =   $('#grid').data("kendoGrid");//$(this).closest('.orders1').html("");
  if(selecteditem=="")
    selecteditem="aends";
  delay(function(){
    $('#grid').data("kendoGrid").destroy();
    var currentdate = new Date();
    $("#grid").kendoGrid({
      dataSource: {
        transport: {
          read: {
            url: "<?=base_url('planung/listing')?>/"+selecteditem+"/"+currentdate.getSeconds(),
            dataType: "json"
          },
        },
           schema: { data: "data", total: "total" },
          pageSize: 10
        },
        groupable: true,
        sortable: true,
        resizable: true,
        filterable: true,
        columnMenu: true,
        toolbar: kendo.template($("#Searchtemplate").html()),
        pageable: {
          refresh: true,
          pageSizes: [10 ,50 ,100,250],
          buttonCount: 5
        },
        columns: [{hidden: true, field: "att_id",menu:false
      },{
        field: "anfragedatum",
        title: "Anfragedatum",
        width:"94px",
      },{
        field: "vorname",
        title: "Vorname",
        width:"73px",
      },{
        field: "nachname",
        title: "Nachname",
        width:"80px",
      },{
        field: "strabe_nr",
        title: "Straße",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=strabe_nr#,#=PLZ#,#=ort#,#=land#'><i class='fa fa-map-marker'></i> #=strabe_nr#</a>",
        width:"95px",
      },{
        field: "PLZ",
        title:"PLZ",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=strabe_nr#,#=PLZ#,#=ort#,#=land#'>#=PLZ#</a>",
        width:"90px",
      },{
        field: "ort",
        title:"Ort",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=strabe_nr#,#=PLZ#,#=ort#,#=land#'>#=ort#</a>",
        width:"95px",
      },{
        field: "land",
        title:"Land",
        width:"80px",
      },{
        field: "email",
        title:"eMail",
        width:"144px",
      },{
        field: "bauobjektadress",
        title:"Objektadresse",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=bauobjektadress#,#=land#'><i class='fa fa-map-marker'></i> #=bauobjektadress#</a>",
        width:"100px",
      },{
        field: "telefon",
        title:"Telefon",
        width:"79px",
      },
      {
        title: "Dokument",
        width:"40px",
        template:'<a href="<?=base_url()?>fotobegehung/get/#=att_id#" target="_black" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>',
      },{
        title: "Löschen",
        width:"40px",
        template:'<a href="<?=base_url()?>fotobegehung/delete/#=att_id#" class="btn btn-sm btn-danger del"><i class="fa fa-trash-o"></i></a>',
      }
      ],
  });
  }, 400 );
});
$(document).on("click", ".pdfLink", function(e)
{
 var createUrl = $(this).attr('href');
 var win = window.open(createUrl, '_blank'); 
 if(win){
    //Browser has allowed it to be opened
    win.focus();
  }else{
    //Broswer has blocked it
    alert('Please allow popups for this site');
  }
});//end dbclick
  </script>