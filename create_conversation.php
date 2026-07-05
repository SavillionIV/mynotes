<?php
require "includes/auth.php";
require "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sender_id = $_SESSION["user_id"];
    $receiver_id = intval($_POST["receiver_id"]);
    $message = trim($_POST["message"]);

    if (!empty($message) && $receiver_id > 0) {
        // 1. Create a new conversation
        $stmt = $conn->prepare("INSERT INTO conversations () VALUES ()");
        $stmt->execute();
        $conversation_id = $conn->insert_id;
        $stmt->close();

        // 2. Add sender as participant
        $stmt = $conn->prepare("INSERT INTO conversation_participants (conversation_id, user_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $conversation_id, $sender_id);
        $stmt->execute();
        $stmt->close();

        // 3. Add receiver as participant
        $stmt = $conn->prepare("INSERT INTO conversation_participants (conversation_id, user_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $conversation_id, $receiver_id);
        $stmt->execute();
        $stmt->close();

        // 4. Insert first message
        $stmt = $conn->prepare("INSERT INTO messages (conversation_id, sender_id, message) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $conversation_id, $sender_id, $message);
        $stmt->execute();
        $stmt->close();

        header("Location: conversation.php?id=" . $conversation_id);
        exit();
    } else {
        echo "Please fill in all fields.";
    }
}
?>