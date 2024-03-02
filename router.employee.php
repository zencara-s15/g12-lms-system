<?php

$uri_employees = parse_url($_SERVER['REQUEST_URI'])['path'];
$page_employees = "";

$routes_employees = [
    '/' =>  'controllers/signin/signin.controller.php',
    '/signout' => 'controllers/sigout/signout.controller.php',
    '/employees_dasboad' => 'controllers/employee_dasboard/employee_daboard.controller.php',

    '/leave_history' => 'controllers/leave_history/leave.history.controller.php',
    '/reports_employee' => 'controllers/reports/report.controller.php',
    '/profiles_employee' => 'controllers/profiles/profile.controller.php',
    '/em_leave_request' => 'controllers/employee_leave_request/emp_leave_request.controller.php',
    '/em_leave_request_form' => 'controllers/employee_leave_request/emp_leave_request_form.controller.php',
];

if (array_key_exists($uri_employees, $routes_employees)) {
    $page_employees = $routes_employees[$uri_employees];
} else {
    http_response_code(404);
    $page_employees = 'views/errors/404.php';
}

require "layouts/header.employee.php";
require "layouts/navbar.employee.php";
require $page_employees;
require "layouts/footer.php";
