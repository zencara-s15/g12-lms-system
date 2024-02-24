<?php
require_once("../../database/database.php");
require_once("../../models/leave_type.model.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $leave_type = $_POST['leave_type'];
    createleave_type($leave_type);
    header('Location:/leave_types');
};
