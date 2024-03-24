<!-- link boostrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="vendor/css/style.css">
<!-- end -->


<?php
// Load user profile data
require("controllers/profiles/form.profile.infor.controller.php");
?>


<div class="container">
	<div class="row justify-content-center mt-3 mb-3">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body p-4">
					<form action="../../controllers/profiles/update.profile.controller.php" method="post" enctype="multipart/form-data">
						<div class="profile-header text-center bg-primary p-5">
							<div class="profile-image-container">
								<img src="<?= $imageSrc ?>" alt="<?= $image_name ?>" id="preview-image" class="rounded-circle profile-image" style="width: 150px; height: 150px;">
								<div class="edit-icon-container">
									<label for="profile-image" class="update-profile-icon bg-circle "> <span class="material-symbols-outlined " style="margin-top: 3px;"> person_edit </span> </label>
									<input type="file" id="profile-image" name="profile" onchange="previewImage(event)" accept="image/*" style="display: none;">
								</div>
							</div>
							<h4 class="username" style="color: #fff; font-size: 28px; margin-top: 20px;"><?= $first_name ?></h4>
							<p class="text-white position" style="color: #fff; font-size: 18px; margin-top: 10px;"><?= $position ?></p>
							<p class="text-white font-size-sm" style="color: #fff; font-size: 14px;">Commercial Solution Company</p>
						</div>
						<div class="profile-details mt-4">
							<h3>Profile Information</h3>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group mt-3">
										<label for="id">ID</label>
										<input type="text" class="form-control" id="id" value="<?= $id ?>" readonly>
									</div>
									<div class="form-group mt-3">
										<label for="fullname">Full Name</label>
										<input type="text" class="form-control" id="fullname" value="<?= $first_name . ' ' . $last_name ?>" readonly>
									</div>
									<div class="form-group mt-3">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" value="<?= $email ?>" readonly>
									</div>
									<div class="form-group mt-3">
										<label for="gender">Gender</label>
										<input type="text" class="form-control" id="gender" value="<?= $gender ?>" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group mt-3">
										<label for="role">Role</label>
										<input type="text" class="form-control" id="role" value="<?= $role_id ?>" readonly>
									</div>
									<div class="form-group mt-3">
										<label for="schedule">Schedule Working</label>
										<input type="text" class="form-control" id="schedule" value="Mon-Fri" readonly>
									</div>
									<div class="form-group mt-3">
										<label for="address">Address</label>
										<input type="text" class="form-control" id="address" value="Phnom Penh" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-end">
							<button for="" class="btn btn-theme button-1 ctm-border-radius float-right" type="submit">Update</button>
							<a href="/admin" class="btn btn-danger text-white ctm-border-radius" style="margin-left: 20;">Cancel</a>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- for uplaod profile -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js" crossorigin="anonymous"></script>
	<script>
		function previewImage(event) {
			const reader = new FileReader();
			reader.onload = function() {
				const preview = document.getElementById('preview-image');
				preview.src = reader.result;
				document.getElementById('upload-image').classList.add('btn-success'); // Add the 'btn-success' class when the image is uploaded
			};
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>



	<!--  style button update profile -->
	<style>
		.bg-circle {
			display: inline-block;
			width: 40px;
			height: 40px;
			border-radius: 50%;
			text-align: center;
			line-height: 40px;
			border: wheat 1px solid;
			margin-left: 100px;
			margin-top: -30px;
			background-color: #eeeeee;

		}
	</style>