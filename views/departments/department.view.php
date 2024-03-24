<link rel="stylesheet" href="styles/department.css">
<script src="vendor/js/department.js"></script>

<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">

        <div class=" col-sm-50 d-flex">
            <div class="card office-card flex-fill ctm-border-radius grow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="d-inline-block card-title mb-0">Department Name</h4>
                </div>
                <!-- Search box -->
                <div class="container">
                    <div class="search-bar border-1 border-dark w-95">
                        <i class="material-icons search-icon">search</i>
                        <input type="text" class="search-input " id="search_department" name="search_department" placeholder="Search department...">
                    </div>
                    <div class="button-group d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-theme ctm-border-radius text-white d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#add_department_modal">
                            <i class="material-icons">add_circle</i>
                            <span class="ml-1">Department</span></button><br />
                    </div>

                    <!-- Modal create department -->
                    <div class="modal fade" id="add_department_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="card-body" id="add_department_form" method="post">
                                        <div class="form-group mb-3">
                                            <label for="department_name">Department</label>
                                            <input type="text" class="form-control border-1 border-dark " id="department_name" placeholder="Add" name='department_name'>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger text-white ctm-border-radius" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-theme ctm-border-radius text-white">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal update department -->
                    <div class="modal fade" id="update_department_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Department</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="card-body" id="update_department_form" method="post">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group mb-3">
                                            <label for="department_name">Department</label>
                                            <input type="text" class="form-control border-1 border-dark" id="update_department_name" placeholder="Update" name="update_department_name">
                                        </div>
                                        <div class="button-group d-flex justify-content-end mt-5">
                                            <button type="button" class="btn btn-danger ctm-border-radius text-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn btn-theme ctm-border-radius text-white ml-2" id="update_department_btn">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover ">
                    <thead>
                        <tr class="aline">
                            <th>Departments</th>
                            <th class="float-right">Action</th>
                        </tr>
                    </thead>
                    <tbody id="department_data">
                        <!-- code here -->
                    </tbody>
                </table>
                <div id="notFoundRow" class="text-center text-secondary d-none" style="height:50vh; display: flex; align-items: center; justify-content: center;">No department found!</div>
            </div>
        </div>
    </div>
</div>

<!-- Alert Modal Success -->
<div class="modal fade" id="alert_success_modal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="material-icons text-success" style="font-size: 60px;">check_circle</i> <!-- Larger Success Icon -->
                </div>
                <p id="success_alert_message" class="mb-0" style="font-size: 18px;"></p> <!-- Adjust font size and margin as needed -->
            </div>
        </div>
    </div>
</div>
<!-- Alert Modal Error -->
<div class="modal fade" id="alert_error_modal" tabindex="-1" role="dialog" aria-labelledby="errorAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="material-icons text-danger" style="font-size: 60px;">error</i> <!-- Google Error Icon -->
                </div>
                <p id="error_alert_message" class="mb-0" style="font-size: 18px;"></p> <!-- Adjust font size and margin as needed -->
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="delete_confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this department?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger ctm-border-radius text-white" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-theme ctm-border-radius text-white" id="delete_confirmed">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Select the table body
    const tbody = document.getElementById('department_data');
    document.getElementById('search_department').addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        Array.from(tbody.children).forEach(row => {
            const departmentName = row.cells[1].textContent.toLowerCase();
            row.style.display = departmentName.includes(searchText) ? '' : 'none';
        });
        document.getElementById('notFoundRow').classList.toggle('d-none', Array.from(tbody.children).some(row => row.style.display !== 'none'));
    });
</script>