<?php

// Start session
session_start();

require '../../database/database.php';
require '../../models/admin.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from input
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Check if the user exists
    $user = account_exist($email);
    if (!empty($user)) {
        // Compare password in the database and password input
        if (password_verify($password, $user['password'])) {
            // Set the role based on the user's role_id
            $role = $user['role_id'];

            // Set session variables
            $_SESSION['user'] = [
                'email' => $user['email'],
                'role_id' => $role
            ];

            // Determine the appropriate redirect URL based on the role
            if ($role === 1) {
                header('Location: /admin');
            } else if ($role === 2) {
                header('Location: /employees_dasboad');
            }
        } else {
            // Incorrect password
            $_SESSION['error'] = "Wrong password";
            header('Location: /');
        }
    } else {
        // User does not exist
        $_SESSION['error'] = "User does not exist";
        header('Location: /');
    }
}
