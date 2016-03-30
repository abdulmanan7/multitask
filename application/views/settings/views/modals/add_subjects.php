<div class="modal fade" id="mdl_add_subjects">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Adding Subjects</h4>
			</div>
			<div class="modal-body">
		<form action="<?php echo base_url('settings/subjects/add');?>" method="POST" role="form" id="form">
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
        </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>