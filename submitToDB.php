<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$database = "schoolFormDB";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO schoolData (name, email, company_name, title, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $company_name, $title, $message);

// Set parameters and execute
$name = $_GET['name'];
$email = $_GET['email'];
$company_name = $_GET['company_name'];
$title = $_GET['title'];
$message = $_GET['message'];

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>