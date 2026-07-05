<?php
require "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = (int) $_POST["user_id"];
    $reminder_text = trim($_POST["reminder_text"]);
    $due_date = !empty($_POST["due_date"]) ? $_POST["due_date"] : null;

    if (!empty($reminder_text)) {
        $stmt = $pdo->prepare("INSERT INTO reminders (user_id, reminder_text, due_date) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $reminder_text, $due_date]);
    }
}

header("Location: dashboard.php");
exit;
?>