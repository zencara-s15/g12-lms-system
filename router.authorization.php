<?php
$uri_authorization = parse_url($_SERVER['REQUEST_URI'])['path'];
$page_authorization = "";


// for employee dasboard
$routes_authorization = [
    '/' =>  'controllers/signin/signin.controller.php',
    '/reset' => 'controllers/reset/reset_password.php',
    '/reset_pw_form' => 'controllers/reset/reset_password_form.controller.php'

];

// condition
if (array_key_exists($uri_authorization, $routes_authorization)) {
    $page_authorization = $routes_authorization[$uri_authorization];
} else {
    require('views/errors/404.php');
}

if ($page_authorization === "controllers/signin/signin.controller.php") {
    require $page_authorization;
} else if ($page_authorization === "controllers/reset/reset_password.php" || $page_authorization === "controllers/reset/reset_password_form.controller.php") {
    require $page_authorization;
} else if ($page_authorization === 'views/errors/404.php') {
    require('views/errors/404.php');
}
