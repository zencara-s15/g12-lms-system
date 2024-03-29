<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="card shadow mb-4">
		<div class="card-header py-3  flex-row align-items-center justify-content-between">
			<h3 class="m-0 font-weight-bold text-primary">Approved Leaves</h3>
			<p class="mt-1">Total Aprroved : <strong class="text-danger "><?= count_approved_leave() ?></strong></p>
			<div class="container" style="display: flex; justify-content: flex-end;">
				<a href="/print_report" class="btn btn-theme button-1 ctm-border-radius float-right" style="font-size:13px" type="button">Print</a>
			</div>
		</div>

		<div class="container table-responsive">
			<table class="table table-hover text-nowrap">
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
								<a href="/report_detail?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-success"><span class=""></span>Details</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
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
	// Scroll Down Button Event Listener
	document.getElementById('scrollDownBtn').addEventListener('click', function() {
		window.scrollBy(0, window.innerHeight); // Scroll down by the height of the viewport
	});

	// Scroll Up Button Event Listener
	document.getElementById('scrollUpBtn').addEventListener('click', function() {
		window.scrollBy(0, -window.innerHeight); // Scroll up by the height of the viewport
	});
</script>