<div class="col-xl-9 col-lg-8 col-md-12 position-relative">

    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Leave Management</h3>
            <p class="mt-1">Rejected : <strong class="text-danger "><?= count_rejected_requests() ?></strong></p>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="card shadow-sm ctm-border-radius grow">
                    <div class="card-body align-center">
                        <div class="row filter-row">
                            <div class="col-4">
                                <div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
                                    <input type="text" class="form-control datetimepicker" placeholder="From">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
                                    <input type="text" class="form-control datetimepicker" placeholder="To">
                                </div>
                            </div>

                            <div class="col-4">
                                <a href="#" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Apply Filter </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive text-nowrap">
                <!-- Table to Show All Employees -->
                <table class="table table-hover text-nowrap">
                    <thead class="table-dark ">
                        <th scope="col">#</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $get_leave_requests = get_leave_requests();
                        $num = 0;

                        foreach ($get_leave_requests as $data) :
                            if ($data['status'] == 'Rejected') :
                        ?>


                                <tr class="border-bottom" style="font-size:14px">
                                    <td style="vertical-align: middle;"><?= ++$num ?></td>

                                    <td class="d-flex" style="text-align: center; vertical-align: middle;">
                                        <img style="width: 60px; height: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="data:image/jpeg;base64, <?php echo base64_encode($data['image_data']); ?>" />
                                        <span class="mt-3 m-lg-3"><?= $data['first_name'] . ' ' . $data['last_name'] ?></span>
                                    </td>

                                    <td style="vertical-align: middle;"><?= $data['position'] ?></td>
                                    <td style="vertical-align: middle;"><?= $data["start_date"] ?></td>
                                    <td style="vertical-align: middle;"><?= $data["end_date"] ?></td>
                                    <td style="vertical-align: middle;">
                                        <div class="status">
                                            <span style="width: 90%;" class="btn
													 <?php
                                                        $btn_color = "btn-primary";
                                                        if ($data["status"] == "Approved") {
                                                            $btn_color = "btn-outline-success border border-0";
                                                        } elseif ($data["status"] == "Rejected") {
                                                            $btn_color = "btn-outline-danger border border-danger";
                                                        } else {
                                                            $btn_color = "btn-primary";
                                                        }
                                                        echo $btn_color;
                                                        ?> btn-sm">
                                                <?= $data["status"] ?></span>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                            <div class="dropdown-menu border-0" style="width: 20px;">
                                                <a class="dropdown-item btn btn-outline-primary" href="../../controllers/leave_requests/leave_requests_accept.controller.php?id=<?= $data['id'] ?>" style="outline: 2px solid green; text-align: center; width: 97%;" onclick="return confirm('Are you sure you want to accept <?= $data['first_name'] . ' ' . $data['last_name'] . '`' . 's' ?> leave request?')">Accept</a>
                                                <a class="dropdown-item btn " href="/leave_requests_detial?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-dark" style="outline: 2px solid orange ;text-align: center; width: 97%;">Details</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                        <?php
                            endif;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Scroll Down Button -->
    <button id="scrollDownBtn" class="scroll-btn btn bg-secondary text-white float-right" style="font-size:20px; position: fixed;bottom: 20px; right: 20px; 
    z-index: 9999; /* Ensure it appears above other content */">
        <span class="material-symbols-outlined" style="margin-right: 14px; ">expand_more</span>
    </button>

    <!-- Scroll Up Button -->
    <button id="scrollUpBtn" class="scroll-btn btn bg-secondary text-white float-right" style="font-size:20px; position: fixed;bottom: 20px; right: 80px; z-index: 9999; ">
        <span class="material-symbols-outlined" style="margin-right: 14px;">expand_less</span>
    </button>

</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>
<script>
    // scroll
    // Scroll Down Button Event Listener
    document.getElementById('scrollDownBtn').addEventListener('click', function() {
        window.scrollBy(0, window.innerHeight); // Scroll down by the height of the viewport
    });

    // Scroll Up Button Event Listener
    document.getElementById('scrollUpBtn').addEventListener('click', function() {
        window.scrollBy(0, -window.innerHeight); // Scroll up by the height of the viewport
    });
</script>