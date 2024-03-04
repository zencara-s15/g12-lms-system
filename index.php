<?php
$mainDir = dirname(__FILE__);
require 'utils/url.php';
$mainDir =dirname(__FILE__);
require 'database/database.php';

if (urlIs('/employees_dasboad') || urlIs('/leave_history') || urlIs('/reports_employee') || urlIs('/profiles_employee')|| urlIs('/em_leave_request') || urlIs('/em_leave_request_form') || urlIs('/em_leave_request_view'))  {
    require 'router.employee.php';
} else {
    require 'router.php';
}
