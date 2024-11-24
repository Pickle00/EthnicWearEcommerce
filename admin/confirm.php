<?php


session_start();
require_once '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    $oid = $_POST['oid'];
    $sql = "UPDATE orders SET status='Confirmed' WHERE oid='$oid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Ordered Confirmed');</script>";
    }
}
Header("Location: admin.php?page=dashboard");
?>