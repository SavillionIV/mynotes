<link rel="stylesheet" href="stylesheet.css">
<?php
require 'includes/db.php';
require 'includes/auth.php';
requireLogin();

$userId = $_SESSION['user_id'];
$result = $conn->query("SELECT filename FROM gallery WHERE user_id = $userId");
?>

<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
<a href="logout.php">Logout</a>

<h3>Upload an Image</h3>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>

<h3>Your Gallery</h3>
<div class="gallery">
<?php while($row = $result->fetch_assoc()): ?>
    <img src="uploads/<?php echo $row['filename']; ?>" width="150">
<?php endwhile; ?>
</div>