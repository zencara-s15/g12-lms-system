<?php
require "../../database/database.php";
require_once "../../models/admin.model.php";

$id = $_GET['id'] ? $_GET['id'] : null;
$is_accepted = "btn-success";

if (isset($id)){
    $status = "Rejected";
    update_leave_status($status,$id);
    header("Location: /leave_requests");
}