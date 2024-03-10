<?php
session_start();
require '../../database/database.php';
require '../../models/admin.model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $confirm_password = htmlspecialchars($_POST['confirmPassword']);

  if ($password === $confirm_password) {
    // Call the account_exist function to check if the email exists
    $user = account_exist($email);

    if (!empty($user)) {
      // Email exists, hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Call the reset_password function
      $reset_password = reset_password($email, $hashed_password);

      if ($reset_password) {
        // Password reset successful
        header("Location:/");
      } else {
        // Password reset failed
        $_SESSION['error'] = "Password reset failed";
        header("Location:/reset");
      }
    } else {
      // Email does not exist
      $_SESSION['error'] = "Email does not exist";
      header("Location:/reset");
    }
  } else {
    // Passwords don't match
    $_SESSION['error'] = "Passwords don't match";
    header("Location:/reset");
  }
}
