<?php
require 'database/database.php';
require_once 'models/admin.model.php';



$data = edit_position($_GET['id']);
require 'views/positions/edit_position.view.php';
?>