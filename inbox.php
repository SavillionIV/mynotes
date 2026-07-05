<?php
require "includes/auth.php";
require "includes/db.php";

$user_id = $_SESSION["user_id"];

// Get all conversations for this user
$sql = "
    SELECT DISTINCT c.id, c.created_at
    FROM conversations c
    JOIN conversation_participants cp ON c.id = cp.conversation_id
    WHERE cp.user_id = ?
    ORDER BY c.created_at DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inbox</title>
</head>
<body>
    <h1>Your Inbox</h1>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <p>Conversation #<?= $row["id"]; ?></p>
            <p>Started: <?= $row["created_at"]; ?></p>
            <a href="conversation.php?id=<?= $row["id"]; ?>">Open Conversation</a>
        </div>
    <?php endwhile; ?>

</body>
</html>