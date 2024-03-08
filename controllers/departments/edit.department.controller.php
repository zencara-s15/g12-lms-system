<?php
require 'database/database.php';
require 'models/admin.model.php';

$data = get_department($_GET['id']);

require $mainDir . "/views/departments/form.edit.view.php";
?>