<!-- Left Sidebar Start -->
<div class="left-sidebar">
  <!-- Row Start -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="widget no-margin">
        <div class="widget-header">
          <div class="title">
            Department Lists
          </div>
          <span class="tools">
            <i class="fa fa-cogs"></i>
          </span>
        </div>
        <div class="widget-body">
          <div class="row">
            <div class="col-sm-8">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="icon ion-clock text-info"></i>Available departments</h4>
                </div>
                <div class="panel-body">
                  <div id="beautify_dt" class="example_alt_pagination">
                    <table class="table table-striped table-bordered pull-left dtable">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($departments as $department): ?>
                          <tr>
                            <td><?php echo $department['dept_id'];?></td>
                            <td><?php echo $department['name'];?></td>
                            <td><?php echo $department['description'];?></td>
                            <?php if ($department['company_id'] > 1): ?>
                              <td><a href="<?php echo base_url('settings/department_remove');?>" class='delete btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                            <?php endif?>
                            <td><a href="#" class='system btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                          </tr>
                        <?php endforeach?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div><!--all department panel end -->
              <div class="col-sm-4">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h4 class="panel-title"><i class="icon ion-clock text-info"></i> Add department</h4>
                  </div>
                  <div class="panel-body">
                    <div id="message"></div>
                    <form action="#" method="POST" role="form">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter department name">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" placeholder="Enter short description for department..." id="description" class="form-control" rows="3" required="required" ></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div><!--add new department panel end -->
            </div><!--content row end -->
          </div><!--widget body end -->
        </div><!--widget end -->
      </div>
    </div>  <!-- Row End -->
  </div>
            <!-- Left Sidebar End