<?php
// =========================================
// Q&A / COMMENT PROCESSOR
// This file handles visitor question/comment submissions
// =========================================

// Load database connection
require "db.php";

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit;
}

// Grab and clean form input
$name = trim($_POST["qa_name"] ?? "");
$question = trim($_POST["qa_question"] ?? "");

// Validate fields
if ($name === "" || $question === "") {
    header("Location: ../index.php?qa=empty#qa");
    exit;
}

// Prepare safe SQL statement
$sql = "INSERT INTO qa_comments (name, question) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

// Check if prepare failed
if (!$stmt) {
    header("Location: ../index.php?qa=error#qa");
    exit;
}

// Bind values
$stmt->bind_param("ss", $name, $question);

// Execute
if ($stmt->execute()) {
    header("Location: ../index.php?qa=success#qa");
    exit;
} else {
    header("Location: ../index.php?qa=error#qa");
    exit;
}
?>