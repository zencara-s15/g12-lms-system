<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
                        <a href="/create_employee" class="btn btn-theme button-1 ctm-border-radius float-right" style="font-size:20px;">
                            <i class="material-icons">person</i>
                            <span class="=mb-2">Add</span>
                        </a>
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
                    <tbody>
                        <?php
                        // call the function to retrieve all employees from the database
                        $get_employees_with_positions = get_employees_with_positions();
                        ?>
                        <?php foreach ($get_employees_with_positions as $employee) :
                        ?>
                            <tr class="border-bottom" style="font-size:14px">
                                <td class="d-flex" style="text-align: center; vertical-align: middle;">
                                    <img style="width: 60px;height: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="<?= 'data:image/jpeg;base64,' . base64_encode($employee['image_data']) ?>" />
                                </td>
                                <td style="vertical-align: middle;"><?= $employee['first_name'] ?></td>
                                <td style="vertical-align: middle;"><?= $employee['last_name'] ?></td>
                                <td style="vertical-align: middle;"><a href="mailto:<?= $employee['email'] ?>"><?= $employee['email'] ?></a></td>

                                <td style="vertical-align: middle;"><?= $employee['position'] ?></td>
                                <td style="vertical-align: middle;">
                                    <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modal_detail_employee<?= $employee["id"] ?>">Detail</button>
                                    <a href="/update_employee?id=<?= $employee['id']; ?>" class="btn btn-sm btn-outline-success" style="font-size:13px">Update</a>
                                    <a href="#" onclick="openDeleteModal(<?php echo $employee['id']; ?>)" class="btn btn-sm btn-outline-danger" style="font-size:13px">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
<!-- Delete Confirmation Modal -->
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

<!-- Modal detail employee information -->
<?php foreach ($get_employees_with_positions as $employee) { ?>
    <div class="modal fade" id="modal_detail_employee<?= $employee["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="modal_detail_employeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered " style="max-width: 530px;" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title text-white " id="modal_detail_employeeLabel">Employee's Information</h4>
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
                            <h3><?= $employee['first_name']." ". $employee['last_name'] ?></h3>
                            <h4 class="text-danger "><?= $employee['position'] ?></h4>
                            <p class="mt-2"><strong>Gender:</strong> <?= $employee['gender'] ?></p>
                            <p><strong>Date of Birth:</strong> <?= $employee['dob'] ?></p>
                            <p><strong>Email:</strong> <a href="mailto:<?= $employee['email'] ?>" ><?= $employee['email'] ?></a></p>
                            <p><strong>Amount of Leave:</strong> <?= $employee['amount_leave'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


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