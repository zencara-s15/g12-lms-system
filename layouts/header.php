<?php
require_once('models/admin.model.php');

if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])) {
  $email = $_SESSION['user']['email'];
  $profile = account_infor($email);
  if ($profile) {
    $first_name = $profile['first_name'];
    // $image_name = $profile['image_name'];
    $image_data = $profile['image_data'];
    $imageSrc = 'data:image/jpeg;base64,' . base64_encode($image_data);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/images/logo.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/css/bootstrap.min.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="vendor/css/font-awesome.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <!-- Select2 CSS -->
  <link rel="stylesheet" href="vendor/plugins/select2/select2.min.css">

  <!-- Datetimepicker CSS -->
  <link rel="stylesheet" href="vendor/css/bootstrap-datetimepicker.min.css">

  <!-- Linearicon Font -->
  <link rel="stylesheet" href="vendor/css/lnr-icon.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="vendor/css/style.css" />

  <title>Leave Management</title>
  <!-- Google icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Css department -->
  <link rel="stylesheet" href="vendor/css/department.css">

  <title>LMS SYSTEM</title>
</head>

<body>
  <!-- Loader -->
  <div id="loader-wrapper">
    <div class="loader">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div>

  <!-- Inner wrapper -->
  <div class="inner-wrapper">
    <!-- Header -->
    <header class="header">
      <!-- Top Header Section -->
      <div class="top-header-section">
        <div class="container-fluid">
          <div class="row align-items-center">
            <a href="/admin" class="col-lg-3 col-md-3 col-sm-3 col-6">
              <img id="lms_logo" src="assets/images/logo.png" width="65%">
            </a>
            <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
              <div class="user-block d-none d-lg-block">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="user-notification-block align-right d-inline-block">
                      <div class="top-nav-search">
                      </div>
                    </div>
                    <div class="user-notification-block align-right d-inline-block">
                      <ul class="list-inline m-0">
                        <li class="list-inline-item dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Apply Leave">
                          <a href="/leave_requests" class="nav-link dropdown-toggle font-23 menu-style text-white align-middle" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o" style="font-size: 22px; position: relative;">
                              <span class="notification-dot" style="position: absolute; display: block; top: -10px; right: -13px; border-radius: 50%; font-size: smaller; color: white;">
                                <p id="notificationCount" style="border-radius: 50%; background: red; width: 17px; height: 17px; padding: 2px; font-size: 12px;padding-right: 7px;"><?= count_pending_requests() ?></p>
                              </span>
                            </i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!--  for image of profile -->

                    <div class="user-info align-right dropdown d-inline-block header-dropdown">
                      <a href="javascript:void(0)" data-toggle="dropdown" class="menu-style dropdown-toggle">
                        <div class="user-avatar d-inline-block">
                          <img src="<?= $imageSrc ?>" alt="user avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px;" />
                        </div>
                      </a>

                      <!-- Notifications -->
                      <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">

                        <!-- profiles -->
                        <a class="dropdown-item p-2" href="/profiles">
                          <span class="media align-items-center">
                            <span class="lnr lnr-user mr-3"></span>
                            <span class="media-body text-truncate">
                              <span class="text-truncate">Profile</span>
                            </span>
                          </span>
                        </a>
                        <a class="dropdown-item p-2" href="controllers/logout/logout_controller.php">
                          <span class="media align-items-center">
                            <span class="lnr lnr-power-switch mr-3"></span>
                            <span class="media-body text-truncate">
                              <span class="text-truncate">Logout</span>
                            </span>
                          </span>
                        </a>
                      </div>
                      <!-- Notifications -->
                    </div>
                    <!-- /User info-->
                  </div>
                </div>
              </div>
              <div class="d-block d-lg-none">
                <a href="javascript:void(0)">
                  <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                </a>

                <style>
                  .notification-badge {
                    position: absolute;
                    top: -8px;
                    right: -8px;
                    background-color: red;
                    color: white;
                    font-size: 12px;
                    font-weight: bold;
                    padding: 2px 6px;
                    border-radius: 50%;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                  }
                </style>