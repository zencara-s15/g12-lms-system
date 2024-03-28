<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<script src="/vendor/js/employee.js"></script>
<div class="col-xl-9 col-lg-8 col-md-12 position-relative grow">
    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Employee Management</h3>
            <p class="mt-1">Total Employees : <strong class="text-danger "><?php echo count_users(); ?></strong></p>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row align-items-center">
                    <!-- search box -->
                    <div class="col-md-6 mb-2">
                        <input type="text" name="search_employee" id="search_employee" placeholder="Search employee by name.." class="form-control border border-dark  " />
                    </div>
                    <!-- filter -->
                    <div class="col-md-4 mb-2">
                        <select id="position" name="position" class="custom-select  border-dark" tile="Please select the position of the employee." required>
                            <option value="All">All Positions</option>
                            <?php $get_positions = get_positions(); ?>
                            <?php foreach ($get_positions as $position) :  ?>
                                <option value="<?= $position['position']; ?>"><?= $position['position']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- add employee button -->
                    <div class="col-md-2 mb-2 d-flex justify-content-between">
                        <!-- <button class="btn btn-theme button-1 ctm-border-radius float-right" style="font-size:20px;">
                            <i class="material-icons">person</i>
                            <span class="=mb-2">Add</span>
                        </button> -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_employee_modal">
                            <i class="material-icons">person</i>
                            <span class="=mb-2">Add</span>
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <!-- Table to Show All Employees -->
                <table class="table table-hover text-nowrap ">
                    <thead class="table-dark ">
                        <th scope="col">Profile</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Position</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="employees_data">
                        <!-- display here -->
                    </tbody>
                </table>
                <div id="notFoundRow" class="text-center text-secondary d-none" style="height:40vh; display: flex; align-items: center; justify-content: center;">No employees found!</div>
            </div>
        </div>
    </div>
    <!-- Scroll Down Button -->
    <button id="scrollDownBtn" class="scroll-btn btn bg-secondary text-white float-right" style="font-size:20px; position: fixed;bottom: 20px; right: 20px; 
    z-index: 9999; /* Ensure it appears above other content */">
        <span class="material-symbols-outlined" style="margin-right: 14px; ">expand_more</span>
    </button>

    <!-- Scroll Up Button -->
    <button id="scrollUpBtn" class="scroll-btn btn bg-secondary text-white float-right" style="font-size:20px; position: fixed;bottom: 20px; right: 80px; z-index: 9999; ">
        <span class="material-symbols-outlined" style="margin-right: 14px;">expand_less</span>
    </button>
</div>

<!-- Insert employee modal -->
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
                Are you sure you want to delete this employee?
            </div>
            <div class="modal-footer">
                <button type="button" class=" btn btn-danger text-white ctm-border-radius" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-theme button-1 ctm-border-radius float-right" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- insert employee Modal -->
