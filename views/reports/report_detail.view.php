<div class=" ctm-border-radius shadow-sm col-lg bg-white">
    <div class="container mt-5">
        <!-- Image added to the middle top -->
        <div class="row justify-content-center mb-4">
            <img src="assets/images/profiles/img-2.jpg" alt="Company Logo" class="img-fluid img-fluid rounded-circle" style="max-width: 150px;">
        </div>

        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" readonly value="<?= $get_leave_detail['first_name'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" readonly value="<?= $get_leave_detail['last_name'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" readonly value="<?= $get_leave_detail['gender'] ?>">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="email">Gmail</label>
                    <input type="text" class="form-control" id="email" name="email" readonly value="<?= $get_leave_detail['email'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" readonly value="<?= $get_leave_detail['position'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="leave_type">Leave Type</label>
                    <input type="text" class="form-control" id="leave_type" name="leave_type" readonly value="<?= $get_leave_detail['leave_type'] ?>">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="start_date">Start Date</label>
                    <input type="text" class="form-control" id="start_date" name="start_date" readonly value="<?= $get_leave_detail['start_date'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="end_date">End Date</label>
                    <input type="text" class="form-control" id="end_date" name="end_date" readonly value="<?= $get_leave_detail['end_date'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="amount">Total</label>
                    <input type="text" class="form-control" id="amount" name="amount" readonly value="<?= date_diff(new DateTime($get_leave_detail['start_date']), new DateTime($get_leave_detail['end_date']))->format('%a') ?>">
                </div>

            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" readonly><?= $get_leave_detail['description'] ?></textarea>
            </div>
        </form>
    </div>
</div>