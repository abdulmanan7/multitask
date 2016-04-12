
<div id="grid"></div>
<script type="text/x-kendo-template" id="Searchtemplate">
  <div class="toolbar">
    <!-- <div class="pull-left">
      <a data-toggle="modal" href="<?=base_url('angebote')?>" type="button" class="btn btn-success pull-right" target="_black">Neue Fotobegehung anlegen</a>
    </div> -->
    <div id="example" class="srach_clear pull-right" >
      <div class="input-group" style="width:100%;" id="ext-gen3">
        <div class="x-form-field-wrap x-form-field-trigger-wrap x-trigger-wrap-focus" id="ext-gen4">
          <input autocomplete="off" type="text" id="userSearch" name="userSearch" class="form-control x-form-text x-form-field x-form-focus searching" placeholder="Suche Name, eMail oder PLZ">
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
              url:"<?php echo base_url('angebote/listing')?>",
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
        columns: [{hidden: true, field: "id",menu:false
      },{
        field: "date",
        title: "Anfragedatum",
        width:"94px",
      },{
        field: "offer_id",
        title: "Angebotsnr",
        width:"94px",
      },{
        field: "client_name",
        title: "Name",
        width:"73px",
      },{
        field: "street",
        title: "Straße",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=street#'>#=street#</a>",
        width:"95px",
      },{
        field: "plz",
        title:"PLZ",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=plz#'>#=plz#</a>",
        width:"90px",
      },{
        field: "city",
        title:"Ort",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=city#'>#=city#</a>",
        width:"95px",
      },{
        field: "mail",
        title:"eMail",
        width:"144px",
      },{
        field: "phone",
        title:"Telefon",
        width:"79px",
      },
      {
        title: "Dokument",
        width:"50px",
        template:'<a href="https://www.solarvent.de/kalkulator-angebot/offers/#=offer_id#.pdf" target="_black" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>',
        attributes:{class:"text-center"}
      },
      {
        title: "Löschen",
        width:"60px",
        template:'<a href="<?=base_url()?>angebote/delete/#=id#" class="text-center btn btn-sm btn-danger del"><i class="fa fa-trash-o"></i></a>',
        attributes:{class:"text-center"}
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
            url: "<?=base_url('angebote/listing')?>/"+selecteditem+"/"+currentdate.getSeconds(),
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
        columns: [{hidden: true, field: "id",menu:false
      },{
        field: "date",
        title: "Anfragedatum",
        width:"94px",
      },{
        field: "offer_id",
        title: "Angebotsnr",
        width:"94px",
      },{
        field: "client_name",
        title: "Name",
        width:"73px",
      },{
        field: "street",
        title: "Straße",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=street#'>#=street#</a>",
        width:"95px",
      },{
        field: "plz",
        title:"PLZ",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=plz#'>#=plz#</a>",
        width:"90px",
      },{
        field: "city",
        title:"Ort",
        template:"<a target='_blank' href='http://maps.google.com/?q=#=city#'>#=city#</a>",
        width:"95px",
      },{
        field: "mail",
        title:"eMail",
        width:"144px",
      },{
        field: "phone",
        title:"Telefon",
        width:"79px",
      },
      {
        title: "Dokument",
        width:"50px",
        template:'<a href="https://www.solarvent.de/kalkulator-angebot/offers/#=offer_id#.pdf" target="_black" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>',
        attributes:{class:"text-center"}
      },
      {
        title: "Löschen",
        width:"60px",
        template:'<a href="<?=base_url()?>angebote/delete/#=id#" class="btn btn-sm btn-danger text-center del"><i class="fa fa-trash-o"></i></a>',
        attributes:{class:"text-center"}
      }
      ],
  });
  }, 400 );
});
  </script>