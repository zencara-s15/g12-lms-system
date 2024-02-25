<?php
require_once '../../database/database.php';
require_once '../../models/leave_type.model.php';

$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {
    deleteleave_type($id);
    header('Location: /leave_types');
}
