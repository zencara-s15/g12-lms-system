<?php
require_once('models/admin.model.php');
require('database/database.php');

// Check if user is logged in
if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])) {
    $email = $_SESSION['user']['email'];

    // Fetch profile data from the model
    $profile = account_infor($email);

    if ($profile) {
        $id = $profile['id'];
        $first_name = $profile['first_name'];
        $last_name = $profile['last_name'];
        $gender = $profile['gender'];
        $role_id = $profile['role_id'];
        $position = $profile['position_id'];
        $image_name = $profile['image_name'];
        $image_data = $profile['image_data'];
        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($image_data);
    } else {
        header('Location:/404.php');
    }
} else {
    header('Location:/404.php');
}


