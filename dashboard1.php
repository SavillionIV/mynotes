<?php
session_start();
require "includes/db.php";

/*
    Temporary user ID for testing.
    Later this should come from login:
    $_SESSION['user_id']
*/
$user_id = 1;

/* =========================
   GET USER INFO
========================= */
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

/* =========================
   GET HIGHLIGHTS
========================= */
$stmt = $pdo->prepare("SELECT * FROM highlights WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
$stmt->execute([$user_id]);
$highlights = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   GET ONGOING PROJECTS
========================= */
$stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = ? AND status = 'ongoing' ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$ongoing_projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   GET FINISHED PROJECTS
========================= */
$stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = ? AND status = 'finished' ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$finished_projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   GET REMINDERS
========================= */
$stmt = $pdo->prepare("SELECT * FROM reminders WHERE user_id = ? ORDER BY due_date ASC");
$stmt->execute([$user_id]);
$reminders = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   GET NOTES
========================= */
$stmt = $pdo->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
$stmt->execute([$user_id]);
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   GET SIDEBAR ITEMS
========================= */
$stmt = $pdo->prepare("SELECT * FROM sidebar_items WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$sidebar_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   GROUP SIDEBAR ITEMS
========================= */
$grouped_sidebar = [
    "Household Essentials" => [],
    "My Autobiography" => [],
    "My Current Studies" => [],
    "Activities & More" => [],
    "Projects & Growth Plan" => []
];

foreach ($sidebar_items as $item) {
    if (isset($grouped_sidebar[$item['section_name']])) {
        $grouped_sidebar[$item['section_name']][] = $item;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="page-wrapper">

    <header class="top-header">
        <div class="profile-preview">
            <img 
                src="images/<?php echo htmlspecialchars($user['profile_image']); ?>" 
                alt="Profile Image"
                class="profile-image"
            >
        </div>

        <div class="welcome-area">
            <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?></h1>
        </div>

        <div class="dashboard-link">
            <a href="#">My Profile (Dashboard)</a>
        </div>
    </header>

    <nav class="top-nav">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Messages <span class="notif">0</span></a></li>
            <li><a href="#">Stories</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Friends</a></li>
            <li><a href="#">Favorites</a></li>
            <li><a href="#">Merch</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </nav>

    <main class="main-layout">

        <aside class="sidebar">
            <?php foreach ($grouped_sidebar as $section => $items): ?>
                <section class="sidebar-card">
                    <h2><?php echo htmlspecialchars($section); ?></h2>

                    <?php if (!empty($items)): ?>
                        <?php foreach ($items as $item): ?>
                            <div class="sidebar-item">
                                <div class="thumb-box"></div>
                                <div>
                                    <h3><?php echo htmlspecialchars($item['item_title']); ?></h3>
                                    <p><?php echo htmlspecialchars($item['item_description']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No items yet.</p>
                    <?php endif; ?>
                </section>
            <?php endforeach; ?>
        </aside>

        <section class="dashboard-grid">

            <div class="dashboard-card small-card">
                <h2>Your Progress</h2>
                <div class="card-body center-text">
                    <p class="big-text">Good Job!</p>
                </div>
            </div>

            <div class="dashboard-card small-card">
                <h2>Your Highlights</h2>
                <div class="card-body">
                    <ul>
                        <?php foreach ($highlights as $highlight): ?>
                            <li><?php echo htmlspecialchars($highlight['content']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="dashboard-card tall-card">
                <h2>Ongoing Projects</h2>
                <div class="card-body">
                    <ul>
                        <?php foreach ($ongoing_projects as $project): ?>
                            <li>
                                <strong><?php echo htmlspecialchars($project['title']); ?></strong><br>
                                <?php echo htmlspecialchars($project['description']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="dashboard-card tall-card">
                <h2>Finished Projects</h2>
                <div class="card-body">
                    <ul>
                        <?php foreach ($finished_projects as $project): ?>
                            <li>
                                <strong><?php echo htmlspecialchars($project['title']); ?></strong><br>
                                <?php echo htmlspecialchars($project['description']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="dashboard-card medium-card">
                <h2>Reminders</h2>
                <div class="card-body">
                    <ul id="reminderList">
                        <?php foreach ($reminders as $reminder): ?>
                            <li>
                                <?php echo htmlspecialchars($reminder['reminder_text']); ?>
                                <?php if (!empty($reminder['due_date'])): ?>
                                    - <em><?php echo htmlspecialchars($reminder['due_date']); ?></em>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <form id="reminderForm" action="save_reminder.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="text" name="reminder_text" id="reminderText" placeholder="New reminder" required>
                        <input type="date" name="due_date">
                        <button type="submit">Add</button>
                    </form>
                </div>
            </div>

            <div class="dashboard-card medium-card">
                <h2>Your Notes</h2>
                <div class="card-body">
                    <ul>
                        <?php foreach ($notes as $note): ?>
                            <li>
                                <strong><?php echo htmlspecialchars($note['note_title']); ?></strong><br>
                                <?php echo nl2br(htmlspecialchars($note['note_content'])); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <form action="save_note.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="text" name="note_title" placeholder="Note title">
                        <textarea name="note_content" placeholder="Write your note here..." required></textarea>
                        <button type="submit">Save Note</button>
                    </form>
                </div>
            </div>

        </section>
    </main>

    <footer class="footer">
        <div class="footer-left">
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="#">Terms & Conditions</a>
        </div>

        <div class="footer-center">
            <p>&copy; 2026</p>
        </div>

        <div class="footer-right">
            <a href="#">Jane Doe</a>
            <a href="#">John Doe</a>
            <a href="#">Start Chat</a>
        </div>
    </footer>

</div>

<script src="dashboard.js"></script>
</body>
</html>