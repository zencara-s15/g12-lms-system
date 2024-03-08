<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!--  require from profile to caught real data from users who are login is -->
<?php require("controllers/profiles/form.profile.infor.controller.php"); ?>

<div class="container">
	<div class="row justify-content-center mt-3">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="profile-header text-center">
						<img src="<?= $imageSrc ?>" alt="Admin" class="rounded-circle profile-image">
						<h4 class="username"><?= $first_name ?></h4>
						<p class="text-secondary position"><?= $position ?></p>
						<p class="text-muted font-size-sm">Commercial Solution Company</p>
					</div>
					<div class="profile-details mt-4">
						<h5>Profile Information</h5>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="id">ID</label>
									<input type="text" class="form-control" id="id" value="<?= $id ?>" readonly>
								</div>
								<div class="form-group">
									<label for="fullname">Full Name</label>
									<input type="text" class="form-control" id="fullname" value="<?= $first_name . " " . $last_name ?>" readonly>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" value="<?= $email ?>" readonly>
								</div>
								<div class="form-group">
									<label for="gender">Gender</label>
									<input type="text" class="form-control" id="gender" value="<?= $gender ?>" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="role">Role</label>
									<input type="text" class="form-control" id="role" value="<?= $role_id ?>" readonly>
								</div>
								<div class="form-group">
									<label for="department">Department</label>
									<input type="text" class="form-control" id="department" value="<?= $department ?>" readonly>
								</div>
								<div class="form-group">
									<label for="schedule">Schedule Working</label>
									<input type="text" class="form-control" id="schedule" value="Mon-Fri" readonly>
								</div>
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" class="form-control" id="address" value="Phnom Penh" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--  style for transition in profile -->
<style>
	.profile-header {
		margin-bottom: 20px;
	}

	.profile-image {
		width: 150px;
		height: 150px;
		object-fit: cover;
	}

	.username {
		margin-top: 10px;
		margin-bottom: 5px;
	}

	.position {
		margin-bottom: 10px;
	}

	.profile-details {
		animation: fade-in 0.5s;
	}

	@keyframes fade-in {
		from {
			opacity: 0;
			transform: translateY(20px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}
</style>