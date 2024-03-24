<?php

require '../../database/database.php';
require '../../models/admin.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $positionId = $_GET['id'];
    $departmentId = delete_position($positionId);
    header('Location: /positions?id=' . $departmentId);
}
?>