<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if (isset($_GET['id'])) {
    $file_id = $_GET['id'];
    $query = "SELECT * FROM files WHERE id = '$file_id' AND owner_id = " . $_SESSION['user_id'];
    $result = mysqli_query($conn, $query);
    if ($file = mysqli_fetch_assoc($result)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file['filename']) . '"');
        readfile($file['filepath']);
        exit;
    } else {
        echo "File not found or unauthorized";
    }
}
?>