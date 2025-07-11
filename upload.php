<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $filename = mysqli_real_escape_string($conn, $file['name']);
    $filepath = "uploads/" . time() . "_" . $file['name'];
    $size = $file['size'];
    $owner_id = $_SESSION['user_id'];

    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        $query = "INSERT INTO files (filename, filepath, size, owner_id) VALUES ('$filename', '$filepath', '$size', '$owner_id')";
        mysqli_query($conn, $query);
        header("Location: files.php");
    } else {
        echo "File upload failed";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Upload File</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
    <a href="files.php">View Files</a> | <a href="logout.php">Logout</a>
</body>
</html>