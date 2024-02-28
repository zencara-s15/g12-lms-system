<?php
require "../../database/database.php";
require "../../models/admin.model.php";


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $leave_type = $_POST['leave_type'];
    create_leave_type($leave_type);
    header('Location:/leave_types');
};
