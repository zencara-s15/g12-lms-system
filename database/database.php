<?php

$hostname = "localhost";
$database = "g12_lms_db";
$username = "root";
$password = "";

$dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";
$connection = new PDO($dsn, $username, $password);
