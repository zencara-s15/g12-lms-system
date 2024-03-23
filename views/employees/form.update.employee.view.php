<!-- Employee Management -->
<div class="col-xl-9 col-lg-8 col-md-12 position-relative grow">
    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Update Employee</h3>
        </div>
        <div class="card-body">
            <!-- form to update employee -->
            <form action="controllers/employees/update.employee.controller.php" method="post" id="form_add" style="background-color: #fff; padding: 20px; border-radius: 5px; width:100%" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" id="" value="<?= $id ?>">
                </div>
                <div class="form-group text-center">
                    <label for="employee-image" class="d-block">
                        <input type="file" class="custom-file-input " id="employee-image" accept="image/*" onchange="previewImage(event)" name="profile" title="Please select an image for the employee profile.">
                        <img src="<?= isset($get_employee['image_data']) ? 'data:image/jpeg;base64,' . base64_encode($get_employee['image_data']) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'; ?>" alt="Employee Image" id="preview-image" class="img-fluid rounded-circle mb-3 border border-secondary" style="width: 200px; height: 200px; box-shadow: none; cursor: pointer;" onmouseover="this.style.boxShadow='none';" onmouseout="this.style.boxShadow='none';">
                        <div class="invalid-feedback" id="image-error">Please select an new image.</div>
                    </label>
                </div>
                <!-- name  -->
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control border-dark" name="first_name" placeholder="First name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the last name of the employee. For example, 'John' or 'Mary Smith'." value="<?= $get_employee['first_name']; ?>" required>
                    <div class="invalid-feedback">Please enter the correct first name. For example, 'John' or 'Mary Smith'.</div>
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control border-dark " name="last_name" id="last_name" placeholder="Last name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the last name of the employee. For example, 'John' or 'Mary Smith'." value="<?= $get_employee['last_name']; ?>" required>
                    <div class="invalid-feedback">Please enter correct the last name. For example, 'John' or 'Mary Smith'.</div>
                </div>
                <!-- gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="custom-select  border-dark" title="Please select the gender of the employee." required>
                        <option value="" disabled>Select Gender</option>
                        <option value="Male" <?= ($get_employee['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?= ($get_employee['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                    <div class="invalid-feedback">Please select a gender.</div>
                </div>
                <!-- date of birth -->
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control border-dark " id="dob" name="date_of_birth" title="Please select the date of birth of the employee." min="1970-01-01" max="2006-12-31" value="<?= $get_employee['dob']; ?>" required>
                    <div class="invalid-feedback">Please select a employee date of birth.</div>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control border-dark " name="email" placeholder="example@gmail.com" pattern="[a-z]{2}[a-z0-9.@]*@gmail\.(com|org)" title="Please enter the email address of the employee." value="<?= $get_employee['email']; ?>" required>
                    <div class="invalid-feedback">Please enter correct the email. For example, 'example@gmail.com'.</div>
                </div>
                <!-- role -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="custom-select border-dark" title="Please select the role of the employee." required>
                        <option value="2">User</option>
                    </select>
                    <div class="invalid-feedback">Please select a role.</div>
                </div>
                <!-- position -->
                <div class="form-group">
                    <label for="position">Position</label>
                    <select id="position" name="position" class="custom-select  border-dark" tile="Please select the position of the employee." required>
                        <option value="" selected disabled>Choose Position</option>
                        <?php $get_positions = get_positions(); ?>
                        <?php foreach ($get_positions as $position) :  ?>
                            <option value="<?= $position['id']; ?>" <?= ($position['id'] == $get_employee['position_id']) ? 'selected' : ''; ?>><?= $position['position']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Please select a position.</div>
                </div>
                <!-- leave -->
                <div class="form-group">
                    <label for="amount_leave">Amount of leave</label>
                    <input type="number" class="form-control border-dark" name="amount_leave" id="amount_leave" title="The amount of leave for the employee (3/month)" min="1" max="3" value="<?= $get_employee['amount_leave']; ?>" required>
                    <small>The amount of leave for the employee (3/month)</small><br />
                    <div class="invalid-feedback">Please enter the correct amount of leave.</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-theme button-1 ctm-border-radius float-right " style="margin-right: 80%;" onclick="validateForm()">Update</button>
                    <a href="/employees" class=" btn btn-danger text-white ctm-border-radius" id="cancelForm">Cancel</a>

                </div>
            </form>
            <hr>
        </div>
    </div>
</div>

<script>
    // use to show image when choose image
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('preview-image');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    //function add class to form for validation the inputs
    function validateForm() {
        let form = document.querySelector('#form_add');
        form.classList.add('was-validated');

    }
    //function use ot show and hide the password
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('passwordInput');
        var passwordToggleIcon = document.getElementById('passwordToggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggleIcon.classList.remove('fa-eye');
            passwordToggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordToggleIcon.classList.remove('fa-eye-slash');
            passwordToggleIcon.classList.add('fa-eye');
        }

    }
</script>