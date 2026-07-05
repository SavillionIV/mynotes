<?php
session_start();
session_unset(); // clear session variables
session_destroy(); // destroy session

// Optional: Redirect to login or homepage
header("Location: login.html");
exit();
?>