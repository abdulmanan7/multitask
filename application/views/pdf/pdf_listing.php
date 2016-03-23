<?php $this->load->view('template/header');?>
<style type="text/css">
  #grid > .k-grid-header {
    padding-right: 0px !important;
  }
  #grid > .k-grid-content {
    height: auto !important;
  }
  #grid > .k-grouping-header {
    display: none;
  }
  #userSearch {
    height:40px ;
    width: 270px !important;
  }
  #searchclear {
    min-height: 34px;
    padding-top: 2px;
  }
  #grid .k-grid-content table tbody tr td{
    cursor:pointer;
  }
  .btn {
    display: inline-block;
    padding: 9px 10px;
     margin-bottom: 0;
  }
  .k-pager-wrap .k-icon{
    margin-top: 6px;
  }
</style>
<h1>Atteachments list</h1>
<div id="body">
<div id="grid"></div>
<script type="text/x-kendo-template" id="Searchtemplate">
  <div class="toolbar">
    <div class="pull-left">
      <a data-toggle="modal" href="<?=base_url('reports')?>" type="button" class="btn btn-primary pull-right" target="_black">Add New</a>
    </div>
    <div id="example" class="srach_clear pull-right" >
      <div class="input-group " style="width:100%;" id="ext-gen3">
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
  // toolbar: [
  //         {
  //            name: "Add",
  //            text: "Send Email",
  //            click: function(e){alert('Send Emails'); return false;}
  //         }
  //        ],
  pageable: {
    refresh: true,
    pageSizes: [10 ,50 ,100,250],
    buttonCount: 5
  },
  columns: [{hidden: true, field: "id",menu:false
},{
  field: "anfragedatum",
  title: "Anfragedatum",
  width:80,
},{
  field: "vorname",
  title: "Vorname",
  width:60,
},{
  field: "nachname",
  title: "Nachname",
  width:50,
},{
  field: "Strasse",
  title: "strabe_nr",
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
  field: "telefon",
  title:"Telefon",
  width:80,
}/*,
{
  title: "Operation",
  width:120,
  template:'<a class="updateStatus btn btn-warning" id="btnEdit"><i class="fa fa-edit"></i> Update</a><a class="btn btn-info" href=<?=base_url()?>/users/with_details/#=id#/><i class="fa fa-eye"></i>Full Detail</a><a class="btn btn-success" id="btnPost"><i class="fa fa-plus"></i> Add Post</a><a class="btn btn-danger" id="btnDeactivate"><i class="fa fa-plus"></i> Deactivate</a>',
}*/
],
detailTemplate: kendo.template($("#atteachment").html()),
detailInit: listAtteachments
// dataBound: function(res) {
//   $("#grid .k-grid-content table tbody tr").each(function(index, element) {
//     var status = $(this).find('td:first').next().html();
//     if(status == 1)
//     {
//       $(this).css({
//         color: '#fff',
//         background: '#8D8E8B'
//       });
//     }
//   });
//   this.expandRow(this.tbody.find("tr.k-master-row").first());
// }
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
   columns: [{hidden: true, field: "id",menu:false
},{
  field: "anfragedatum",
  title: "Anfragedatum",
  width:100,
},{
  field: "vorname",
  title: "Vorname",
  width:100,
},{
  field: "nachname",
  title: "Nachname",
  width:50,
},{
  field: "Strasse",
  title: "strabe_nr",
  width:40,
},{
  field: "PLZ",
  title:"PLZ",
  width:20,
},{
  field: "ort",
  title:"Ort",
  width:20,
},{
  field: "land",
  title:"Land",
  width:50,
},{
  field: "email",
  title:"eMail",
  width:100,
},{
  field: "telefon",
  title:"Telefon",
  width:100,
}/*,
{
  title: "Operation",
  width:120,
  template:'<a class="updateStatus btn btn-warning" id="btnEdit"><i class="fa fa-edit"></i> Update</a><a class="btn btn-info" href=<?=base_url()?>/users/with_details/#=id#/><i class="fa fa-eye"></i>Full Detail</a><a class="btn btn-success" id="btnPost"><i class="fa fa-plus"></i> Add Post</a><a class="btn btn-danger" id="btnDeactivate"><i class="fa fa-plus"></i> Deactivate</a>',
}*/
]
});
});
    function courseWise(e) {
    var detailRow = e.detailRow;
    var courseUrl = "<?=base_url('examination/result/course_wise');?>/";
    var exam_id=e.data.exam_id;
// var course_id=e.data.course_id;
var classResult = new kendo.data.DataSource({
  transport: {
    read: {
      async: true,
      url: courseUrl+exam_id+"/"+getRandomInt(),
      dataType: "json"
    }
  },
// schema: { data: "data", total: "total" }
});
detailRow.find(".courseWise").kendoGrid({
  dataSource: classResult,
  columns: [
  {hidden: true, field: "course_id" },
  {hidden: true, field: "exam_id" },
  {hidden: true, field: "exam_taken_id" },
// {field: "course_id", title: "course"},
{field: "name", title: "Courses"},
{template:kendo.template($("#tplCactions").html()), title: "Actions",width:160},
],mobile: true,
detailExpand: function(e) {
  this.collapseRow(this.tbody.find('tr.k-master-row').not(e.masterRow));
},
});
}
  </script>
  </div>
</body>
</html>