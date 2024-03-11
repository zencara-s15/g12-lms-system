<?php
require '../../database/database.php';
require_once '../../models/admin.model.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $position = $_POST['position'];
    $department_id = $_POST['department_id'];
    $isCreated = create_position($position, $department_id);
    if($isCreated) {
        header('Location:/positions?id='.$department_id);
    }else{
        echo "Your create is disabled";
    }
   
};
