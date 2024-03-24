<?php
require "../../database/database.php";
require_once "../../models/admin.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['update_department_name'])) {
        update_department_name($_POST['update_department_name'], $_POST['id']);
        header('location: /departments');
    }
}
