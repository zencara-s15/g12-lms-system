<?php
require_once("../../database/database.php");
require_once("../../models/employee.model.php");

$notification = '';
$notificationClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $leave_type_id = $_POST['leave_type_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $description = htmlspecialchars($_POST['description']);

    $created = create_leave_request($user_id,$leave_type_id,$start_date,$end_date,$status,$description);
    $created = true;
    if ($created) {
        $notification = 'Applied Successfully!';
        $notificationClass = 'success';
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <?php if ($notification) : ?>
        <div class="alert alert-<?= $notificationClass ?> d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2" style="font-size: 60px;"></i>
            <div style="font-size: 60px;">
                <?= $notification ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(() => {
        window.location.href = '/em_leave_request_view';
    }, 2000 );
</script>