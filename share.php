<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_id = $_POST['file_id'];
    $username = $_POST['username'];

    $query = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if ($user = mysqli_fetch_assoc($result)) {
        $user_id = $user['id'];
        $query = "INSERT INTO shared_files (file_id, user_id) VALUES ('$file_id', '$user_id')";
        mysqli_query($conn, $query);
        echo "File shared successfully";
    } else {
        echo "User not found";
    }
}
?>