<?php 
require "../../database/database.php";
require "../../models/admin.model.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['department_name'])) {
        add_department($_POST['department_name']);
        header('location: /departments');
    }
}
header('location: /departments');
