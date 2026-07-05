<?php
require "includes/auth.php";
require "includes/db.php";

$user_id = $_SESSION["user_id"];
$conversation_id = intval($_GET["id"]);

// Security check: make sure user belongs to this conversation
$check = $conn->prepare("
    SELECT * FROM conversation_participants
    WHERE conversation_id = ? AND user_id = ?
");
$check->bind_param("ii", $conversation_id, $user_id);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows === 0) {
    die("You do not have access to this conversation.");
}

// Handle sending a reply
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = trim($_POST["message"]);

    if (!empty($message)) {
        $stmt = $conn->prepare("
            INSERT INTO messages (conversation_id, sender_id, message)
            VALUES (?, ?, ?)
        ");
        $stmt->bind_param("iis", $conversation_id, $user_id, $message);
        $stmt->execute();
        $stmt->close();

        header("Location: conversation.php?id=" . $conversation_id);
        exit();
    }
}

// Fetch messages
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conversation</title>
</head>
<body>
    <h1>Conversation #<?= $conversation_id; ?></h1>

    <div style="border:1px solid #ccc; padding:15px; margin-bottom:20px;">
        <?php while ($msg = $messages->fetch_assoc()): ?>
            <div style="margin-bottom:15px;">
                <strong><?= htmlspecialchars($msg["username"]); ?>:</strong><br>
                <p><?= nl2br(htmlspecialchars($msg["message"])); ?></p>
                <small><?= $msg["created_at"]; ?></small>
            </div>
            <hr>
        <?php endwhile; ?>
    </div>

    <form method="POST">
        <textarea name="message" rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Send Reply</button>
    </form>
	<script>
		function loadMessages() {
			fetch("fetch_messages.php?id=<?= $conversation_id; ?>")
				.then(response => response.text())
				.then(data => {
					document.getElementById("chat-box").innerHTML = data;
				});
		}

		// Load immediately
		loadMessages();

		// Reload every 3 seconds
		setInterval(loadMessages, 3000);
	</script>
</body>
</html>