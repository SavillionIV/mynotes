<?php
require "includes/auth.php";
require "includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Message</title>
</head>
<body>
    <h1>Send a Message</h1>

    <form action="create_conversation.php" method="POST">
        <label for="receiver_id">Send To User ID:</label><br>
        <input type="number" name="receiver_id" id="receiver_id" required><br><br>

        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">Send</button>
    </form>
</body>
</html>