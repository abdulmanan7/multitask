<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="widget no-margin">
      <div class="widget-header">
        <div class="title">
          Section Lists
        </div>
        <span class="tools">
          <i class="fa fa-cogs"></i>
        </span>
      </div>
      <div class="widget-body">
        <div class="row">
          <div class="col-sm-8">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title"><i class="icon ion-clock text-info"></i>Available sections</h4>
              </div>
              <div class="panel-body">
                <?php if (!is_array_empty($sections)): ?>
                  <?php foreach ($sections as $key => $section): ?>
                    <div class="group-table">
                      <div class="group-heading">
                        <?php echo $key;?>
                      </div>
                      <div class="group-body">
                       <div id="beautify_dt" class="example_alt_pagination">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left dtable">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Course</th>
                              <th>Start Time</th>
                              <th>Head</th>
                              <th>Days</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($section as $key => $val): ?>
                              <tr>
                                <td><?php echo $val['title']?></td>
                                <td><?php echo $val['course']?></td>
                                <td><?php echo $val['start_time']?></td>
                                <td><?php echo $val['first_name'] . " " . $val['last_name']?></td>
                                <td><?php echo $val['days']?></td>
                                <td></td>
                              </tr>
                            <?php endforeach?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php endforeach?>
              <?php else: ?>
                <p>No data to display please add some data....</p>
              <?php endif?>
            </div>
          </div>
        </div><!--all section panel end -->
        <div class="col-sm-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h4 class="panel-title">
                <i class="icon ion-clock text-info"></i> Add section
              </h4>
            </div>
            <div class="panel-body">
              <div id="message"></div>
              <form action="#" method="POST" role="form">
                <div class="form-group">
                  <label for="name">Title*</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter section Title">
                </div>
                <div class="form-group">
                  <label for="course_id">Course*</label>
                  <select name="course_id" id="course_id" name="course_id" class="form-control input-sm" required="required">
                  <option value="">Select Course</option>
                    <?php foreach ($courses as $course): ?>
                      <option value="<?php echo $course['course_id']?>"><?php echo $course['name']?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="shift">Shift*</label>
                  <select name="shift_id" id="shift" class="form-control" required="required">
                    <option value="">please select course first</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="start_time">Start time</label>
                  <input type="text" class="form-control" id="start_time" name="start_time" placeholder="Enter section Start time">
                </div>
                <div class="form-group">
                  <label for="days">Days*</label>
                  <select name="days" class="form-control" id="days" required="required">
                    <option value="">- Select days</option>
                    <option value="1 day of a week">1 day of a week</option>
                    <option value="2 days of a week">2 days of a week</option>
                    <option value="3 days of a week">3 days of a week</option>
                    <option value="4 days of a week">4 days of a week</option>
                    <option value="5 days of a week">5 days of a week</option>
                    <option value="6 days of a week">6 days of a week</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="head_id">Head*</label>
                  <select name="head_id" id="head_id" class="form-control" required="required">
                    <?php foreach ($heads as $head): ?>
                      <option value="<?php echo $head['employee_id']?>">
                        <?php echo $head['first_name']?> <?php echo $head['last_name']?> | <b><?php echo $head['job_title']?></b>
                      </option>
                    <?php endforeach?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="capacity">Capacity</label>
                  <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Enter section capacity...">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
              </form>
            </div><!--add new section panel end -->
          </div>
        </div>
      </div><!--content row end -->
    </div><!--widget body end -->
  </div><!--widget end -->
</div>
</div>  <!-- Row End -->
