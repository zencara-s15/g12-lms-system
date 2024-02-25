<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-md-12 row-12 col-sm-12 d-flex">
			<div class="card add-team flex-fill ctm-border-radius shadow-sm grow" style="display:block; height: 300px;">
				<div class="card-header">
					<h4 class="card-title mb-0">Edit department Type</h4>
				</div>
				<div class="card-body">
					

					<form action="controllers/departments/update.deparment.controller.php" method="post">
						<input type="text" value="<?= $data['id'] ?>" name="id">
						<div class="form-group">
							<label for="exampleInputPassword1">department Type</label>
							<input type="text" class="form-control" id="exampleInputLeave Type Name" placeholder="Enter department" value="<?= $data['department'] ?>" name="department_name" require>
						</div>
						<div class="form-group">
							<button class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="submit" data-toggle="modal" data-target="#addNewTeam">Update</button>
							<button class="btn btn-theme button-1 ctm-border-radius text-white float-center" id="btn-cancle" type="button" data-toggle="modal" data-target="#addNewTeam">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>