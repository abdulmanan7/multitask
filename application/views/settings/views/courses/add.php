<!-- Row Start -->
<div class="row">
  <div class="col-md-10">
    <div class="panel panel-default">
      <form action="<?php echo base_url('settings/courses/add');?>" class="form-horizontal row-border" method="POST" role="form">
        <div class="panel-heading">
          Create Course
          <span class="mini-title">
            Please fill the form carefully
          </span>
        </div>
        <div class="panel-body">
          <div class="col-sm-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                Basic information
              </div>
              <div class="panel-body">
<div class="form-group">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
        <label for="name" class="col-sm-2 control-label">Name*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter course Title" required="required">
        </div>
      </div>
      <div class="col-sm-6">
        <label for="dept_id" class="col-sm-2 control-label">Department*</label>
        <div class="col-sm-10">
          <select name="dept_id" id="dept_id" class="form-control" required="required">
            <?php foreach ($depts as $dept): ?>
            <option value="<?php echo $dept['dept_id']?>"><?php echo $dept['name']?></option>
            <?php endforeach?>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
        <label for="cost" class="col-sm-2 control-label">Cost*</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter total course cost..." required="required">
        </div>
      </div>
      <div class="col-sm-6">
        <label for="duration" class="col-sm-2 control-label">Duration*</label>
        <div class="col-sm-10">
          <select name="duration" id="duration" class="form-control" required="required">
                    <option value="">- Select Duration</option>
                    <option value="Less then a Month">Less then a Month</option>
                    <option value="1 Month">1 Month</option>
                    <option value="2 Months">2 Months</option>
                    <option value="3 Months">3 Months</option>
                    <option value="4 Months">4 Months</option>
                    <option value="5 Months">5 Months</option>
                    <option value="6 Months">6 Months</option>
                    <option value="7 Months">7 Months</option>
                    <option value="8 Months">8 Months</option>
                    <option value="9 Months">9 Months</option>
                    <option value="10 Months">10 Months</option>
                    <option value="11 Months">11 Months</option>
                    <option value="One year">One year</option>
                    <option value="Two years">Two years</option>
                    <option value="Three years">Three years</option>
                    <option value="Four years">Four Years</option>
                    <option value="Five years">Five Years</option>
                    <option value="Six years">Six Years</option>
                  </select>
        </div>
      </div>
    </div>
  </div>
</div>
                <div class="form-group">
                  <div class="col-sm-12">
                  <label for="description">Description</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter course Description optional"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div><!--col-sm-8 basic -->
          <div class="col-sm-12">
            <div class="panel panel-warning">
              <div class="panel-heading">Specify course section</div>
              <div class="panel-body">
                <table class="table table-condensed no-margin">
                  <thead>
                    <tr>
                      <th>Title*</th>
                      <th>Shift</th>
                      <th>Start time*</th>
                      <th>Days*</th>
                      <th>Head*</th>
                      <th>Capacity</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody id="table_body">
                    <tr class="section">
                      <td>
                          <input type="text" name="title[]" class="form-control input-sm" placeholder="e.g A Blue...">
                      </td>
                      <td>
                          <select name="shift[]" class="form-control input-sm" required="required">
                            <?php foreach ($shifts as $shift): ?>
                              <option value="<?php echo $shift['id']?>"><?php echo $shift['title'];?></option>
                            <?php endforeach?>
                          </select>
                      </td>
                      <td>
                          <input type="text" class="form-control input-sm" name="start_time[]" placeholder="Start timeing...">
                      </td>
                      <td>
                          <select name="days[]" class="form-control input-sm" required="required">
                            <option value="">- Select days</option>
                            <option value="1 day of a week">1 day of a week</option>
                            <option value="2 days of a week">2 days of a week</option>
                            <option value="3 days of a week">3 days of a week</option>
                            <option value="4 days of a week">4 days of a week</option>
                            <option value="5 days of a week">5 days of a week</option>
                            <option value="6 days of a week">6 days of a week</option>
                            <option value="Others">Others</option>
                          </select>
                      </td>
                      <td>
                          <select name="head_id[]" class="form-control input-sm" required="required">
                            <?php foreach ($heads as $head): ?>
                              <option value="<?php echo $head['employee_id']?>">
                                <?php echo $head['first_name']?> <?php echo $head['last_name']?> | <b><?php echo $head['job_title']?></b>
                              </option>
                            <?php endforeach?>
                          </select>
                      </td>
                      <td>
                          <input type="text" class="form-control input-sm" name="capacity[]" placeholder="Enter section capacity...">
                      </td>
                      <td>
                          <textarea name="section_notes[]" class="form-control" rows="2"></textarea>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <a id="addmore" class="btn btn-default pull-right" onclick="add_another()">Add Another</a>
              </div>
              </div>
          </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div><!--panel end-->
  </div>
</div><!-- Row End -->