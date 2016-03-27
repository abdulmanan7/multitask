
<div id="grid"></div>
<script type="text/x-kendo-template" id="Searchtemplate">
  <div class="toolbar">
    <div class="pull-left">
      <a data-toggle="modal" href="<?=base_url('reports')?>" type="button" class="btn btn-warning pull-right" target="_black">Add Neu</a>
    </div>
    <div id="example" class="srach_clear pull-right" >
      <div class="input-group" style="width:100%;" id="ext-gen3">
        <div class="x-form-field-wrap x-form-field-trigger-wrap x-trigger-wrap-focus" id="ext-gen4">
          <input autocomplete="off" type="text" id="userSearch" name="userSearch" class="form-control x-form-text x-form-field x-form-focus searching" placeholder="Search username...">
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
      // var url="<?php echo base_url('users')?>";
      list();
    });
    function list(){
      $("#grid").kendoGrid({
        dataSource: {
          transport: {
            read: {
              url:"<?php echo base_url('welcome/listing')?>",
              dataType: "json"
            },
            serverPaging: true,pageSize: 5,serverSorting: true,
          },
          schema: { data: "data", total: "total" },
          pageSize: 10
        },
        groupable: true,
        sortable: true,
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
  width:120,
},{
  field: "vorname",
  title: "Vorname",
  width:60,
},{
  field: "nachname",
  title: "Nachname",
  width:50,
},{
  field: "strabe_nr",
  title: "Straße",
  width:50,
},{
  field: "PLZ",
  title:"PLZ",
  width:40,
},{
  field: "ort",
  title:"Ort",
  width:40,
},{
  field: "land",
  title:"Land",
  width:50,
},{
  field: "email",
  title:"eMail",
  width:100,
},{
  field: "bauobjektadress",
  title:"Objektadresse",
  template:"<a target='_blank' href='http://maps.google.com/?q=#=bauobjektadress#'>#=bauobjektadress#</a>",
  width:100,
},{
  field: "telefon",
  title:"Telefon",
  width:80,
},
{
  title: "Operation",
  width:120,
  template:'<a href="<?=base_url()?>reports/get/#=att_id#" target="_black" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a> || <a href="<?=base_url()?>reports/delete/#=att_id#" class="btn btn-sm btn-danger del"><i class="fa fa-trash-o"></i></a>',
}
],
});
    }
    $(document).on("keyup", "#grid .k-header .toolbar .searching", function(){

      var selecteditem =  $.trim($(this).val()).toUpperCase();
  var kgrid =   $('#grid').data("kendoGrid");//$(this).closest('.orders1').html("");
  selecteditem = selecteditem.toUpperCase(); //;console.log(selecteditem);
  if(selecteditem=="")
    selecteditem="aends";
  $('#grid').data("kendoGrid").destroy();
  var currentdate = new Date();
  $("#grid").kendoGrid({
    dataSource: {
      transport: {
        read: {
          url: "<?=base_url('welcome/listing')?>/"+selecteditem+"/"+currentdate.getSeconds(),
          dataType: "json"
        },
      },
      schema: { data: "data", total: "total" },
          pageSize: 10
        },
        groupable: true,
        sortable: true,
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
  width:120,
},{
  field: "vorname",
  title: "Vorname",
  width:60,
},{
  field: "nachname",
  title: "Nachname",
  width:50,
},{
  field: "strabe_nr",
  title: "Straße",
  width:50,
},{
  field: "PLZ",
  title:"PLZ",
  width:40,
},{
  field: "ort",
  title:"Ort",
  width:40,
},{
  field: "land",
  title:"Land",
  width:50,
},{
  field: "email",
  title:"eMail",
  width:100,
},{
  field: "bauobjektadress",
  title:"Objektadresse",
  template:"<a target='_blank' href='http://maps.google.com/?q=#=bauobjektadress#'>#=bauobjektadress#</a>",
  width:100,
},{
  field: "telefon",
  title:"Telefon",
  width:80,
},
{
  title: "Operation",
  width:120,
  template:'<a href="<?=base_url()?>reports/get/#=att_id#" target="_black" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a> || <a href="<?=base_url()?>reports/delete/#=att_id#" class="btn btn-sm btn-danger del"><i class="fa fa-trash-o"></i></a>',
}
],
});
});
</script>