<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="container" style="display: flex; justify-content: flex-end;">
		<a href="#" onclick="window.print()" class="btn btn-danger border border-0 text-white" style="font-size:13px" type="button">Print</a>
	</div>

	<div class="card-body">
		<h5 class="card-title" style="display: flex; justify-content: center; font-size: 20px"><b>Leave Management System Report</b></h5>
		<p class="card-text" style="display: flex; justify-content: center; font-size: 15px">The report of the employee that approve to get leave 2024</p>
	</div>
	<div></div>
	<div class="container">
		<table class="table table-hover">
			<thead class="table-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Employee Name</th>
					<th scope="col">Position</th>
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
						<td style="vertical-align: middle;">
							<img style="width: 60px; height: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="data:image/jpeg;base64, <?php echo base64_encode($data['image_data']); ?>" />

							<span class="mt-3 m-lg-3"><?= $data['first_name'] . " " . $data['last_name'] ?></span>
						</td>
						<td style="vertical-align: middle;"><?= $data['position'] ?></td>
						<td style="vertical-align: middle;"><?= $data['start_date'] ?></td>
						<td style="vertical-align: middle;"><?= $data['end_date'] ?></td>
						<td style="vertical-align: middle;"><?= date_diff(new DateTime($data['start_date']), new DateTime($data['end_date']))->format('%a') ?></td>
						<td style="vertical-align: middle;">
							<a href="?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-success"><span class=""></span>Details</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="sidebar-overlay" id="sidebar_overlay"></div>