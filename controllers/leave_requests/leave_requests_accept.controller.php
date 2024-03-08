<?php
require "../../database/database.php";
require_once "../../models/admin.model.php";

$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)){
    $status = "Approved";
    update_leave_status($status,$id);
    header("Location: /leave_requests");
}



