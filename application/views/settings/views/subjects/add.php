<!-- Left Sidebar Start -->
<!-- <div class="left-sidebar"> -->
<!-- Row Start -->
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <span class="panel-title">Adding Subjects</span>
      </div>
      <div class="panel-body">
      <!-- <div id="example">
    <div class="demo-section k-content wide">
        <div>
            <h4>Add or update a record</h4>
            <div data-role="grid"
                 date-scrollable="true"
                 data-editable="true"
                 data-toolbar="['save']"
                 data-columns='[
                                  {field: "name", title: "Name"},
                                  {field: "code", title: "Code"},
                                  {field: "credit_hour", title: "Credit Hour"},
                                  {field: "total_grade", title: "Maximum Marks"},
                                  {field: "passing_grade", title: "Passing Marks"},
                                  {command: ["destroy"], title: "&nbsp;", width: "250px"},
                              ]'
                 data-bind="source: subjects,
                            visible: isVisible,
                            events: {
                              save: onSave
                            }"
                 style="height: 200px"></div>
        </div>
    </div>
    </div> -->
    <div class="form-group col-sm-3" style="padding-left: 4px;">
            <label for="">Course</label>
            <select name="course_id" id="course_id" name="course_id" class="form-control input-sm" required="required">
              <option value="">Select Course</option>
              <?php foreach ($courses as $course): ?>
              <option value="<?php echo $course['course_id']?>"><?php echo $course['name']?></option>
              <?php endforeach?>
            </select>
    </div>
          <div id="existing_subs" style="clear:both;"></div>
        <!-- <div class="col-sm-4"> -->
       <!--  <form action="<?php echo base_url('settings/subjects/add');?>" method="POST" role="form" id="form">
          <div class="form-group col-sm-3" style="padding-left: 4px;">
            <label for="">Course</label>
          </div>
          <table class="table table-condensed no-margin">
            <thead>
              <tr>
                <th>Teacher*</th>
                <th>Name*</th>
                <th>Code</th>
                <th>Credit hour*</th>
                <th>Maximum Marks*</th>
                <th>Passing Marks*</th>
              </tr>
            </thead>
            <tbody id="table_body">
              <tr class="section">
                <td>
                  <select name="emp_id[]" class="form-control input-sm" id="emp_id" required="required">
                    <?php foreach ($heads as $head): ?>
                    <option value="<?php echo $head['employee_id']?>">
                      <?php echo $head['first_name']?> <?php echo $head['last_name']?> | <b><?php echo $head['job_title']?></b>
                    </option>
                    <?php endforeach?>
                  </select>
                </td>
                <td>
                  <input type="text" class="form-control" id="name" name="name[]" placeholder="Enter fee title">
                </td>
                <td>
                  <input type="text" class="form-control" id="code" name="code[]" placeholder="Enter Code">
                </td>
                <td>
                  <input type="text" class="form-control" id="credit_hour" name="credit_hour[]" placeholder="Enter Credit hour">
                </td>
                <td>
                  <input type="text" class="form-control" id="total_grade" name="total_grade[]" placeholder="Enter Maximum Grade">
                </td>
                <td>
                  <input type="text" class="form-control" id="passing_grade" name="passing_grade[]" placeholder="Enter Passing Grade %">
                </td>
              </tr>
            </tbody>
          </table>
          <a id="addmore" class="btn btn-success pull-right btn-sm" onclick="add_another()">Add Another</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </form> -->
      </div>
    </div>
  </div>
