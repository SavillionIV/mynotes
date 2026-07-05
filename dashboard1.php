<?php
session_start();
require "includes/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

/* =========================
   USER INFO
========================= */
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

/* =========================
   HIGHLIGHTS
========================= */
$stmt = $pdo->prepare("SELECT * FROM highlights WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
$stmt->execute([$user_id]);
$highlights = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   PROJECTS
========================= */
$stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = ? AND status = 'ongoing' ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$ongoing_projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = ? AND status = 'finished' ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$finished_projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   REMINDERS
========================= */
$stmt = $pdo->prepare("SELECT * FROM reminders WHERE user_id = ? ORDER BY due_date ASC");
$stmt->execute([$user_id]);
$reminders = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   NOTES
========================= */
$stmt = $pdo->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
$stmt->execute([$user_id]);
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   SIDEBAR ITEMS
========================= */
$stmt = $pdo->prepare("SELECT * FROM sidebar_items WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$sidebar_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>My Profile Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

    <!-- HEADER -->
    <header class="site-header">
	<!-- PROFILE STRIP -->
        <section class="profile-banner card">
            <div class="profile-image-wrap">
                <img src="images/<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Profile Image" class="profile-image">
            </div>
            <div class="profile-text">
                <h2>Welcome, <?php echo htmlspecialchars($user['full_name']); ?></h2>
                <p>This is your personal dashboard where you can track your highlights, projects, reminders, and notes.</p>
            </div>
        </section>
    </header>

    <!-- NAV -->
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="#">Messages</a></li>
            <li><a href="#">Stories</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Friends</a></li>
            <li><a href="#">Favorites</a></li>
            <li><a href="#">Merch</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <div class="nav-search">
            <input type="text" placeholder="Search goals or projects...">
        </div>
    </nav>
    <!-- PAGE CONTENT -->
    <main class="dashboard-shell">
        <div class="dashboard-layout">

            <!-- SIDEBAR -->
            <aside class="sidebar">
                <?php foreach ($grouped_sidebar as $section => $items): ?>
                    <section class="card sidebar-card">
                        <h3><?php echo htmlspecialchars($section); ?></h3>

                        <?php if (!empty($items)): ?>
                            <?php foreach ($items as $item): ?>
                                <div class="sidebar-item">
                                    <div class="thumb-box"></div>
                                    <div class="sidebar-item-text">
                                        <strong><?php echo htmlspecialchars($item['item_title']); ?></strong>
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

            <!-- MAIN GRID -->
            <section class="main-grid">

                <div class="card dashboard-card">
                    <h3>Your Progress</h3>
                    <div class="card-body center-text">
                        <p class="highlight-text">Good Job!</p>
                    </div>
                </div>

                <div class="card dashboard-card">
                    <h3>Your Highlights</h3>
                    <div class="card-body">
                        <ul>
                            <?php foreach ($highlights as $highlight): ?>
                                <li><?php echo htmlspecialchars($highlight['content']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="card dashboard-card tall">
                    <h3>Ongoing Projects</h3>
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

                <div class="card dashboard-card tall">
                    <h3>Finished Projects</h3>
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

                <div class="card dashboard-card">
                    <h3>Reminders</h3>
                    <div class="card-body">
                        <ul>
                            <?php foreach ($reminders as $reminder): ?>
                                <li>
                                    <?php echo htmlspecialchars($reminder['reminder_text']); ?>
                                    <?php if (!empty($reminder['due_date'])): ?>
                                        - <em><?php echo htmlspecialchars($reminder['due_date']); ?></em>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <form action="save_reminder.php" method="POST" class="dashboard-form">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="text" name="reminder_text" placeholder="New reminder" required>
                            <input type="date" name="due_date">
                            <button type="submit">Add Reminder</button>
                        </form>
                    </div>
                </div>

                <div class="card dashboard-card">
                    <h3>Your Notes</h3>
                    <div class="card-body">
                        <ul>
                            <?php foreach ($notes as $note): ?>
                                <li>
                                    <strong><?php echo htmlspecialchars($note['note_title']); ?></strong><br>
                                    <?php echo nl2br(htmlspecialchars($note['note_content'])); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <form action="save_note.php" method="POST" class="dashboard-form">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="text" name="note_title" placeholder="Note title">
                            <textarea name="note_content" placeholder="Write your note here..." required></textarea>
                            <button type="submit">Save Note</button>
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </main>

    <footer class="site-footer">
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Terms & Conditions</a>
        <span>&copy; 2026</span>
    </footer>

    <script src="dashboard.js"></script>
</body>
</html>