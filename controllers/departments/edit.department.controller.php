<?php

require 'database/database.php';
require 'models/department.model.php';
// echo "hi";
// echo $mainDir;
$data = edit_departments($_GET['id']);

// var_dump(($data));


require $mainDir . "/views/departments/form.edit.view.php";
?>