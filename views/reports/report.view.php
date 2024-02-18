<div class="col-xl-9 col-lg-8  col-md-12">

	<div class="card shadow-sm ctm-border-radius grow">
		<div class="card-body align-center">
			<div class="row filter-row">
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
						<select class="form-control select">
							<option selected>Start Date</option>
							<option>Date Of Birth</option>
							<option>Created At</option>
							<option>Leaving Date</option>
							<option>Visa Expiry Date</option>
						</select>

					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
						<input type="text" class="form-control datetimepicker" placeholder="From">
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
						<input type="text" class="form-control datetimepicker" placeholder="To">
					</div>
				</div>

				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<a href="#" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Apply Filter </a>
				</div>
			</div>
		</div>
	</div>

	<div class=" ctm-border-radius shadow-sm col-lg bg-white">
		<div class="card-body align-center">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table table-hover">
								<thead class="">
									<tr>
										<th>Employee Name</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Number of Days</th>
										<th>Leave Type</th>
										<th>Reason</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>John Doe</td>
										<td>2024-02-10</td>
										<td>2024-02-15</td>
										<td>6</td>
										<td>Annual Leave</td>
										<td>Vacation</td>
										<td>
											<a href="../../controllers/leave_requests/leave_requests_accept.controller.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-success"><span class=""></span>Details</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>
