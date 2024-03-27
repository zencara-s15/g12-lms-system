<?php

require '../../database/database.php';
require_once '../../models/admin.model.php';

$notification = '';
$notification_icon = '';
$notification_class = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

  $password = htmlspecialchars($_POST['password']);
  $confirm_password = htmlspecialchars($_POST['cf_password']);
  $verify_code = $_POST['verify_codes'];
  $verify_user = check_verify_code($verify_code);
  $email = $_POST['email'];


// Call the reset_password function
if (!empty($verify_user) && $verify_code == $verify_user['verify_codes']) {
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $reset_password = reset_password($email, $hashed_password);


    $verify_code = "NULL";
    update_reset_token($email, $verify_code);

    $notification = 'Password Changed Successfully!';
    $notification_class = 'success';
    $notification_icon = 'fas fa-check-circle';
  }
  else{
    $notification = 'This verify link was expired!';
    $notification_class = 'danger';
    $notification_icon = 'fa fa-exclamation-triangle';
  }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="container d-flex justify-content-center align-items-center vh-100" style="max-width: 700px;">
    <?php if ($notification) : ?>
        <div class="alert alert-<?= $notification_class ?>" role="alert">
            <div class="d-flex justify-content-center align-items-center">
                <i class="<?= $notification_icon ?> me-2" style="font-size: 90px;"></i>
            </div>
            <p class="lead text-center fs-3"><?= $notification; ?></p>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(() => {
        window.location.href = '/';
    }, 3000);
</script>