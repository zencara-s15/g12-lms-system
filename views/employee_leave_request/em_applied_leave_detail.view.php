<div class=" ctm-border-radius shadow-sm col-lg bg-white">
  <div class="container mt-5">
      <div class="card-header py-3  flex-row align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Deatials of leave: <?=$id?></h3>
      </div>

      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="start_date">Start Date</label>
            <input type="text" class="form-control" id="start_date" name="start_date" readonly value="<?= $applied_leave_detail['start_date'] ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="end_date">End Date</label>
            <input type="text" class="form-control" id="end_date" name="end_date" readonly value="<?= $applied_leave_detail['end_date'] ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="leave_type">Leave Type</label>
            <input type="text" class="form-control" id="leave_type" name="leave_type" readonly value="<?= $applied_leave_detail['leave_type'] ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="amount">Duration</label>
            <input type="text" class="form-control" id="amount" name="amount" readonly value="<?= date_diff(new DateTime($applied_leave_detail['start_date']), new DateTime($applied_leave_detail['end_date']))->format('%a') ?>">
          </div>

        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" rows="5" readonly><?= $applied_leave_detail['description'] ?></textarea>
        </div>
      </form>
    </div>
  </div>