<div class="modal fade" id="create_employee_modal" tabindex="-1" role="dialog" aria-labelledby="insert_employee_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white" id="insert_employee_modal">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create_employee_form" method="post" id="form_add" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <!-- Profile Image -->
                                <div class="form-group text-center">
                                    <label for="employee-image" class="d-block">
                                        <input type="file" class="custom-file-input" id="employee-image" accept="image/*" onchange="previewImage(event)" name="profile" title="Please select an image for the employee profile." required>
                                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Employee Image" id="preview-image" class="img-fluid rounded-circle mb-3 border border-secondary" style="width: 200px; height: 200px; cursor: pointer;">
                                        <div class="invalid-feedback" id="image-error">Please select an image.</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- First Name -->
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" name="first_name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the first name of the employee. For example, 'John' or 'Mary Smith'." required>
                                    <div class="invalid-feedback">Please enter the correct first name. For example, 'John' or 'Mary Smith'.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Last Name -->
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the last name of the employee. For example, 'John' or 'Mary Smith'." required>
                                    <div class="invalid-feedback">Please enter the correct last name. For example, 'John' or 'Mary Smith'.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Gender -->
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="custom-select" title="Please select the gender of the employee." required>
                                        <option value="" selected disabled>Choose gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a gender.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Date of Birth -->
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="date_of_birth" title="Please select the date of birth of the employee." min="1970-01-01" max="2006-12-31" required>
                                    <div class="invalid-feedback">Please select a valid date of birth.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" pattern="[a-z]{2}[a-z0-9.@]*@gmail\.(com|org)" title="Please enter the email address of the employee." required>
                                    <div class="invalid-feedback">Please enter a valid email address. For example, 'example@gmail.com'.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="passwordInput" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%*])[A-Za-z\d!@#$%*]{8,20}$" title="Please enter a password (8-20 characters) with at least one letter, one number, and one special character (!@#$%*)." required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="passwordToggleBtn" onclick="togglePasswordVisibility()">
                                                <i id="passwordToggleIcon" class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- <small id="passwordHelpBlock" class="form-text text-muted">Enter a password (8-20 characters) with at least one letter, one number, and one special character (!@#$%*), and without spaces or emojis</small> -->
                                    <div class="invalid-feedback">Please enter a valid password.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Role -->
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="custom-select" title="Please select the role of the employee." required>
                                        <option value="2">User</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a role.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Position -->
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <select id="position" name="position" class="custom-select" title="Please select the position of the employee." required>
                                        <option value="" selected disabled>Choose Position</option>
                                        <?php $get_positions = get_positions(); ?>
                                        <?php foreach ($get_positions as $position) :  ?>
                                            <option value="<?= $position['id']; ?>"><?= $position['position']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a position.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- Amount of Leave -->
                                <div class="form-group">
                                    <label for="amount_leave">Amount of leave</label>
                                    <input type="number" class="form-control" name="amount_leave" id="amount_leave" title="The first leave for the employee (3/month)." min="3" max="3" value="3" required>
                                    <small class="form-text text-muted">The amount of leave for the employee (3/month)</small>
                                    <div class="invalid-feedback">Please enter the correct amount of leave.</div>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="/employees" class="btn btn-danger mr-2" id="cancelForm">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- update employee information modal -->
<?php
$get_employees_with_positions = get_employees_with_positions();
?>

<?php foreach ($get_employees_with_positions as $employee) { ?>
    <div class="modal fade" id="update_employee_modal<?= $employee["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="modal_detail_employeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!-- Use Bootstrap's responsive modal classes -->
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="modal_detail_employeeLabel">Update Employee's Information</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update_employee_form" method="post" id="form_add" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px;" enctype="multipart/form-data">
                        <div class="container">
                            <div class="form-group">
                                <input type="hidden" name="id" id="" value="<?= $employee['id']?>">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <!-- Profile Image -->
                                    <div class="form-group text-center">
                                        <label for="employee-image" class="d-block">
                                            <input type="file" class="custom-file-input " id="employee-image" accept="image/*" onchange="previewImage(event)" name="profile" title="Please select an image for the employee profile.">
                                            <img src="<?= isset($employee['image_data']) ? 'data:image/jpeg;base64,' . base64_encode($employee['image_data']) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'; ?>" alt="Employee Image" id="preview-image" class="img-fluid rounded-circle mb-3 border border-secondary" style="width: 200px; height: 200px; box-shadow: none; cursor: pointer;" onmouseover="this.style.boxShadow='none';" onmouseout="this.style.boxShadow='none';">
                                            <div class="invalid-feedback" id="image-error">Please select an image.</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- First Name -->
                                    <div class="form-group">
                                        <label for="first_name">First name</label>
                                        <input type="text" class="form-control" name="first_name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the first name of the employee. For example, 'John' or 'Mary Smith'." value="<?= $employee['first_name'] ?>" required>
                                        <div class="invalid-feedback">Please enter the correct first name. For example, 'John' or 'Mary Smith'.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Last Name -->
                                    <div class="form-group">
                                        <label for="last_name">Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" pattern="[A-Z][A-Za-z]*(\s[A-Za-z]*){0,3}" title="Please enter the last name of the employee. For example, 'John' or 'Mary Smith'." value="<?= $employee['last_name'] ?>" required>
                                        <div class="invalid-feedback">Please enter the correct last name. For example, 'John' or 'Mary Smith'.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Gender -->
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender" class="custom-select" title="Please select the gender of the employee." required>
                                            <option value="" selected disabled>Choose gender</option>
                                            <option value="Male" <?= ($employee['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?= ($employee['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>

                                        </select>
                                        <div class="invalid-feedback">Please select a gender.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Date of Birth -->
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="date_of_birth" title="Please select the date of birth of the employee." min="1970-01-01" max="2006-12-31" value="<?= $employee['dob'] ?>" required>
                                        <div class="invalid-feedback">Please select a valid date of birth.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" pattern="[a-z]{2}[a-z0-9.@]*@gmail\.(com|org)" title="Please enter the email address of the employee." value="<?= $employee['email'] ?>" required>
                                    <div class="invalid-feedback">Please enter a valid email address. For example, 'example@gmail.com'.</div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Role -->
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select id="role" name="role" class="custom-select" title="Please select the role of the employee." required>
                                            <option value="2">User</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a role.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Position -->
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <select id="position" name="position" class="custom-select" title="Please select the position of the employee." required>
                                            <?php $get_positions = get_positions(); ?>
                                            <?php foreach ($get_positions as $position) :  ?>
                                                <option value="<?= $position['id']; ?>"><?= $position['position']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">Please select a position.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- Amount of Leave -->
                                    <div class="form-group">
                                        <label for="amount_leave">Amount of leave</label>
                                        <input type="number" class="form-control" name="amount_leave" id="amount_leave" title="The first leave for the employee (3/month)." min="3" max="3" value="<?= $employee['amount_leave'] ?>" required>
                                        <small class="form-text text-muted">The amount of leave for the employee (3/month)</small>
                                        <div class="invalid-feedback">Please enter the correct amount of leave.</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal detail employee information -->
<?php
// call the function to retrieve all employees from the database
$get_employees_with_positions = get_employees_with_positions();
?>
<?php foreach ($get_employees_with_positions as $employee) { ?>
    <div class="modal fade" id="modal_detail_employee<?= $employee["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="modal_detail_employeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <!-- Use Bootstrap's responsive modal classes -->
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title text-white" id="modal_detail_employeeLabel">Employee's Information</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="">
                            <img src="<?= 'data:image/jpeg;base64,' . base64_encode($employee['image_data']) ?>" alt="Employee Image" class="img-fluid rounded-circle shadow-lg mb-4 shadow-none" style="width: 200px; height:200px;">
                        </div>
                        <div class="employee-details mt-3 ml-3">
                            <h3><?= $employee['first_name'] . " " . $employee['last_name'] ?></h3>
                            <h4 class="text-danger"><?= $employee['position'] ?></h4>
                            <p class="mt-2"><strong>Gender:</strong> <?= $employee['gender'] ?></p>
                            <p><strong>Date of Birth:</strong> <?= $employee['dob'] ?></p>
                            <p><strong>Email:</strong> <a href="mailto:<?= $employee['email'] ?>"><?= $employee['email'] ?></a></p>
                            <p><strong>Amount of Leave:</strong> <?= $employee['amount_leave'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteUserConfirmed">Delete</button>
            </div>
        </div>
    </div>
</div>


<!-- ------------------------------------------------------------------------------------------ -->
<!-- Alert Modal Success -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="material-icons text-success" style="font-size: 60px;">check_circle</i> <!-- Larger Success Icon -->
                </div>
                <p id="alertMessage" class="mb-0" style="font-size: 18px;"></p> <!-- Adjust font size and margin as needed -->
            </div>
        </div>
    </div>
</div>
<!-- Alert Modal Error -->
<div class="modal fade" id="errorAlertModal" tabindex="-1" role="dialog" aria-labelledby="errorAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="material-icons text-danger" style="font-size: 60px;">error</i> <!-- Google Error Icon -->
                </div>
                <p id="errorAlertMessage" class="mb-0" style="font-size: 18px;"></p> <!-- Adjust font size and margin as needed -->
            </div>
        </div>
    </div>
</div>


<!-- Modal​ detail -->

<script>
    // JavaScript function to open the delete confirmation modal
    function openDeleteModal(employeeId) {
        // Store the employeeId in the delete button's data attribute
        document.getElementById('confirmDeleteBtn').dataset.employeeId = employeeId;

        // Open the modal
        $('#confirmDeleteModal').modal('show');
    }

    // Event listener for the delete button in the modal
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        // Get the employeeId from the data attribute
        var employeeId = this.dataset.employeeId;

        // Redirect to the delete URL
        window.location.href = "/controllers/employees/delete.employee.controller.php?id=" + employeeId;
    });

    //search employee by name---------------------------------------------------------------------------------------------------
    let searchEmployee = document.getElementById('search_employee');
    let positionSelect = document.getElementById('position');
    let tbody = document.querySelector('tbody');
    let tr = tbody.querySelectorAll('tr');

    searchEmployee.addEventListener('input', function() {
        const searchText = searchEmployee.value.toLowerCase();
        let found = false;
        tr.forEach(row => {
            const tdContent = row.querySelectorAll('td')[1].textContent.toLowerCase(); // Get the text content of the first td in the row
            if (tdContent.includes(searchText)) {
                row.style.display = ''; // Show the row
                found = true;
            } else {
                row.style.display = 'none'; // Hide the row
            }
            // Toggle visibility of "Not found" message
            document.getElementById('notFoundRow').classList.toggle('d-none', found);
        });
    });
    // Filter the employee by position
    positionSelect.addEventListener('change', function() {
        const selectedPosition = positionSelect.value;

        let found = false; // Assume no employee is found initially

        tr.forEach(row => {
            const positionCell = row.querySelectorAll('td')[4]; // Assuming the position data is in the third column

            if (selectedPosition === "All" || positionCell.textContent === selectedPosition) {
                row.style.display = ''; // Show the row
                found = true; // Set found to true if at least one employee is found
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });

        // Show or hide the 'notFoundRow' based on the 'found' variable
        document.getElementById('notFoundRow').classList.toggle('d-none', found);
    });
    // scroll
    // Scroll Down Button Event Listener
    document.getElementById('scrollDownBtn').addEventListener('click', function() {
        window.scrollBy(0, window.innerHeight); // Scroll down by the height of the viewport
    });

    // Scroll Up Button Event Listener
    document.getElementById('scrollUpBtn').addEventListener('click', function() {
        window.scrollBy(0, -window.innerHeight); // Scroll up by the height of the viewport
    });
</script>