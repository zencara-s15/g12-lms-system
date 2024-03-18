<?php
require_once("../../database/database.php");
require_once "../../models/admin.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $gender = $_POST["gender"];
    $date_of_birth = $_POST["date_of_birth"];
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];
    $role_id = $_POST["role"];
    $position_id = $_POST["position"];
    $amount_leave = $_POST["amount_leave"];

    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
        $image_data = file_get_contents($_FILES['profile']['tmp_name']);
        $image_name = $_FILES['profile']['name'];
    } else {
        echo "Error uploading image. Please try again.";
        exit;
    }

    $isCreate = create_employee($first_name, $last_name, $password, $gender, $email, $date_of_birth, $role_id, $position_id, $image_name, $image_data,$amount_leave);

    if (!$isCreate) {
        // Notify the admin if the employee creation failed due to duplicate email
        $notificationClass = 'danger';
        $notification = 'Failed to create the email already exists.';
        $redirectUrl = "/create_employee"; // Redirect back to the create employee page
    } else {
        // Employee creation successful
        $notificationClass = 'success';
        $notification = 'Employee has been created successfully.';
        $redirectUrl = "/employees"; // Redirect to the employees page
    }
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="alert alert-<?= $notificationClass; ?>" role="alert" style="max-width: 500px;">
        <div class="d-flex justify-content-center align-items-center">
            <h3><?= $notificationClass === 'success' ? '<i class="fa fa-check-circle" style="font-size:70px"></i>' : '<i class="fa fa-exclamation-triangle" style="font-size:70px"></i>'; ?></h3>
        </div>
        <p class="lead text-center"><?= $notification; ?></p>
    </div>
</div>

<script>
    setTimeout(() => {
        document.querySelector('.alert').classList.add('show');
        setTimeout(() => {
            window.location.href = "<?php echo $redirectUrl; ?>";
        }, 1700);
    }, 50);
</script>
