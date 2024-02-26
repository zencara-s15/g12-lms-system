<!----form add leave type--->
<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-md-5 row-4 col-sm-12 d-flex">
			<div class="card add-team flex-fill ctm-border-radius shadow-sm grow" style="height: 300px;">
				<div class="card-header">
					<h4 class="card-title mb-0">Add Leave Type</h4>
				</div>
				<div class="card-body">
					<form action="../../controllers/leave_types/form_save.controller.php" method="post" name="add_form">
						<div class="form-group">
							<label for="exampleInputPassword1">Leave Type</label>
							<input type="text" class="form-control" id="input" placeholder="Enter Leave Type" name='leave_type' title="You forget enther the leave type" required>
						</div>
						<div class="form-group">
							<button class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="submit" data-target="#addNewTeam">Add</button>
							<button class="btn btn-theme button-1 ctm-border-radius text-white float-center" onclick=" clearAllInputs()" id="btn_cencle" type="button" data-target="#addNewTeam">Cancel</button>
						</div>
					</form>
				</div>
			</div>
			<script>
				let output = document.getElementById('btn_cancle');

				function clearAllInputs(event) {
					let allInputs = document.querySelectorAll('input');
					allInputs.forEach(singleInput => singleInput.value = '');
				}
			</script>
		</div>

		<!----table of leave type --->
		<div class="col-md-7 col-sm-50 d-flex">
			<div class="card office-card flex-fill ctm-border-radius shadow-sm grow">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="d-inline-block card-title mb-0">Leave Types Lists</h4>
				</div>
				<table class="table table-hover">
					<thead>
						<tr class="aline">
							<th>Leave Type</th>
							<th class="float-right">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$leave_types = getleave_types();
						foreach ($leave_types as $key => $leave_type) : ?>
							<tr>
								<td><?= $leave_type['leave_type'] ?></td>
								<td>
									<div class="team-action-icon float-right">
										<span data-toggle="modal" data-target="#edit_position">
											<a href="/edit_leave_type?id=<?= $leave_type['id'] ?>" class="btn btn-theme ctm-border-radius text-white " data-placement="bottom" style="height:40px" title="Edit"><i class="fa fa-pencil"></i></a>
										</span>
										<span data-toggle="modal" data-target="#delete">
										<a href="#" onclick="openDeleteModal(<?php echo $leave_type['id']; ?>)" class="btn btn-theme ctm-border-radius text-white" data-placement="bottom" style="height:40px" title="Delete"><i class="fa fa-trash"></i></a>
										</span>
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

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Are you sure you want to delete this leave_type?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-theme ctm-border-radius text-white" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white" id="confirmDeleteBtn">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Delete Confirmation Modal -->
	<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div>
					Are you sure you want to delete this employee?
				</div>
				<div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger border border-0 " id="confirmDeleteBtn">Delete</button>

				</div>
			</div>
		</div>
	</div>

	<script>
		function openDeleteModal(employeeId) {
			document.getElementById('confirmDeleteBtn').dataset.employeeId = employeeId;
			// Open the modal
			$('#confirmDeleteModal').modal('show');
		}
		document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
			let employeeId = this.dataset.employeeId;
			// Redirect to the delete URL
			window.location.href = "/controllers/leave_types/form_delete.controller.php?id=" + employeeId;
		});
	</script>