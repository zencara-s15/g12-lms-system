<?php

$mainDir = dirname(__FILE__);
require 'utils/url.php';
$mainDir = dirname(__FILE__);
require 'database/database.php';

if (urlIs('/employees_dasboad') || urlIs('/leave_history') || urlIs('/reports_employee') || urlIs('/profiles_employee') || urlIs('/leave_history_detail') || urlIs('/em_leave_request') || urlIs('/em_leave_request_view') || urlIs('/em_leave_request_form')){
    require 'router.employee.php';
} else {
    require 'router.php';
}
