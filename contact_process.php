<?php
// =========================================
// CONTACT FORM PROCESSOR
// This file handles Contact Me form submissions
// =========================================

// Start by loading the database connection
require "db.php";

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit;
}

// Grab and clean form input
$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

// Basic validation
if ($name === "" || $email === "" || $message === "") {
    header("Location: ../index.php?contact=empty#contact");
    exit;
}

// Basic email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?contact=invalid_email#contact");
    exit;
}

// Prepare SQL statement for safety
$sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Check that prepare worked
if (!$stmt) {
    header("Location: ../index.php?contact=error#contact");
    exit;
}

// Bind values to the SQL statement
$stmt->bind_param("sss", $name, $email, $message);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../index.php?contact=success#contact");
    exit;
} else {
    header("Location: ../index.php?contact=error#contact");
    exit;
}
?>