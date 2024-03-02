<?php
require_once("../../database/database.php");
require_once("../../models/employee.model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $leave_type_id = $_POST['leave_type_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    // create_leave_request($user_id,$leave_type_id,$start_date,$end_date,$status,$description);
};

echo $user_id . '   ';
echo $leave_type_id. '   ';
echo $start_date . '   ';
echo $end_date . '   ';
echo $status . '   ';
echo $description . '   ';