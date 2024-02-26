<div class="col-xl-9 col-lg-8 col-md-12 position-relative">
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
                        <input type="text" name="search_employee" id="search_employee" placeholder="Search employee..." class="form-control" />
                    </div>
                    <!-- filter -->
                    <div class="col-md-4 mb-2">
                        <select id="position" name="position" class="custom-select  border-dark" tile="Please select the position of the employee." required>
                            <option value="" selected disabled>Choose Position</option>
                            <?php $get_positions = get_positions(); ?>
                            <?php foreach ($get_positions as $position) :  ?>
                                <option value="<?= $position['id']; ?>"><?= $position['position']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- add employee button -->
                    <div class="col-md-2 mb-2">
                        <a href="/create_employee" class="btn btn-primary ">Add</a>
                    </div>
                </div>
            </div>
            <br>

            <!-- Table to Show All Employees -->
            <table class="table table-hover">
                <thead class="table-dark ">
                    <th scope="col">Full Name</th>
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
                    <?php foreach ($get_employees_with_positions as $employee) : ?>
                        <tr class="border-bottom" style="font-size:14px">
                            <td class="d-flex" style="text-align: center; vertical-align: middle;">
                                <img style="width: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="<?= 'data:image/jpeg;base64,' . base64_encode($employee['image_data']) ?>" />
                                <span class="mt-3 m-lg-3"><?= $employee['first_name'] . " " . $employee['last_name'] ?></span>
                            </td>
                            <td style="vertical-align: middle;"><?= $employee['email'] ?></td>
                            <td style="vertical-align: middle;"><?= $employee['position'] ?></td>
                            <td style="vertical-align: middle;">
                                <a href="/update_employee?id=<?= $employee['id']; ?>" class="btn  btn-success" style="font-size:13px">Update</a>
                                <a href="#" onclick="openDeleteModal(<?php echo $employee['id']; ?>)" class="btn btn-danger border border-0" style="font-size:13px">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger border border-0 " id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

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
</script>