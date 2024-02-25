<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="card shadow mb-4">
		<div class="card-header py-3  flex-row align-items-center justify-content-between">
			<h3 class="m-0 font-weight-bold text-primary">Approved Leaves</h3>
			<p class="mt-1">Total Aprroved : <strong class="text-danger "><?= 3 ?></strong></p>
		</div>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="table-dark">
					<tr>
						<th scope="col">id</th>
						<th scope="col">Employee Name</th>
						<th scope="col">Department</th>
						<th scope="col">Start From.</th>
						<th scope="col">End in</th>
						<th scope="col">Total</th>
						<th scope="col">Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$approved_leave = get_aprroved_leave();

					foreach ($approved_leave as $num => $data) : ?>
						<tr>
							<td style="vertical-align: middle;"><?= $num + 1 ?></td>
							<td style="vertical-align: middle;"><?= $data['first_name'] . " " . $data['last_name'] ?></td>
							<td style="vertical-align: middle;"><?= $data['department'] ?></td>
							<td style="vertical-align: middle;"><?= $data['start_date'] ?></td>
							<td style="vertical-align: middle;"><?= $data['end_date'] ?></td>
							<td style="vertical-align: middle;"><?= date_diff(new DateTime($data['start_date']), new DateTime($data['end_date']))->format('%a') ?></td>
							<td style="vertical-align: middle;">
								<a href="../../controllers/leave_requests/leave_requests_accept.controller.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-success"><span class=""></span>Details</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>