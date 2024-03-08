<?php
// start session
// session_start();

require '../../database/database.php';
require '../../models/admin/admin.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //  get data from sign out
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);

  $password = htmlspecialchars($_POST['password']);
  $gender = htmlspecialchars($_POST['gender']);
  $email = htmlspecialchars($_POST['email']);
  $role = htmlspecialchars($_POST['role']);
  $img = htmlspecialchars($_POST['img']);


  if (!empty($first_name) && !empty($last_name) && !empty($password) && !empty($gender) && !empty($email) && !empty($role) && !empty($img)) {

    //  for encryptPassword 
    $encryptPassword = password_hash($password, PASSWORD_BCRYPT);
    $user = account_exist($email);
    if (count($user) == 0) {

      //  for create account
      create_account($first_name, $last_name, $encryptPassword, $gender, $email, $role, $img);
      header('Location: /');
    } else {

      //  condition when have data already
      $_SESSION['error'] = "Account already exists";
      header('Location: /signout');
    }
  } else {

    //  alert when it got error
    $_SESSION['error'] = "Please fill all the fields";
    header('Location: /signout');
  }
}
