<div class="col-xl-9 col-lg-8  col-md-12 ">
	<div class="card shadow-sm ctm-border-radius grow ">
		<div class="card-header d-flex align-items-center justify-content-between">
			<h4 class="card-title mb-0 d-inline-block">Leave_requests</h4>
			<!-- <a href="create-review.html" class="btn btn-theme button-1 ctm-border-radius text-white float-right"><span></span> Create Review</a> -->
		</div>
	</div>

	<div class=" ctm-border-radius shadow-sm col-lg bg-white">
		<div class="card-body align-center">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table table-hover ">
								<thead class="">
									<tr>
										<th>Name</th>
										<th>Begin On</th>
										<th>Due By</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$get_leave_requests = get_leave_requests();
									foreach ($get_leave_requests as $data) : ?>
										<tr>
											<td>
												<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
												<h2><a href="employment.html"><?= $data["name"] ?></a></h2>
											</td>
											<td><?= $data["being_on"] ?></td>
											<td><?= $data["due_by"] ?></td>
											<td>
												<div class="status">
													<span class="btn
													 <?php
														$btn_color = "btn-primary";
														if ($data["status"] == "Approved") {
															$btn_color = "btn-success";
														} else {
															$btn_color = "btn-danger";
														}
														echo $btn_color;
														?> btn-sm">
														<?= $data["status"] ?></span>
												</div>
											</td>
											<td>
												<div class="table-action">
													<a href="../../controllers/leave_requests/leave_requests_accept.controller.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-success">
														<span class=""></span> Accept
													</a>
													<a href="../../controllers/leave_requests/leave_requests_refuse.controller.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-danger">
														<span class=""></span> Refuse
													</a>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
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