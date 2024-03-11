<?php

require 'database/database.php';
require_once 'models/admin.model.php';
require_once 'models/employee.model.php';

$user_info = get_user_info($_SESSION['user']['email']);

require 'views/employee_leave_request/employee_leave_request_form.view.php';