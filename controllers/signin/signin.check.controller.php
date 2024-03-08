<?php
// Start session
session_start();

require '../../database/database.php';
require '../../models/admin.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from input
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);

    // Check if the user exists in the database
    $user = account_exists($email);

    if (count($user) > 0) {
        // Compare the password in the database and the input password
        if (password_verify($password, $user['password'])) {

            // Check if role is valid before setting session variables
            if ($user['role_id'] == $role) {
                // Get additional user information
                $profile = profile_personals($email);
                $_SESSION['logged_in'] = true;
                // Store user information in session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                ];
                // Redirect based on role
                if ($role === '1') {
                    header('Location: /admin');
                } else if ($role === '2') {
                    header('Location: /employees_dasboad');
                } else {
                    $_SESSION['error'] = "Invalid role for this user";
                    header('Location: /');
                }
            } else {
                $_SESSION['error'] = "Invalid role for this user";
                header('Location: /');
            }
        } else {
            $_SESSION['error'] = "Wrong password";
            header('Location: /');
        }
    } else {
        $_SESSION['error'] = "Please enter information";
        header('Location: /');
    }
}
