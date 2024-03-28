<?php
// Including the necessary files for database connection and admin model
require_once("../../../database/database.php");
require_once("../../../models/admin.model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user_id = $_POST["id"];
    $first_name = htmlspecialchars($_POST["update_first_name"]);
    $last_name = htmlspecialchars($_POST["update_last_name"]);
    $date_of_birth = $_POST["update_dob"];
    $email = htmlspecialchars($_POST["update_email"]);
    $position_id = $_POST["update_position"];
    $amount_leave = $_POST["update_leave"];
    $update_employees = update_employee($first_name, $last_name, $email, $date_of_birth, $position_id, $amount_leave, $user_id);

    // Check if the email already exists
//     $existingEmailStatement = $connection->prepare("SELECT id FROM users WHERE email = :email AND id != :user_id");
//     $existingEmailStatement->execute([
//         ':email' => $email,
//         ':user_id' => $user_id
//     ]);
//     $existingEmail = $existingEmailStatement->fetch(PDO::FETCH_ASSOC);
//     if(!$existingEmail){
//     }
}
