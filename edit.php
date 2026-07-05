<?php
require 'db.php';

$slug = $_GET['page'] ?? 'home';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title   = $_POST['title'];
    $content = $_POST['content'];

    // Check if page exists
    $stmt = $db->prepare('SELECT id FROM pages WHERE slug = ?');
    $stmt->execute([$slug]);
    $page = $stmt->fetch();

    if ($page) {
        // Update page
        $stmt = $db->prepare('UPDATE pages SET title = ?, content = ? WHERE slug = ?');
        $stmt->execute([$title, $content, $slug]);
    } else {
        // Create new page
        $stmt = $db->prepare('INSERT INTO pages (title, slug, content) VALUES (?, ?, ?)');
        $stmt->execute([$title, $slug, $content]);
    }

    header("Location: view.php?page=$slug");
    exit;
}

// Load existing content
$stmt = $db->prepare('SELECT * FROM pages WHERE slug = ?');
$stmt->execute([$slug]);
$page = $stmt->fetch();
?>

<form method="POST">
    Title: <input type="text" name="title" value="<?= $page['title'] ?? $slug ?>"><br><br>
    <textarea name="content" rows="20" cols="80"><?= $page['content'] ?? '' ?></textarea><br>
    <button type="submit">Save</button>
</form>