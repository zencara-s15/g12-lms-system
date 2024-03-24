<link rel="stylesheet" href="styles/leave_type.css">
<script src="vendor/js/leave_type.js"></script>

<div class="col-xl-9 col-lg-8 col-md-12">
	<div class="row">
		<div class=" col-sm-50 d-flex">
			<div class="card office-card flex-fill ctm-border-radius grow">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="d-inline-block card-title mb-0">Leave Types</h4>
				</div>
				<!-- Search box -->
				<div class="container">
					<div class="search-bar border-1 border-dark">
						<i class="material-icons search-icon">search</i>
						<input type="text" class="search-input " id="search_leave_type" name="search_leave_type" placeholder="Search leave type...">
					</div>
					<div class="button-group d-flex justify-content-end mt-3">
						<button type="button" class="btn btn-theme ctm-border-radius text-white d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#add_leave_type_modal">
							<i class="material-icons">add_circle</i>
							<span class="ml-1">Leave Type</span>
						</button>
					</div>

					<!-- Modal create leave type -->
					<div class="modal fade" id="add_leave_type_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<!-- Modal content -->
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add Leave Type</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<!-- Add leave type form content here -->
									<form method="post" id="add_leave_type_form">
										<div class="form-group">
											<label for="exampleInputPassword1">Leave Type</label>
											<input type="text" class="form-control" id="leave_type" placeholder="Enter Leave Type" name='leave_type' title="You forget enther the leave type" required>
										</div>
										<div class="button-group d-flex justify-content-end mt-5">
											<button type="button" class="btn btn-danger ctm-border-radius text-white" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn btn-theme ctm-border-radius text-white ml-2" id="update_department_btn">Add</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal update leave type -->
					<div class="modal fade" id="update_leave_type_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<!-- Modal content -->
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Update Leave Type</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="">
										<input type="hidden" id="update_leave_type_id" name="id">
										<div class="form-group">
											<label for="update_leave_type_name">Leave Type</label>
											<input type="text" class="form-control" id="update_leave_type_name" name="leave_type">
										</div>
										<div class="button-group d-flex justify-content-end mt-5">
											<button type="button" class="btn btn-danger ctm-border-radius text-white" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn btn-theme ctm-border-radius text-white ml-2" id="update_department_btn">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<table class="table table-hover ">
					<thead>
						<tr class="aline">
							<th>Leave Types</th>
							<th class="float-right">Action</th>
						</tr>
					</thead>
					<tbody id="leave_type_data">

					</tbody>
				</table>
				<div id="notFoundRow" class="text-center text-secondary d-none" style="height:50vh; display: flex; align-items: center; justify-content: center;">No leave type found!</div>
			</div>
		</div>
	</div>
</div>

<!-- Alert Modal Success -->
<div class="modal fade" id="alert_success_modal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body text-center p-4">
				<div class="d-flex align-items-center justify-content-center mb-3">
					<i class="material-icons text-success" style="font-size: 60px;">check_circle</i> <!-- Larger Success Icon -->
				</div>
				<p id="success_alert_message" class="mb-0" style="font-size: 18px;"></p> <!-- Adjust font size and margin as needed -->
			</div>
		</div>
	</div>
</div>
<!-- Alert Modal Error -->
<div class="modal fade" id="alert_error_modal" tabindex="-1" role="dialog" aria-labelledby="errorAlertModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body text-center p-4">
				<div class="d-flex align-items-center justify-content-center mb-3">
					<i class="material-icons text-danger" style="font-size: 60px;">error</i> <!-- Google Error Icon -->
				</div>
				<p id="error_alert_message" class="mb-0" style="font-size: 18px;"></p> <!-- Adjust font size and margin as needed -->
			</div>
		</div>
	</div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="delete_confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this leave type?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger ctm-border-radius text-white" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme ctm-border-radius text-white" id="delete_confirmed">Delete</button>
			</div>
		</div>
	</div>
</div>