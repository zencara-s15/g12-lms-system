<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/' =>  'controllers/signin/signin.controller.php',
    '/signout' => 'controllers/sigout/signout.controller.php',
    '/admin' => 'controllers/admin/admin.controller.php',
    '/employees' => 'controllers/employees/employee.controller.php',
    '/departments' => 'controllers/departments/department.controller.php',
    '/leaves' => 'controllers/leaves/leave.controller.php', //for employeee

    '/leave_types' => 'controllers/leave_types/leave_types.controller.php', //for admin
    '/reviews' => 'controllers/reviews/review.controller.php',
    '/reports' => 'controllers/reports/report.controller.php',
    '/manages' => 'controllers/manages/manage.controller.php',
    '/profiles' => 'controllers/profiles/profile.controller.php',
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
}


if ($page === 'controllers/signin/signin.controller.php') {
    require $page;
} else if ($page === 'controllers/sigout/signout.controller.php') {
    require $page;
} else {
    require "layouts/header.php";
    require "layouts/navbar.php";
    require $page;
    require "layouts/footer.php";
}
