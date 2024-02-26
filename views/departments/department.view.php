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
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add" name='department_name'>
                    </div>
                    <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white float-center">Add</button>
                    <button class="btn btn-theme button-1 ctm-border-radius text-white float-center" type="button" data-toggle="modal" data-target="#addNewTeam">Cancel</button>
                </form>
            </div>
    </div>

    <div class="col-md-7 col-sm-50 d-flex">
        <div class="card office-card flex-fill ctm-border-radius grow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block card-title mb-0">Department Name</h4>
            </div>
            <table class="table table-hover ">
                <thead>
                    <tr class="aline">
                        <th>department type Name</th>
                        <th class="float-right">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $departments =  get_departments();
                    foreach ($departments as $data) :
                    ?>
                        <tr>
                            <td><?=$data['department'] ?></td>
                            <td>
                                <div class="team-action-icon float-right">
                                    <span data-toggle="modal" data-target="#edit_position">
                                        <a href="/edit_department?id=<?=$data['id'] ?>" class="btn btn-theme ctm-border-radius text-white"><i class="fa fa-pencil"></i></a>
                                    </span>
                                    <span data-toggle="modal" data-target="#delete">
                                        <a href="../../controllers/departments/delete.department.controller.php?id=<?= $data['id'] ?>" 
										onclick="return confirm('Are you sure you want to delete Department <?=$data['department'] ?> ?')" class="btn btn-theme ctm-border-radius text-white" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>

</script>