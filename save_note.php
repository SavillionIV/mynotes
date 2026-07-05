<?php
require "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = (int) $_POST["user_id"];
    $note_title = trim($_POST["note_title"]);
    $note_content = trim($_POST["note_content"]);

    if (!empty($note_content)) {
        $stmt = $pdo->prepare("INSERT INTO notes (user_id, note_title, note_content) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $note_title, $note_content]);
    }
}

header("Location: dashboard.php");
exit;
?>