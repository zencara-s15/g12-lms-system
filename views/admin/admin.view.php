<?php
$get_positions = get_postion_to_chartPie(); // return positions as string arrray
$count_users_by_position = count_users_by_position(); // return array number
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 col-13">
			<a href="/employees">
				<div class="card dash-widget ctm-border-radius shadow-sm grow">
					<div class="card-body">
						<div class="card-icon bg-primary">
							<i class="fa fa-users" aria-hidden="true"></i>
						</div>
						<div class="card-right">
							<h4 class="card-title"><?= "Employee" ?></h4>
							<p class="card-text"><?= count_users() ?></p>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-6 col-lg-7 col-sm-7 col-13">
			<a href="/reports">
				<div class="card dash-widget ctm-border-radius shadow-sm grow">
					<div class="card-body">
						<div class="card-icon bg-danger">
							<i class="fa fa-suitcase" aria-hidden="true"></i>
						</div>
						<div class="card-right">
							<h4 class="card-title">Leaves</h4>
							<p class="card-text"><?= count_pending_requests() ?></p>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="row">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Leaves Today</h4>
					<a href="javascript:void(0)" class="d-inline-block float-right text-primary">
						<i class="lnr lnr-sync"></i>
					</a>
				</div>
				<div class="card-body recent-activ">
					<?php
					require_once("models/admin.model.php");
					$leaveToday = get_leave_requests();

					foreach ($leaveToday as $leave) :
						$endDate = $leave["end_date"];
						if ($leave['status'] == 'Approved' && $endDate == date('Y-m-d')) :
							$last_name = $leave['last_name'];
							$first_name = $leave['first_name'];
							$imageSrc = 'data:image/jpeg;base64,' . base64_encode($leave['image_data']);
							$leave_type = $leave['leave_type'];
					?>
							<div class="recent-comment">
								<a href="javascript:void(0)" class="dash-card text-dark">
									<div class="dash-card-container">
										<div class="dash-card-icon text-pink">
											<i class="fa fa-address-card-o" aria-hidden="true"></i>
										</div>
										<div class="dash-card-content">
											<div class="card-info ml-3">
												<span class="info-label">Name:</span>
												<span class="info-value"><?= $first_name . " " . $last_name ?></span>
											</div>
											<div class="card-info ml-5">
												<span class="info-label">End Date:</span>
												<span class="info-value"><?= $endDate ?></span>
											</div>
											<div class="card-info ml-5">
												<span class="info-label">Leave Type:</span>
												<span class="info-value"><?= $leave_type ?></span>
											</div>
										</div>
										<div class="dash-card-avatars">
											<div class="e-avatar" style="width: 50px; height: 50px;">
												<img src="<?= $imageSrc ?>" alt="user avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px;" />
											</div>
										</div>
									</div>
								</a>
								<hr>
							</div>
					<?php
						endif;
					endforeach;
					?>
				</div>
			</div>
		</div>
		<div class="row-1">
		</div>
	</div>

	<!-- Chart -->
	<div class="row">
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm flex-fill grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Total Employees</h4>
				</div>
				<div class="card-body">
					<canvas id="pieChart"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm flex-fill grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Total Salary By Unit</h4>
				</div>
				<div class="card-body">
					<canvas id="lineChart"></canvas>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(function() {
			// Pie Chart
			var ctx = document.getElementById('pieChart').getContext('2d');
			var pieChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: <?= json_encode(array_values(($get_positions))) ?>,
					datasets: [{
						label: '# of Votes',
						data: <?= json_encode(array_values($count_users_by_position)) ?>,
						backgroundColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							// 'rgba(153, 102, 255, 1)',
							// 'rgba(153, 102, 255, 1)',
							// 'rgba(153, 102, 255, 1)',
							'#3E007C',
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					legend: {
						display: false
					}
				}
			});

			// Line Chart

			var ctx = document.getElementById("lineChart").getContext('2d');
			var lineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May"],
					datasets: [{
							label: 'Developer',
							data: [20, 10, 5, 5, 20],
							fill: false,
							borderColor: '#373651',
							backgroundColor: '#373651',
							borderWidth: 1
						},
						{
							label: 'Marketing',
							data: [2, 2, 3, 4, 1],
							fill: false,
							borderColor: '#E65A26',
							backgroundColor: '#E65A26',
							borderWidth: 1
						},
						{
							label: 'Marketing',
							data: [1, 3, 6, 8, 10],
							fill: false,
							borderColor: '#a1a1a1',
							backgroundColor: '#a1a1a1',
							borderWidth: 1
						}
					]
				},
				options: {
					responsive: true,
					legend: {
						display: false
					}
				}
			});
		});
	</script>