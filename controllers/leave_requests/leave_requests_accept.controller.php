<?php
require "../../database/database.php";
require "../../models/leave_requests.model.php";

$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)){
    $status = "Approved";
    update_leave_status($status,$id);
    header("Location: /leave_requests");
}



