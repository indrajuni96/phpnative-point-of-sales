<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_pos";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
error_reporting(0);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
