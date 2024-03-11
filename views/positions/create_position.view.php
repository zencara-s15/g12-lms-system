<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-md-12 row-4 col-sm-12 d-flex">
			<div class="card add-team flex-fill ctm-border-radius shadow-sm grow" style="height: 500px;">
				<div class="card-header">
					<h3 class="m-0 font-weight-bold text-primary">Add Positions</h3>
				</div>
				<div class="card-body">
					
					<form action="controllers/positions/create_position.php" method="post" name="add_form">
						<div class="form-group">
							<label for="exampleInputTitle">Position Name</label>
							<input type="text" class="form-control" id="input" placeholder="Enter Position Name" name="position" title="You forget choose position" required>
						</div>
						<div class="form-group">
							<label for="selectbox">Select department</label>
							<select id="departmet" name="department_id" class="form-control " tile="Please select the position" required>
								<option>Choose department</option>
								<?php $get_departments = get_departments(); ?>
								<?php foreach ($get_departments as $department) :  ?>
									<option value="<?= $department['id']; ?>"><?= $department['department']; ?></option>
								<?php endforeach; ?>
							</select>

						</div>

						<div class="form-group" style="margin-left: 350px; margin-top: 150px">
							<button class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="submit" data-target="#addNewTeam">Add New</button>
							<a href="/departments" class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="button">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>