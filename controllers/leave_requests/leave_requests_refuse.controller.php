<?php
require "../../database/database.php";
require "../../models/admin.model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$id = $_GET['id'] ? $_GET['id'] : null;
$is_accepted = "btn-success";

$user_info = get_leave_request_detail($id);
$full_name = $user_info['first_name'] . ' ' . $user_info['last_name'];
$email = $user_info['email'];
$start_date = $user_info['start_date'];
$end_date = $user_info['end_date'];
$duration = date_diff(new DateTime($start_date),new DateTime($end_date))->format('%a');
$leave_type = $user_info['leave_type'];
$description = $user_info['description'];

if (isset($id)) {

    $status = "Rejected";

    update_leave_status($status, $id);
    header("Location: /leave_requests");
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'leave.management.vc1@gmail.com';
        $mail->Password   = 'vnsfsbtkpgcdmiks';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('leave.management.vc1@gmail.com', 'Leave Management System');
        $mail->addAddress($email, $full_name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Leave Request Rejected';
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
                        <h2>Your Leave Request has been Rejected</h2>
                        <p><strong>Name:</strong> $full_name</p>
                        <p><strong>Leave Type:</strong> $leave_type</p>
                        <p><strong>Start Date:</strong> $start_date</p>
                        <p><strong>End Date:</strong> $end_date</p>
                        <p><strong>Duration:</strong> $duration days</p>
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