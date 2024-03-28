<?php
// Including the necessary files for database connection and admin model
require_once("../../../database/database.php");
require_once("../../../models/admin.model.php");

// Checking if the employee ID is set in the request parameters
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Calling the delete_Employee function from the admin model to delete the employee with the given ID
    $isDelete = delete_employee($id);
}
?>

