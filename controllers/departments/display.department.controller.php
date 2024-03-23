<?php 
require "../../database/database.php";
require_once "../../models/admin.model.php";

$departments =  get_departments();
foreach ($departments as $data) :
?>
    <tr>
        <td class="d-none"><?= $data['id'] ?></td>
        <td><?= $data['department'] ?></td>
        <td>
            <div class="team-action-icon float-right">
                <span data-toggle="modal" data-target="#edit_position">
                    <button  id="update_department" class="btn btn-theme ctm-border-radius text-white" style="height:40px" data-placement="bottom" data-id="<?= $data['id'] ?>" title="Delete"><i class="fa fa-pencil"></i></button>
                </span>
                <span data-toggle="modal" data-target="#delete">
                <button  id="delete_department" class="btn btn-theme ctm-border-radius text-white" style="height:40px" data-placement="bottom" data-id="<?= $data['id'] ?>" title="Delete"><i class="fa fa-trash"></i></button>
                </span>
                <span data-toggle="modal" data-target="#delete">
                    <a href="/positions?id=<?= $data['id'] ?>" data-placement="bottom" class="btn btn-theme ctm-border-radius text-white" style="height:40px" title="Delete"><i class="fa fa-eye"></i></a>
                </span>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
