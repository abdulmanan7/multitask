<!-- Left Sidebar Start -->
<div class="left-sidebar">
  <!-- Row Start -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="widget no-margin">
        <div class="widget-header">
          <div class="title">
            Semester Lists
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
                  <h4 class="panel-title"><i class="icon ion-clock text-info"></i>Available Semesters</h4>
                </div>
                <div class="panel-body">
                  <div id="beautify_dt" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Duration</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($semesters as $semester): ?>
                          <tr>
                            <td><?php echo $semester['name'];?></td>
                            <td><?php echo $semester['duration'];?></td>
                            <td><?php echo $semester['description'];?></td>
                            <?php if ($semester['company_id'] > 1): ?>
                              <td><a href="<?php echo base_url('settings/semester_remove');?>" class='delete btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                            <?php endif?>
                            <td><a href="#" class='system btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                          </tr>
                        <?php endforeach?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div><!--all semester panel end -->
              <div class="col-sm-4">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h4 class="panel-title"><i class="icon ion-clock text-info"></i> Add semester</h4>
                  </div>
                  <div class="panel-body">
                    <div id="message"></div>
                    <form action="#" method="POST" role="form">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter semester name">
                      </div>
                      <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter semester duration">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter semester Description">
                      </div>
                      <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div><!--add new semester panel end -->
            </div><!--content row end -->
          </div><!--widget body end -->
        </div><!--widget end -->
      </div>
    </div>  <!-- Row End -->
  </div>
            <!-- Left Sidebar End