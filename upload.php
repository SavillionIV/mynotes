<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();

$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    $filename = basename($_FILES["image"]["name"]);
    $stmt = $conn->prepare("INSERT INTO gallery (user_id, filename) VALUES (?, ?)");
    $stmt->bind_param("is", $_SESSION['user_id'], $filename);
    $stmt->execute();
    header("Location: profile.php");
} else {
    echo "Error uploading file.";
}
?>