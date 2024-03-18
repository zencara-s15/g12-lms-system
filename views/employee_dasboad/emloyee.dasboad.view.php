<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title mb-0 d-inline-block">
                    Your Upcoming Leave
                </h4>
                <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
            </div>
            <div class="card-body recent-activ">
                <div class="recent-comment">

                    <!-- For leave coming up data -->
                    <?php
                    require_once("models/admin.model.php");
                    $leaveToday = get_leave_requests();
                    if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])) {
                        $email = $_SESSION['user']['email'];
                        foreach ($leaveToday as $leave) {
                            $email_user = $leave['email'];
                            $start_date = $leave["end_date"];
                            if ($email === $email_user && $leave['status'] === 'Approved' && $start_date > date('Y-m-d')) {
                                $leave_type = $leave['leave_type'];
                    ?>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <i class="fa fa-calendar-check-o"></i>
                                            </td>
                                            <td>
                                                <h6 class="mb-0"><?= $start_date ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Reason : <?= $leave_type ?></h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- count of number day off -->
    <?php
    require_once 'models/employee.model.php';
    $user_info = get_user_info($_SESSION['user']['email']);

    ?>
    <div class="row">
        <div class="card ctm-border-radius grow">
            <div class="card-header">
                <h4 class="card-title mb-0 d-inline-block">Leave Remain</h4>
                <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
            </div>
            <div class="card-body text-center">
                <div class="time-list">
                    <div class="dash-stats-list">
                        <span class="btn btn-outline-primary"><?= max(0, $user_info['amount_leave']) ?></span>
                        <p class="mb-0">Taken</p>
                    </div>
                    <div class="dash-stats-list">
                        <span class="btn btn-outline-primary"><?= $user_info['amount_leave']  ?></span>
                        <p class="mb-0">Remaining</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>