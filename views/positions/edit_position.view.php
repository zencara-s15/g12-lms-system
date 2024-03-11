<div class="col-xl-9 col-lg-8 col-md-12">
	<div class="row">
		<div class="col-md-12 row-4 col-sm-12 d-flex">
			<div class="card add-team flex-fill ctm-border-radius shadow-sm grow" style="height: 500px;">
				<div class="card-header">
					<h3 class="m-0 font-weight-bold text-primary">Edit Positions</h3>
				</div>
				<div class="card-body">
					<form action="../../controllers/positions/update_position.controller.php" method="post" name="add_form">
						<input type="hidden" value="<?= $data['id'] ?>" name="id">
						<div class="form-group">
							<label for="exampleInputTitle">Position Name</label>
							<input type="text" class="form-control" id="input" placeholder="Enter Position Name" name="position" value="<?= $data['position'] ?>" title="Please enter a position" required>
						</div>
						<div class="form-group">
							<label for="selectbox">Select department</label>
							<select id="department_id" name="department_id" class="form-control" title="Please select a department" required>
								<option disabled selected>Choose department</option>
								<?php $get_departments = get_departments(); ?>
								<?php foreach ($get_departments as $department) : ?>
									<option value="<?= $department['id']; ?>" <?= ($department['id'] == $data['department_id']) ? 'selected' : ''; ?>><?= $department['department']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group" style="margin-left: 350px; margin-top: 150px">
							<button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white float-center">Update</button>
							<a href="/departments" class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="button">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>