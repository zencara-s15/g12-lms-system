<?php
require "../../database/database.php";
require "../../models/admin.model.php";



$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {
    deleteleave_type($id);
    header('Location: /leave_types');
}
