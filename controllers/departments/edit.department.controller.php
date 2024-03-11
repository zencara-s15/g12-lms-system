<?php
require 'database/database.php';
require_once 'models/admin.model.php';

$data = edit_departments($_GET['id']);

require $mainDir . "/views/departments/form.edit.view.php";
?>