<?php
// Including necessary files for database connection and admin model
require_once("../../database/database.php");
require_once("../../models/admin.model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST["id"];
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $gender = $_POST["gender"];
    $date_of_birth = $_POST["date_of_birth"];
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];
    $role_id = $_POST["role"];
    $position_id = $_POST["position"];
    $amount_leave = $_POST["amount_leave"];

// Image handling
if(isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK){
    $image_data = file_get_contents($_FILES['profile']['tmp_name']);
    $image_name = $_FILES['profile']['name']; // Get the name of the uploaded file
} else {
    echo "Error uploading image. Please try again.";
    exit; // Terminate the script if there is an issue with the uploaded image
}

    // Performing operations using the retrieved data and image
    $isCreate = update_employee($first_name, $last_name, $password, $gender, $email, $date_of_birth,$role_id, $position_id, $image_name, $image_data,$amount_leave,$user_id,);

    // Setting notification class, message, and redirect URL based on the result of the operation
    $notificationClass = $isCreate ? 'success' : 'danger';
    $notification = $isCreate ? 'Employee has been updated successfully.' : 'Failed to update employee.';
    $redirectUrl = $isCreate ? "/employees" : "/";
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- // Creating a container for displaying the alert message -->
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="alert alert-<?= $notificationClass; ?>" role="alert" style="max-width: 500px;">
        <div class="d-flex justify-content-center align-items-center">
            <h3><?= $notificationClass === 'success' ? '<i class="fa fa-check-circle" style="font-size:70px"></i>' : '<i class="fa fa-exclamation-triangle" style="font-size:70px"></i>'; ?></i></h3>
        </div>
        <p class="lead text-center"><?= $notification; ?></p>
    </div>
</div>

<script>
    // JavaScript for displaying the alert and redirecting after a delay
    setTimeout(() => {
        // Adding the 'show' class to the alert after a short delay
        document.querySelector('.alert').classList.add('show');
        // Setting a timeout to redirect to the specified URL after a delay
        setTimeout(() => {
            window.location.href = "<?php echo $redirectUrl; ?>";
        }, 1700);
    }, 50);
</script>