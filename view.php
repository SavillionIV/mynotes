<?php
require 'db.php';

$slug = $_GET['page'] ?? 'home';

$stmt = $db->prepare('SELECT * FROM pages WHERE slug = ?');
$stmt->execute([$slug]);
$page = $stmt->fetch();

if (!$page) {
    echo "<p>Page not found. <a href='edit.php?page=$slug'>Create it?</a></p>";
    exit;
}

echo "<h1>{$page['title']}</h1>";
echo nl2br(htmlspecialchars($page['content']));
echo "<p><a href='edit.php?page=$slug'>Edit</a></p>";
?>