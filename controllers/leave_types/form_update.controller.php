<?php
require "../../database/database.php";
require_once "../../models/admin.model.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['leave_type'])) {
        update_leave_type($_POST['leave_type'], $_POST['id']);
        header("Location: /leave_types");
    }
}

