<?php
require_once ('../../database/database.php');
require_once ('../../models/leave_type.model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['leave_type'])) {
        updateleave_type($_POST['leave_type'], $_POST['id']);
        header("Location: /leave_types");
    }
}

