<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-md-12 row-4 col-sm-12 d-flex">
			<div class="card add-team flex-fill ctm-border-radius shadow-sm grow" style="height: 300px;">
				<div class="card-header">
					<h4 class="card-title mb-0">Edit Leave Types</h4>
				</div>
				<div class="card-body">
					<form action="../../controllers/leave_types/form_update.controller.php" method="post" name="add_form">
						<input type="hidden" value="<?= $data['id']?>" name="id">
						<div class="form-group">
							<label for="exampleInputPassword1">Leave Type</label>
							<input type="text" class="form-control" id="input" placeholder="Enter Leave" value="<?= $data['leave_type'] ?>" name="leave_type" require>
						</div>
						<div class="form-group">
							<button class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="submit" data-target="#addNewTeam">Update</button>
							<a href="/leave_types" class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="button">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>