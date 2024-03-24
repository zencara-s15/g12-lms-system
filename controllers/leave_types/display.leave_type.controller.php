<?php 

require "../../database/database.php";
require_once "../../models/admin.model.php";

?>
<?php
$leave_types = get_leave_types();
foreach ($leave_types as $key => $leave_type) : ?>
    <tr>
        <td class="d-none"><?= $leave_type['id'] ?></td>
        <td><?= $leave_type['leave_type'] ?></td>
        <td>
            <div class="team-action-icon float-right">
                <span data-toggle="modal" data-target="#edit_position">
                    <button id="edit_leave_type" class="btn btn-theme ctm-border-radius text-white" data-id="<?= $leave_type['id'] ?>" data-placement="bottom" style="height:40px" title="Edit"><i class="fa fa-pencil"></i></button>
                </span>
                <span data-toggle="modal" data-target="#delete">
                    <button id="delete_leave_type" class="btn btn-theme ctm-border-radius text-white delete-leave-type" data-placement="bottom" data-id="<?= $leave_type['id'] ?>" style="height:40px" title="Delete"><i class="fa fa-trash"></i></button>
                </span>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
