<?php
require_once("../../database/database.php");
require_once("../../models/employee.model.php");
require_once("../../models/admin.model.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$notification = '';
$notificationClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    // $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $email = "czencara@gmail.com"; // change to admin email
    $leave_type_id = $_POST['leave_type_id']; // insert into database
    $leave_type = get_leave_type($leave_type_id)['leave_type']; //display in email
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $description = htmlspecialchars($_POST['description']);
    $leave_amount = $_POST['amount_leave'];

    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $duration = date_diff($start,$end)->format('%a'); //calculate duration

    $created = create_leave_request($user_id, $leave_type_id, $start_date, $end_date, $status, $description);
    calculate_leave_amount($leave_amount - 1, $user_id);
    $created = true;
    if ($created) {
        $notification = 'Applied Successfully!';
        $notificationClass = 'success';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = ' leave.management.vc1@gmail.com';                     //SMTP username
            $mail->Password   = 'vnsfsbtkpgcdmiks';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(' leave.management.vc1@gmail.com', 'Leave Management System');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'User apply for leave';
            $mail->Body =  "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        .container {
                            width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #f5f5f5;
                        }
                        .logo {
                            text-align: center;
                            margin-bottom: 20px;
                        }
                        .logo img {
                            max-width: 200px;
                        }
                        .details {
                            margin-bottom: 30px;
                        }
                        .details h2 {
                            color: #333333;
                            font-size: 24px;
                            margin-bottom: 20px;
                        }
                        .details p {
                            color: #555555;
                            font-size: 16px;
                            margin-bottom: 10px;
                        }
                        .footer {
                            text-align: center;
                            margin-top: 30px;
                            color: #777777;
                            font-size: 14px;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='logo'>
                            <img src='../../assets/images/logo.png' alt=''>
                        </div>
                        <div class='details'>
                            <h2> $full_name Applied for leave</h2>
                            <p><strong>Name:</strong> $full_name</p>
                            <p><strong>Leave Type:</strong> $leave_type</p>
                            <p><strong>Start Date:</strong> $start_date</p>
                            <p><strong>End Date:</strong> $end_date</p>
                            <p><strong>Duration:</strong> $duration(Days)</p>
                            <p><strong>Description:</strong> $description</p>
                        </div>
                        <div class='footer'>
                            This email was sent by the Leave Management System.
                        </div>
                    </div>
                </body>
                </html>
                ";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
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
    }, 111000);
</script>