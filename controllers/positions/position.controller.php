<?php
require 'database/database.php';
require 'models/admin.model.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}
require "views/positions/position.view.php";