</div>
<!-- </div> -->
<!-- </div> -->
<script type="text/x-kendo-template" id="tplactions">
<a href="<?=base_url('settings/subjects/update/');?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
<a href="<?=base_url('settings/subjects/detete/');?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
</script>
<script type="text/x-kendo-template" id="tplemp">
<select name="emp_id" style="width:inherit;height:inherit;" class="form-control input-sm" required="required">
                    <?php foreach ($heads as $head): ?>
                    <option value="<?php echo $head['employee_id']?>">
                      <?php echo $head['first_name']?> <?php echo $head['last_name']?> | <b><?php echo $head['job_title']?></b>
                    </option>
                    <?php endforeach?>
                  </select>
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
ajaxHelper.init({
// formSubmit:$('#btnSubmit'),
formId:$('#form'),
fetchURL:baseUrl(),
// url:$('#form').attr('action'),
// url:"<?php echo base_url('settings/subjects/add');?>",
// formData:{
//   course_id:$('#course_id').val(),
//   emp_id:$('#emp_id').val(),
//   name:$('#name').val(),
//   code:$('#code').val(),
//   credit_hour:$('#credit_hour').val(),
//   passing_grade:$('#passing_grade').val(),
//   total_grade:$('#total_grade').val(),
// },
});
$('body').on('change', '#course_id', function(event) {
var subs = new kendo.data.DataSource({
  transport: {
    read: { async: true,
      url:  baseUrl('settings/subjects/get_existing/'+$(this).val()),
      dataType: "json"
    },
    update: {
      url: baseUrl("settings/subjects/save"),
      dataType: "json"
    },
    create: {
      url: baseUrl("settings/subjects/save/"+$(this).val()),
      dataType: "json"
    },
    destroy: {
                    url: baseUrl("settings/subjects/delete"),
                    dataType: "json"
                },
    parameterMap: function(options, operation) {
                    if (operation !== "read" && options.models) {
                        return {models: kendo.stringify(options.models)};
                    }
                }
  },
  batch: true,
  schema: {
    model: {
      id: "subject_id",
      fields: {
        // company_id: { type: "number" ,validation: { min: 0, required: true }},
        name: { type: "string" ,validation: { required: true }},
        emp_id: { validation: { required: true },template:kendo.template($('#tplemp').html())},
        code: { type: "string" },
        credit_hour: { type: "number" },
        total_grade: { type: "number" ,validation: { min: 1, required: true }},
        passing_grade: { type: "number" ,validation: { min: 1, required: true }},
      }
    }
  },
});
$("#existing_subs").kendoGrid({
dataSource: subs,
toolbar: ["create"],
editable:"inline",
scrollable: true,
columns: [
{field: "emp_id", title: "Teacher",width:"240px",editor:employeeDropDown,template:kendo.template($('#tplemp').html())},
{field: "name", title: "Name"},
{field: "code", title: "Code"},
{field: "credit_hour", title: "Credit Hour"},
{field: "total_grade", title: "Maximum Marks"},
{field: "passing_grade", title: "Passing Marks"},
// {template:kendo.template($("#tplactions").html()), title: "Actions",width:100},
{command: ["edit", "destroy"], title: "Actions", width: "250px"},
],
mobile: true,
height:340,
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
});
});
 // var subjectModel = kendo.observable({
 //        isVisible: true,
 //        onSave: function(e) {
 //            Console.log("event :: save(" + kendo.stringify(e.values, null, 4) + ")");
 //        },
 //        subjects: new kendo.data.DataSource({
 //            schema: {
 //                model: {
 //                    id: "subject_id",
 //                    fields: {
 //                        // company_id: { type: "number" ,validation: { min: 0, required: true }},
 //                        name: { type: "string" ,validation: { required: true }},
 //                        code: { type: "string" },
 //                        credit_hour: { type: "number" },
 //                        total_grade: { type: "number" ,validation: { min: 1, required: true }},
 //                        passing_grade: { type: "number" ,validation: { min: 1, required: true }},
 //                    }
 //                }
 //            },
 //            batch: true,
 //            transport: {
 //                read: {
 //      url:  baseUrl('settings/subjects/get_existing/4'),
 //      dataType: "json"
 //    },
 //    update: {
 //      url: baseUrl("settings/subjects/update"),
 //      dataType: "json"
 //    },
 //    create: {
 //      url: baseUrl("settings/subjects/create"),
 //      dataType: "json"
 //    },
 //                parameterMap: function(options, operation) {
 //                    if (operation !== "read" && options.models) {
 //                        return {models: kendo.stringify(options.models)};
 //                    }
 //                }
 //            }
 //        })
 //    });
 //    kendo.bind($("#example"), subjectModel);
 function employeeDropDown(container,options) {
  var combo = '<select name="emp_id" style="width:inherit;height:inherit;" class="form-control input-sm" required="required"><?php foreach ($heads as $head): ?><option value="<?php echo $head['employee_id']?>"><?php echo $head['first_name']?> <?php echo $head['last_name']?> | <b><?php echo $head['job_title']?></b></option>';
                    <?php endforeach?>
                  $(combo).appendTo(container);
   // $("<input>",{
   //  "data-text-field":"first_name"+" "+"last_name",
   //   "data-value-field":"emp_id",
   //   "data-bind":"value:'"+options.field+"'"
   // }).appendTo(container);
 }
</script>