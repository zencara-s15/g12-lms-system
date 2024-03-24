<div class="col-xl-9 col-lg-8 col-md-12 position-relative grow">
    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Leave History</h3>
        </div>
    </div>
    <div class="table-responsive">
        <!-- table show all leave_history -->
        <table class="table table-hover text-nowrap">
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
                $history = getHistory($id);
                foreach ($history as $num => $histories) :
                ?>
                    <tr>
                        <td><?php echo $num + 1 ?></td>
                        <td><?php echo $histories['leave_type'] ?></td>
                        <td><?php echo $histories['start_date'] ?></td>
                        <td><?php echo $histories['end_date'] ?></td>
                        <td><?php echo $histories['description'] ?></td>
                        <td><?php echo $histories['status'] ?></td>
                        <td style="vertical-align: middle;">
                            <a href="/leave_history_detail?id=<?= $histories['id'] ?>" class="btn btn-sm btn-outline-success"><span class=""></span>Details</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>