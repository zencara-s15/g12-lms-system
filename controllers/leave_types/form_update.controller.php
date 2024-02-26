<?php
require "../../database/database.php";
require "../../models/admin.model.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['leave_type'])) {
        updateleave_type($_POST['leave_type'], $_POST['id']);
        header("Location: /leave_types");
    }
}

