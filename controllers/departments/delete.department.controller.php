<?php
require '../../database/database.php';
require "../../models/department.model.php";

$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)){
    delete_department($id);
    header('Location: /departments');
}

?>
