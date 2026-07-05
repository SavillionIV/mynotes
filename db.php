<?php
// =========================================
// DATABASE CONNECTION
// This file connects PHP to MySQL
// Include this file anywhere you need database access
// =========================================

// Database settings
$host = "localhost";      // Usually localhost in XAMPP / local hosting
$dbname = "portfolio_db"; // Change this to your database name
$username = "root";       // XAMPP default is usually root
$password = "";           // XAMPP default is usually blank

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection failed
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Optional but recommended:
// Sets the character set to utf8mb4 for better text support
$conn->set_charset("utf8mb4");
// =========================================
//NOTES
//Change $dbname to your real database name

//On XAMPP:

//host = localhost

//username = root

//password = blank unless you changed it
// =========================================
?>
