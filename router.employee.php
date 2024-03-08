<?php
session_start();

$uri_employees = parse_url($_SERVER['REQUEST_URI'])['path'];
$page_employees = "";

$routes_employees = [
    '/' =>  'controllers/signin/signin.controller.php',
    '/reset' => 'controllers/reset/reset_password.php',
    '/employees_dasboad' => 'controllers/employee_dasboard/employee_daboard.controller.php',

    '/leave_history' => 'controllers/leave_history/leave.history.controller.php', //for admin
    '/reports_employee' => 'controllers/reports/report.controller.php',
    '/profiles_employee' => 'controllers/profiles/profile.controller.php',
    '/update_profile' => 'controllers/profiles/update.profile.controller.php',
];

if (array_key_exists($uri_employees, $routes_employees)) {
    $page_employees = $routes_employees[$uri_employees];
} else {
    http_response_code(404);
    $page_employees = 'views/errors/404.php';
}

if ($page_employees === 'controllers/profiles/profile.controller.php') {
    require $page_employees;
} else if ($page_employees === 'controllers/profiles/update.profile.controller.php') {
    require $page_employees;
} else {
    require "layouts/header.employee.php";
    require "layouts/navbar.employee.php";
    require $page_employees;
    require "layouts/footer.php";
}
