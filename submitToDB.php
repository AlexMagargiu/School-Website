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

$name = $_POST['name'];
$email = $_POST['email'];
$company_name = $_POST['company_name'];
$title = $_POST['title'];
$message = $_POST['message'];

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();

echo "<script>window.location.href = 'index.html';</script>";
?>