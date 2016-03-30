<!-- Left Sidebar Start -->
<div class="left-sidebar">
  <!-- Row Start -->
  <div class="row">
  <div class="col-sm-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class="panel-title">Shifts</span>
              <span class="tools pull-right">
              <a class="btn btn-primary btn-xs" data-toggle="modal" href='#add_shift'><i class="fa fa-plus"></i> Add New</a>
              </span>
          </div>
          <div class="panel-body">
            <div id="beautify_dt" class="example_alt_pagination">
              <table class="table table-condensed table-striped table-hover table-bordered pull-left dtable">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($shifts as $shift): ?>
                    <tr>
                      <td><?php echo $shift['title'];?></td>
                      <td><?php echo $shift['description'];?></td>
                      <td><?php echo $shift['start_time'];?></td>
                      <td><?php echo $shift['end_time'];?></td>
                      <?php if ($shift['company_id'] > 0): ?>
                        <td><a href="<?php echo base_url('settings/shifts/delete/' . $shift['id']);?>" class='delete btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                      <?php else: ?>
                        <td><a href="#" class='system btn btn-danger btn-xs'> <i class="fa fa-trash-o"></i></a></td>
                      <?php endif?>
                    </tr>
                  <?php endforeach?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- panel -->
        </div>
      </div><!--content row end -->
      <?php $this->load->view('settings/modals/add_shift');?>
    </div><!--widget body end -->
  </div><!--widget end -->