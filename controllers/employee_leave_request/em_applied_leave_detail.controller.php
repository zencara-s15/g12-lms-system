<?php

require "database/database.php";
require "models/employee.model.php";

$id = $_GET['id'];
$applied_leave_detail = get_applied_leave_detail($id);

require_once 'views/employee_leave_request/em_applied_leave.view.php';
?>