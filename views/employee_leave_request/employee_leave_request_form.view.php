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
                    <form action="../../controllers/employee_leave_request/em_apply_leave.controller.php" id="leaveForm" method="post">

                        <div class="row">`
                            <!-- get id user -->
                            <div class="col-sm-6">
                                <div class="form-group" > 
                                    <label>user_id</label>
                                    <input type="" class="form-control" name="user_id" value="<?= $users['id'] ?>">
                                </div>
                            </div>
                            <!-- leave amount -->
                            <div class="col-sm-6">
                                <div class="form-group" hidden>
                                    <label>leave amount</label>
                                    <input type="" class="form-control" name="leave_amount" value="<?= $users['leave_amount'] ?>">
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
                            <!--leave type -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Leave Type<span class="text-danger">*</span></label>
                                    <select class="form-control select" name="leave_type_id" required>
                                        <option value="" selected disabled >Select Leave Type</option>
                                        <?php
                                        $leave_types = get_leave_types();

                                        foreach ($leave_types as $key => $leave_type) : ?>
                                            <option value="<?= $leave_type['id'] ?>"><?= $leave_type['leave_type'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- leave amount left  -->
                            <div class="col-sm-6 leave-col">
                                <div class="form-group">
                                    <label>Remaining Leaves</label>
                                    <input type="text" class="form-control" disabled value="<?= $users['leave_amount'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- start date  -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>From</label>
                                    <input type="text" class="form-control datetimepicker" name="start_date" required>
                                </div>
                            </div>
                            <!-- end date  -->
                            <div class="col-sm-6 leave-col">
                                <div class="form-group">
                                    <label>To</label>
                                    <input type="text" class="form-control datetimepicker" name="end_date" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- description  -->
                            <div class="col-sm-12">
                                <div class="form-group mb-0">
                                    <label>Reason</label>
                                    <textarea class="form-control" rows=4 name="description" required></textarea>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <!-- btn for submit  and cancel -->
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" <?php // condition for employee apply if their leave are more than 0
                                                                                                                    $leave_amount = 2;
                                                                                                                    if ($leave_amount <= 0) {
                                                                                                                        echo "disabled";
                                                                                                                    };
                                                                                                                    ?>>Apply</button>
                            <a href="" class="btn btn-danger text-white ctm-border-radius mt-4 ">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>