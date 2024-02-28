<?php 
require "../../database/database.php";
require "../../models/admin.model.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['department_name'])) {
        update_department_name($_POST['department_name'], $_POST['id']);
        header('location: /departments');
    }
}

