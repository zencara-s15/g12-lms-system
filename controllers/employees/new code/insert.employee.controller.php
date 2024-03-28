<?php
require_once("../../../database/database.php");
require_once("../../../models/admin.model.php");

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
}