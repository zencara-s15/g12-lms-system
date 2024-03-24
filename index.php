<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php

session_start();

$mainDir = dirname(__FILE__);
require 'utils/url.php';
$mainDir = dirname(__FILE__);
require 'database/database.php';


// //  condition for link secure
if (isset($_SESSION['user'])) {
    $roleId = $_SESSION['user']['role_id'];
    if ($roleId == 1) {
        require "router.php";
    } elseif ($roleId == 2) {
        require "router.employee.php";
    } else {
        require "router.authorization.php";
    }
} else {
    require "router.authorization.php";
}
