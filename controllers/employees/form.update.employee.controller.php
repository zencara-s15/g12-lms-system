<?php 
require("database/database.php");
require_once ("models/admin.model.php");
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $get_employee=get_employee($id);
}
require "views/employees/form.update.employee.view.php";
?>
