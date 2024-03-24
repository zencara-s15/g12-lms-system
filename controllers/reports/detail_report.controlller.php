<?php

require 'database/database.php';
require_once "models/admin.model.php";

$id = $_GET['id'] ? $_GET['id'] : null;

if (isset($id)){
    $status = "Approved";
    $get_leave_detail = get_leave_request_detail($id);
}
require ("views/reports/report_detail.view.php");