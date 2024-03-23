<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">
        <div class="col-md-5 row-4 col-sm-12 ">
            <div id="add_dp" class="card add-team flex-fill ctm-border-radius " style="height: 300px;">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add Department</h4>
                </div>

                <form class="card-body" action="controllers/departments/create.department.controller.php" method="post">
                    <div class="form-group mb-3">
                        <h5>Department</h5>
                        <input type="text" class="form-control" id="input" placeholder="Add" name='department_name'>
                    </div>
                    <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white float-center">Add</button>
                    <button class=" btn btn-danger text-white ctm-border-radius" onclick="clearAllInputs()" type="button" data-toggle="modal" id="btn_cancel" data-target="#addNewTeam">Cancel</button>
                </form>
            </div>
            <script>
                let output = document.getElementById('btn_cancel');

                function clearAllInputs(event) {
                    let allInputs = document.querySelectorAll('input');
                    allInputs.forEach(singleInput => singleInput.value = '');
                }
            </script>


        </div>

        <div class="col-md-7 col-sm-50 d-flex">
            <div class="card office-card flex-fill ctm-border-radius grow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="d-inline-block card-title mb-0">Department Name</h4>
                </div>
                <!-- Search box -->
                <div class="container">
                    <div class=" mb-2">
                        <input type="text" name="search_department" id="search_department" placeholder="Search department..." class="form-control border border-dark  " />
                    </div>
                </div>
                <table class="table table-hover ">
                    <thead>
                        <tr class="aline">
                            <th>Departments</th>
                            <th class="float-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $departments =  get_departments();
                        foreach ($departments as $data) :
                        ?>
                            <tr>
                                <td><?= $data['department'] ?></td>
                                <td>
                                    <div class="team-action-icon float-right">
                                        <span data-toggle="modal" data-target="#edit_position">
                                            <a href="/edit_department?id=<?= $data['id'] ?>" class="btn btn-theme ctm-border-radius text-white" style="height:40px"><i class="fa fa-pencil"></i></a>
                                        </span>
                                        <span data-toggle="modal" data-target="#delete">
                                            <a href="../../controllers/departments/delete.department.controller.php?id=<?= $data['id'] ?>" onclick="return confirm('Are you sure you want to delete Department <?= $data['department'] ?> ?')" class="btn btn-theme ctm-border-radius text-white" style="height:40px" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
                                        </span>
                                        <span data-toggle="modal" data-target="#delete">
                                            <a href="/positions?id=<?= $data['id'] ?>" data-placement="bottom" class="btn btn-theme ctm-border-radius text-white" style="height:40px" title="Delete"><i class="fa fa-eye"></i></a>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div id="notFoundRow" class="text-center text-secondary d-none" style="height:50vh; display: flex; align-items: center; justify-content: center;">No department found!</div>
            </div>
        </div>
    </div>
</div>

<script>
    //search department-----------------------------------------------------------------------------
    let search_department = document.getElementById('search_department');
    let tbody = document.querySelector('tbody');
    let tr = tbody.querySelectorAll('tr');
    search_department.addEventListener('input', function() {
        const searchText = search_department.value.toLowerCase();
        let found = false;

        tr.forEach(row => {
            const tdContent = row.querySelector('td').textContent.toLowerCase();
            if (tdContent.includes(searchText)) {
                row.style.display = ''; // Show the row if found
                found = true;
            } else {
                row.style.display = 'none'; // Hide the row if not found
            }
        });

        // Toggle visibility of "Not found" message based on whether any row is found
        document.getElementById('notFoundRow').classList.toggle('d-none', found);
    });
</script>