<?php
require "../../database/database.php";
require_once "../../models/admin.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['position']) && !empty($_POST['department_id'])) {
        $position = $_POST['position'];
        $id = $_POST['id'];
        $departmentId = $_POST['department_id'];
        // Call the update_position function to update the position
        update_position($position, $id, $departmentId);

        header('Location: /positions?id=' . $departmentId);
    }
}