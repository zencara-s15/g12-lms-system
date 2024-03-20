<?php 
require_once 'models/employee.model.php';
$user_info = get_user_info($_SESSION['user']['email']);
require 'views/calendar/calendar.view.php';