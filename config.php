<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "file_sharing");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>