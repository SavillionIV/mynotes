<?php
require "includes/auth.php";
require "includes/db.php";

$user_id = $_SESSION["user_id"];
$conversation_id = intval($_GET["id"]);

// Make sure user belongs to the conversation
$check = $conn->prepare("
    SELECT * FROM conversation_participants
    WHERE conversation_id = ? AND user_id = ?
");
$check->bind_param("ii", $conversation_id, $user_id);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows === 0) {
    exit("Access denied.");
}

$stmt = $conn->prepare("
    SELECT messages.*, users.username
    FROM messages
    JOIN users ON messages.sender_id = users.id
    WHERE conversation_id = ?
    ORDER BY created_at ASC
");
$stmt->bind_param("i", $conversation_id);
$stmt->execute();
$messages = $stmt->get_result();

while ($msg = $messages->fetch_assoc()) {
    echo "<div style='margin-bottom:15px;'>";
    echo "<strong>" . htmlspecialchars($msg["username"]) . ":</strong><br>";
    echo "<p>" . nl2br(htmlspecialchars($msg["message"])) . "</p>";
    echo "<small>" . $msg["created_at"] . "</small>";
    echo "</div><hr>";
}
?>