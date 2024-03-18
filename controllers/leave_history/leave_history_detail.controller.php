<?php
require "database/database.php";
require_once ("models/employee.model.php");

$id = $_GET['id'];
$detailHistory = detailHistory($id);

// var_dump($detailHistory);

require ('views/leave_history/leave_history_detail.view.php');