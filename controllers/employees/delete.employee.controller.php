<?php

require_once("../../database/database.php");
require_once("../../models/admin.model.php");

// Checking if the employee ID is set in the request parameters
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Calling the delete_Employee function from the admin model to delete the employee with the given ID
    $isDelete = delete_employee($id);
    // Setting the notification class based on the result of the deletion operation
    $notificationClass = $isDelete ? 'success' : 'danger';
    // Setting the notification message based on the result of the deletion operation
    $notification = $isDelete ? 'Employee has been deleted successfully.' : 'Failed to delete employee.';
    // Setting the redirect URL based on the result of the deletion operation
    $redirectUrl = $isDelete ? "/employees" : "/employees";
}
?>
<!-- // Including Bootstrap CSS for styling -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
