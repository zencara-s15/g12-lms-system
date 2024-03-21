<?php
// Require the necessary model
require_once('../../models/admin.model.php');
require('../../database/database.php');

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
    header('Location: /404.php');
}

$email = $_SESSION['user']['email'];

// Update profile image if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile'])) {
        $image = $_FILES['profile'];
        $imageSrc = file_get_contents($image['tmp_name']);
        $imageType = $image['type'];
        $update = update_profile($email, $imageSrc, $imageType);
        $roleId = $_SESSION['user']['role_id'];
        if ($roleId === 1) {
            header('Location:/admin');
        } else if ($roleId === 2) {
            header('Location:/employees_dasboad');
        } else {
            header("Location: views/errors/404.php");
        }
    }
}

//