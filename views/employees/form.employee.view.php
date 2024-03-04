<!-- Employee Management -->
<div class="col-xl-9 col-lg-8 col-md-12 position-relative">
    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Add Employee</h3>
        </div>
        <div class="card-body">
            <!-- form the create employee -->
            <form action="controllers/employees/create.employee.controller.php" method="post" id="form_add" style="background-color: #fff; padding: 20px; border-radius: 5px; width:100%" enctype="multipart/form-data">
                <!-- profile -->
                <div class="form-group text-center">
                    <label for="employee-image" class="d-block">
                        <input type="file" class="custom-file-input " id="employee-image" accept="image/*" onchange="previewImage(event)" name="profile" title="Please select an image for the employee profile." required>
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Employee Image" id="preview-image" class="img-fluid rounded-circle mb-3 border border-secondary" style="width: 200px; height: 200px; box-shadow: none; cursor: pointer;" onmouseover="this.style.boxShadow='none';" onmouseout="this.style.boxShadow='none';">
                        <div class="invalid-feedback" id="image-error">Choose select an image.</div>
                    </label>
                </div>

                <!-- name -->
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control border-dark" name="first_name" placeholder="First name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the first name of the employee. For example, 'John' or 'Mary Smith'." required>
                    <div class="invalid-feedback">Please enter the correct first name. For example, 'John' or 'Mary Smith'.</div>
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control border-dark " name="last_name" id="last_name" placeholder="Last name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the last name of the employee. For example, 'John' or 'Mary Smith'." required>
                    <div class="invalid-feedback">Please enter correct the last name. For example, 'John' or 'Mary Smith'.</div>
                </div>
                <!-- genders -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="custom-select  border-dark" title="Please select the gender of the employee." required>
                        <option value="" selected disabled>Choose gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="invalid-feedback">Please select a gender.</div>
                </div>
                <!-- date of birth -->
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control border-dark " id="dob" name="date_of_birth" title="Please select the date of birth of the employee." min="1970-01-01" max="2006-12-31" required>
                    <div class="invalid-feedback">Please select a your date of birth.</div>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control border-dark " name="email" placeholder="example@gmail.com" pattern="[a-z]{2}[a-z0-9.@]*@gmail\.(com|org)" title="Please enter the email address of the employee." required>
                    <div class="invalid-feedback">Please enter correct the email. For example, 'example@gmail.com'.</div>
                </div>
                <!-- password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control border-dark " name="password" id="passwordInput" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%*])[A-Za-z\d!@#$%*]{8,20}$" title="Please Enter password correct" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary shadow-none border" type="button" id="passwordToggleBtn" onclick="togglePasswordVisibility()">
                                <i id="passwordToggleIcon" class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted">Enter a password (8-20 characters) with at least one letter, one number, and one special character (!@#$%*), and without spaces or emojis</small>
                    <div class="invalid-feedback">Please enter a valid password.</div>
                </div>
                <!-- role -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="custom-select border-dark" title="Please select the role of the employee." required>
                        <option value="2">User</option>
                    </select>
                    <div class="invalid-feedback">Please select a role.</div>
                </div>
                <!--position  -->
                <div class="form-group">
                    <label for="position">Position</label>
                    <select id="position" name="position" class="custom-select  border-dark" tile="Please select the position of the employee." required>
                        <option value="" selected disabled>Choose Position</option>
                        <?php $get_positions = get_positions(); ?>
                        <?php foreach ($get_positions as $position) :  ?>
                            <option value="<?= $position['id']; ?>"><?= $position['position']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Please select a position.</div>
                </div>
                
                <div class="form-group">
                    <label for="amount_leave">Amount of leave</label>
                    <input type="number" class="form-control border-dark" name="amount_leave" id="amount_leave" title="The first leave for the employee (3/month)." min="3" max="3" value="3" required>
                    <small>The amount of leave for the employee (3/month)</small><br />
                    <div class="invalid-feedback">Please enter the correct amount of leave.</div>
                </div>
                <!-- button cancel and create -->
                <div class="form-group">
                    <a href="/employees" class="btn btn-danger border border-0" id="cancelForm">Cancel</a>
                    <button type="submit" class="btn btn-primary" onclick="validateForm()">Add Employee</button>
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