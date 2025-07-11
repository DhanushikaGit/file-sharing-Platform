<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$query = "SELECT * FROM files WHERE owner_id = " . $_SESSION['user_id'];
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Files</title>
    <link rel="stylesheet" href="css/style,css">
    <script src="js/script.js"></script>
</head>
<body>
    <h2>Your Files</h2>
    <ul>
        <?php while ($file = mysqli_fetch_assoc($result)) { ?>
            <li>
                <?php echo htmlspecialchars($file['filename']); ?> (<?php echo round($file['size'] / 1024, 2); ?> KB)
                <a href="download.php?id=<?php echo $file['id']; ?>">Download</a>
                <button onclick="shareFile(<?php echo $file['id']; ?>)">Share</button>
            </li>
        <?php } ?>
    </ul>
    <a href="upload.php">Upload New File</a> | <a href="logout.php">Logout</a>
</body>
</html>