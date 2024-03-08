<?php
require 'utils/url.php';
require 'database/database.php';


//  condition for employee or admin can see
if (urlIs('/employees_dasboad') || urlIs('/leave_history') || urlIs('/reports_employee') || urlIs('/profiles_employee')) {
    require 'router.employee.php';
} else {
    require 'router.php';
}
