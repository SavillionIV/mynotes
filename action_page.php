<?php
// Simple login check (demo only — never store plaintext passwords!)
$valid_username = 'admin';
$valid_password = 'password123';

if ($_POST['uname'] === $valid_username && $_POST['psw'] === $valid_password) {
    echo "Welcome, " . htmlspecialchars($_POST['uname']) . "!";
} else {
    echo "Invalid credentials.";
}
?>