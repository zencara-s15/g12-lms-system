<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/admin' => 'controllers/admin/admin.controller.php',
    '/reviews' => 'controllers/reviews/review.controller.php',
    '/reports' => 'controllers/reports/report.controller.php',
    '/print_report' => 'controllers/reports/print_report.controller.php',

    '/manages' => 'controllers/manages/manage.controller.php',
    '/profiles' => 'controllers/profiles/profile.controller.php',

    '/employees' => 'controllers/employees/employee.controller.php',
    '/create_employee' => 'controllers/employees/form.employee.controller.php',
    '/update_employee' => 'controllers/employees/form.update.employee.controller.php',

    '/departments' => 'controllers/departments/department.controller.php',
    '/edit_department' => 'controllers/departments/edit.department.controller.php',

    '/leave_types' => 'controllers/leave_types/leave_type.controller.php',
    '/edit_leave_type' => 'controllers/leave_types/from_edits.controller.php',

    '/rejected_leaves' => 'controllers/leave_requests/rejected_leaves.controller.php', 
    '/leave_requests' => 'controllers/leave_requests/leave_requests.controller.php', 
    '/leave_requests_detial' => 'controllers/leave_requests/leave_request_detial.controller.php',

    '/create_positions' => 'controllers/positions/create_position.controller.php',
    '/positions' => 'controllers/positions/position.controller.php',
    '/edit_positions' => 'controllers/positions/edit_position.controller.php',

    '/leave_requests_detial' => 'controllers/leave_requests/leave_request_detial.controller.php',
    '/update_profile' => 'controllers/profiles/update.profile.controller.php',

    '/report_detail' => 'controllers/reports/detail_report.controlller.php'
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
}

if ($page === 'controllers/profiles/profile.controller.php') {
    require $page;
} else if ($page === 'controllers/profiles/update.profile.controller.php') {
    require $page;
} else if ($page === 'views/errors/404.php') {
    require('views/errors/404.php');
} else {
    require "layouts/header.php";
    require "layouts/navbar.php";
    require $page;
    require "layouts/footer.php";
}
