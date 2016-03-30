<div class="right-sidebar">
  <div class="wrapper">
    <div class="viewport">
      <div class="overview">
        <div class="featured-articles-container">
          <h5 class="heading">
            <i class="icon ion-clock text-info"></i> Add job
          </h5>
          <div id="message"></div>
          <form action="#" method="POST" role="form">
            <div class="form-group">
              <label for="name">Post Name*</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter job/post Title">
            </div>
            <div class="form-group">
              <label for="salary">Salary*</label>
              <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter Salary">
            </div>
            <div class="form-group">
              <label for="dept_id">Department</label>
              <select name="dept_id" id="dept_id" class="form-control" required="required">
                <?php foreach ($depts as $dept): ?>
                  <option value="<?php echo $dept['dept_id']?>"><?php echo $dept['name']?></option>
                <?php endforeach?>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Enter job Description">
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </form>
        </div><!--add new job panel end -->
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
                  <h4 class="panel-title"><i class="icon ion-clock text-info"></i>Available jobs</h4>
                </div>
                <div class="panel-body">
                  <div id="beautify_dt" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left dtable">
                      <thead>
                        <tr>
                          <th>Post name</th>
                          <th>Salary</th>
                          <th>Department</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($jobs as $job): ?>
                          <tr>
                            <td><?php echo $job['name'];?></td>
                            <td>RS.<?php echo $job['salary'];?></td>
                            <td><?php echo $job['department'];?></td>
                            <td><?php echo $job['description'];?></td>
                            <?php if ($job['company_id'] > 0): ?>
                              <td><a href="<?php echo base_url('settings/jobs/remove/' . $job['id']);?>" class='delete btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
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
              </div><!--all job panel end -->
            </div><!--content row end -->
          </div><!--widget body end -->