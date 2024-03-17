<?php
require '../../database/database.php';
require '../../models/admin.model.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$notification = '';
$notification_icon = '';
$notification_class = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $verify_codes = random_verify_codes();
    update_reset_token($email, $verify_codes);
    $reset_link = "http://localhost:8000/reset_pw_form?email=" . $email . "&verify_codes=" . $verify_codes;

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'leave.management.vc1@gmail.com'; // SMTP username
        $mail->Password = 'vnsfsbtkpgcdmiks'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('leave.management.vc1@gmail.com', 'Leave Management System');
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Reset Password';

        // Email body with the reset password form
        $mail->Body = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                .container {
                    width: 600px;
                    margin: 0 auto;
                    border-radius: 10px;
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
                    <h2>Reset password link</h2>
                    <p>Click on this linnk to reset new password: <p><a href='$reset_link'>Click Here</a></p></p>
                </div>
                <div class='footer'>
                    This email was sent by the Leave Management System.
                </div>
            </div>
        </body>
        </html>
        ";

        $mail->send();
        $notification = 'Email was sent by the Leave Management System';
        $notification_class = 'success';
        $notification_icon = 'fas fa-check-circle';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
};

function random_verify_codes()
{
    $token = rand(100000, 900000);
    return $token;
}
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <?php if ($notification) : ?>
        <div class="alert alert-<?= $notification_class ?> d-flex align-items-center" role="alert">
            <i class="<?= $notification_icon ?> me-2" style="font-size: 60px;"></i>
            <div style="font-size: 40px;">
                <?= $notification ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(() => {
        window.location.href = '/';
    }, 3000);
</script>