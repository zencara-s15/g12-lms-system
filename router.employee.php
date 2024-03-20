<?php

// session_start();
$uri_employees = parse_url($_SERVER['REQUEST_URI'])['path'];
$page_employees = "";


// for employee dasboard
$routes_employees = [
    '/employees_dasboad' => 'controllers/employee_dasboard/employee_daboard.controller.php',
    '/calendar' => 'controllers/calendar/calendar.controller.php',
    '/leave_history' => 'controllers/leave_history/leave.history.controller.php',
    '/leave_history_detail' => 'controllers/leave_history/leave_history_detail.controller.php',
    '/reports_employee' => 'controllers/reports/report.controller.php',
    '/profiles_employee' => 'controllers/profiles/profile.controller.php',

    '/em_leave_request' => 'controllers/employee_leave_request/em_leave_request_form.controller.php',
];


// condition
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
} else if($page_employees === 'views/errors/404.php'){
    require ('views/errors/404.php');

} else {
    require "layouts/header.employee.php";
    require "layouts/navbar.employee.php";
    require $page_employees;
    require "layouts/footer.php";
}
