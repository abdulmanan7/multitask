<!-- shift add -->
<div class="modal fade in" id="add_shift" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Adding new Shift</h4>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" role="form">
          <div class="form-group">
            <label for="title">Title*</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Shift Title">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Shift Description">
          </div>
          <div class="form-group">
            <label for="start_time">Start Time*</label>
            <div class="row">
              <div class="col-sm-7">
                <select name="start_time" id="start_time" class="form-control" required="required">
                  <option value="1:00">1:00</option>
                  <option value="2:00">2:00</option>
                  <option value="3:00">3:00</option>
                  <option value="4:00">4:00</option>
                  <option value="5:00">5:00</option>
                  <option value="6:00">6:00</option>
                  <option value="7:00">7:00</option>
                  <option value="8:00">8:00</option>
                  <option value="9:00">9:00</option>
                  <option value="10:00">10:0</option>
                  <option value="11:00">11:0</option>
                  <option value="12:00">12:0</option>
                </select>
              </div>
              <div class="col-sm-5">
                <select name="am_pm_start_time" id="am_pm_start_time" class="form-control" required="required">
                  <option value="AM">AM</option>
                  <option value="PM">PM</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="end_time">End Time*</label>
            <div class="row">
              <div class="col-sm-7">
                <select name="end_time" id="end_time" class="form-control" required="required">
                  <option value="1:00">1:00</option>
                  <option value="2:00">2:00</option>
                  <option value="3:00">3:00</option>
                  <option value="4:00">4:00</option>
                  <option value="5:00">5:00</option>
                  <option value="6:00">6:00</option>
                  <option value="7:00">7:00</option>
                  <option value="8:00">8:00</option>
                  <option value="9:00">9:00</option>
                  <option value="10:00">10:0</option>
                  <option value="11:00">11:0</option>
                  <option value="12:00">12:0</option>
                </select>
              </div>
              <div class="col-sm-5">
                <select name="am_pm_end_time" id="am_pm_end_time" class="form-control" required="required">
                  <option value="AM">AM</option>
                  <option value="PM">PM</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Close</button>
          <button type="submit" id='submit' class="btn btn-primary" data-original-title="" title="">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>