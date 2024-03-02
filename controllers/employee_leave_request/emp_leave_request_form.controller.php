<?php

require 'database/database.php';
require 'models/admin.model.php';

$users = $_SESSION['user'];
require 'views/employee_leave_request/employee_leave_request_form.view.php';