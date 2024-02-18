<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/' => 'controllers/admin/admin.controller.php',
    '/employees' => 'controllers/employees/employee.controller.php',
    '/departments' => 'controllers/departments/department.controller.php',
    '/leaves' => 'controllers/leaves/leave.controller.php', //for employeee

    '/leave_types' => 'controllers/leave_types/leave_types.controller.php', //for admin
    '/reports' => 'controllers/reports/report.controller.php',
    '/manages' => 'controllers/manages/manage.controller.php',
    '/profiles' => 'controllers/profiles/profile.controller.php',
    
    '/leave_requests' => 'controllers/leave_requests/leave_requests.controller.php',
    
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];

} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require "layouts/header.php";
require "layouts/navbar.php";
require $page;
require "layouts/footer.php";
