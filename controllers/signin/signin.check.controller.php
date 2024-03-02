<?php

//  start session
session_start();
ob_start();

require '../../database/database.php';
require '../../models/admin/admin.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //  to get data from input
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);

    //  function from model to comparing with data input
    $user = account_exist($email);

    if (count($user) > 0) {
        // $_SESSION["user"] = $user;
        //  comparing passwrod in database and password input
        if (password_verify($password, $user['password'])) {

            // Check if role is valid before setting session variables
            if ($user['role_id'] == $role) { // Use == for loose comparison

                // session on data input
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];

                // condition of role
                if ($role === '1') {

                    header('Location: /admin');
                } else if ($role === '2') {

                    header('Location: /employees_dasboad');
                } else {
                    //  alert  when it got error
                    $_SESSION['error'] = "Invalid role for this user";
                }
            } else {
                //  when role is not match
                header('Location: /');
            }
        } else {
            // case password wrong
            $_SESSION['error'] = "Wrong password";
            header('Location: /');
        }
    } else {
        //  exits infromation in form 
        $_SESSION['error'] = "Please enter Information";
        header('Location: /');
    }
}
