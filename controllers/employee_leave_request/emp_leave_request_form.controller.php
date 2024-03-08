<?php

require 'database/database.php';
require 'models/admin.model.php';
require 'models/employee.model.php';

$user_info = get_user_info($_SESSION['user']['id']);

require 'views/employee_leave_request/employee_leave_request_form.view.php';