<div class="right-sidebar">
  <div class="wrapper">
    <div class="viewport">
      <div class="overview">
        <div class="featured-articles-container">
          <h5 class="heading">
              <i class="icon ion-clock text-info"></i> Add course
          </h5>
              <div id="message"></div>
              <form action="#" method="POST" role="form">
                <div class="form-group">
                  <label for="name">name*</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter course Title" required="required">
                </div>
                <div class="form-group">
                  <label for="cost">Total Cost*</label>
                  <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter course cost..." required="required">
                </div>
                <div class="form-group">
                  <label for="duration">Duration*</label>
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
                <div class="form-group">
                  <label for="dept_id">Department*</label>
                  <select name="dept_id" id="dept_id" class="form-control" required="required">
                    <?php foreach ($depts as $dept): ?>
                    <option value="<?php echo $dept['dept_id']?>"><?php echo $dept['name']?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <!--   <label for="">Available shifts</label>
                <div class="form-group">
                  <select name="shift[]" id="multi_select" multiple="multiple" class="form-control" required="required">
                    <?php foreach ($shifts as $shift): ?>
                    <option value="<?php echo $shift['id']?>"><?php echo $shift['title'];?></option>
                    <?php endforeach?>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Enter course Description">
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
              </form>
          </div><!--add new course panel end -->
        </div>
      </div>
    </div>
</div>
    <!-- Left Sidebar Start -->
  <div class="left-sidebar">
    <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <span class="panel-title"><i class="icon ion-clock text-info"></i>Available Courses</span>
                <span class="tools pull-right">
                <a href="<?php echo base_url('settings/courses/add');?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add New</a>
              </span>
                  </div>
                  <div class="panel-body">
                   <div id="beautify_dt" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left dtable">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Cost</th>
                          <th>Duration</th>
                          <th>Department</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($courses as $course): ?>
                        <tr>
                          <td><?php echo $course['name'];?></td>
                          <td>RS.<?php echo $course['cost'];?></td>
                          <td><?php echo $course['duration'];?></td>
                          <td><?php echo $course['department'];?></td>
                          <td><?php echo $course['description'];?></td>
                          <?php if ($course['company_id'] > 0): ?>
                          <td><a href="<?php echo base_url('settings/courses/delete/' . $course['course_id']);?>" class='delete btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                        <?php else: ?>
                          <td><a href="#" class='system btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                          <?php endif?>
                        </tr>
                        <?php endforeach?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                </div><!--all course panel end -->
                </div><!--content row end -->
</div>