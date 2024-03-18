<?php
// ob_start()
?>
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card ctm-border-radius shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0">Apply Leaves</h4>
                </div>
                <div class="card-body">
                    <form action="../../controllers/employee_leave_request/em_apply_leave.controller.php" method="post" id="leaveForm" enctype="multipart/form-data">

                        <div class="row">
                            <!-- get id user -->
                            <div class="col-sm-6">
                                <div class="form-group" hidden>
                                    <label>user_id</label>
                                    <input type="" class="form-control" name="user_id" value="<?= $user_info['id'] ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" hidden>
                                    <label>Email</label>
                                    <input type="" class="form-control" name="email" value="<?= $user_info['email'] ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" hidden>
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="full_name" value="<?= $user_info['first_name'] . ' ' . $user_info['last_name'] ?>">
                                </div>
                            </div>
                            <!-- leave amount -->
                            <div class="col-sm-6">
                                <div class="form-group" hidden>
                                    <label>leave amount</label>
                                    <input type="" class="form-control" name="amount_leave" value="<?= $user_info['amount_leave']  ?>">
                                </div>
                            </div>
                            <!-- status -->
                            <div class="col-sm-6 leave-col" hidden>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="" class="form-control" name="status" value="Pending">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <!-- start date  -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>From</label>
                                    <input id="start_date" type="date" class="form-control" name="start_date" min="<?php date_default_timezone_set('Asia/Bangkok'); // start leave can't select to the past
                                                                                                                    $month = date('m');
                                                                                                                    $day = date('d');
                                                                                                                    $year = date('Y');

                                                                                                                    $today = $year . '-' . $month . '-' . $day;
                                                                                                                    echo $today
                                                                                                                    ?>" onchange="compare_date()" required>
                                    <div class="invalid-feedback">Please enter a start date.</div>
                                </div>
                            </div>

                            <!--leave type -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Leave Type<span class="text-danger">*</span></label>
                                    <select class="form-control select" name="leave_type_id" required>
                                        <option value="" selected disabled>Select Leave Type</option>
                                        <?php
                                        $leave_types = get_leave_types();
                                        foreach ($leave_types as $key => $leave_type) : ?>
                                            <option value="<?= $leave_type['id'] ?>"><?= $leave_type['leave_type'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a leave type.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- end date  -->
                            <div class="col-sm-6 leave-col">
                                <div class="form-group">
                                    <label>Until</label>
                                    <input id="end_date" type="date" class="form-control" name="end_date" min="<?php date_default_timezone_set('Asia/Bangkok'); // start leave can't select to the past
                                                                                                                $month = date('m');
                                                                                                                $day = date('d');
                                                                                                                $year = date('Y');

                                                                                                                $today = $year . '-' . $month . '-' . $day;
                                                                                                                echo $today
                                                                                                                ?>" onchange="compare_date()" required>
                                    <div class="invalid-feedback">Please enter an end date.</div>
                                </div>
                            </div>

                            <!-- duration -->
                            <div class="col-sm-3 leave-col">
                                <label>Duration</label>
                                <input id="duration" type="number" class="form-control" name="duration" disabled onchange="calculate_date()">
                            </div>

                            <!-- leave amount left  -->
                            <div class="col-sm-3 leave-col">
                                <div class="form-group">
                                    <label>Remaining Leaves</label>
                                    <input type="text" class="form-control <?php echo ($user_info['amount_leave'] <= 0) ? 'border-danger' . ' ' . 'bg-light' . ' ' . 'text-danger' : ''; ?>" disabled value="<?php echo $user_info['amount_leave']; ?>">
                                    <div class="text-danger"><?php echo ($user_info['amount_leave'] < 0) ? 'You are out of amount' : ''; ?></div>
                                    <div class="text-danger"><?php echo ($user_info['amount_leave'] == 0) ? 'No Amount Left' : ''; ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- description -->
                            <div class="col-sm-12">
                                <div class="form-group mb-0">
                                    <label>Reason</label>
                                    <textarea class="form-control" rows="4" name="description" required></textarea>
                                    <div class="invalid-feedback">Please enter a reason for leave.</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <!-- btn for submit  and cancel -->
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" onclick="validateForm()">Apply</button>
                            <a href="" class="btn btn-danger text-white ctm-border-radius mt-4 ">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        let form = document.querySelector('#leaveForm');
        form.classList.add('was-validated');
    }

    function compare_date() {
        let start_date = document.getElementById('start_date').value;
        let end_date = document.getElementById('end_date').value;

        if (start_date > end_date) {
            alert('End date should be greater than start date');

            document.getElementById('end_date').value = '';
        }
    }

    function calculate_date() {
        let start_date = new Date(document.getElementById('start_date').value);
        let end_date = new Date(document.getElementById('end_date').value);

        // Calculate the difference in milliseconds between the two dates
        let duration = Math.floor((end_date - start_date) / (1000 * 60 * 60 * 24));

        // Update the duration input field with the calculated value
        document.getElementById('duration').value = duration;
    }
    document.getElementById('start_date').addEventListener('change', calculate_date);
    document.getElementById('end_date').addEventListener('change', calculate_date);
</script>