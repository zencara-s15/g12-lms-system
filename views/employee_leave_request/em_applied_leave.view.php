<div class="col-xl-9 col-lg-8 col-md-12 position-relative grow">
    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Pending Leave</h3>
        </div>
    </div>
    <!-- table show all leave_history -->
    <table class="table table-hover">
        <thead class="table-dark ">
            <th scope="col">#</th>
            <th scope="col">Leave type</th>
            <th scope="col">Start date</th>
            <th scope="col">End date</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $applied_leaves = get_applied_leave($id);
            foreach ($applied_leaves as $num => $applied_leave) :
            ?>
                <tr>
                    <td><?php echo $num + 1 ?></td>
                    <td><?php echo $applied_leave['leave_type'] ?></td>
                    <td><?php echo $applied_leave['start_date'] ?></td>
                    <td><?php echo $applied_leave['end_date'] ?></td>
                    <td><?php echo $applied_leave['description'] ?></td>
                    <td><?php echo $applied_leave['status'] ?></td>
                    <td style="vertical-align: middle;">
                        <a href="/leave_history_detail?id=<?= $applied_leave['id'] ?>" class="btn btn-sm btn-outline-success"><span class=""></span>Details</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>