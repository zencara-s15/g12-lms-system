<?php
require_once("../../../database/database.php");
require_once("../../../models/admin.model.php");
// get the employee with positions

?>
<?php
// call the function to retrieve all employees from the database
$get_employees_with_positions = get_employees_with_positions();
?>
<?php foreach ($get_employees_with_positions as $employee) :
?>
    <tr class="border-bottom" style="font-size:14px">
        <td class="d-none" style="vertical-align: middle;"><?= $employee['id'] ?></td>
        <td class="d-flex" style="text-align: center; vertical-align: middle;">
            <img style="width: 60px;height: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="<?= 'data:image/jpeg;base64,' . base64_encode($employee['image_data']) ?>" />
        </td>
        <td style="vertical-align: middle;"><?= $employee['first_name'] ?></td>
        <td style="vertical-align: middle;"><?= $employee['last_name'] ?></td>
        <td class="d-none" style="vertical-align: middle;"><?= $employee['gender'] ?></td>
        <td class="d-none" style="vertical-align: middle;"><?= $employee['dob'] ?></td>
        <td style="vertical-align: middle;"><a href="mailto:<?= $employee['email'] ?>"><?= $employee['email'] ?></a></td>

        <td style="vertical-align: middle;"><?= $employee['position'] ?></td>
        <td class="d-none" style="vertical-align: middle;"><?= $employee['amount_leave'] ?></td>
        <td style="vertical-align: middle;">
            <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modal_detail_employee<?= $employee["id"] ?>">Detail</button>
            <!-- <button class="btn btn-sm btn-outline-success" onclick="openUpdateModal(<?= $employee['id'] ?>)">Update</button> This is the added button -->
            <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#update_employee_modal<?= $employee["id"] ?>">Update</button>
            <!-- <button type='button' class='btn btn-primary btn-sm ml-2 ' id='update_employee'  data-toggle='modal' data-target='#update_employee_modal' data-id="#update_employee_modal<?= $employee['id']?>" >Update</button> -->
            <button type="button" class="btn btn-outline-danger btn-sm ml-2" id="delete_employee" data-id="<?=$employee["id"] ?>">Delete</button>
        </td>
    </tr>
<?php endforeach; ?>

