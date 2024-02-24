<?php
require "database/database.php";
require "models/leave_type.model.php";

$data = get_leave_type($_GET['id']);
require $mainDir . "/views/leave_types/form.edit.view.php";
?>


