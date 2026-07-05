<?php
require 'includes/db.php';
require 'includes/auth.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $hashed);

if ($stmt->fetch() && password_verify($password, $hashed)) {
    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;
    header("Location: profile.php");
} else {
    echo "Login failed.";
}
?>