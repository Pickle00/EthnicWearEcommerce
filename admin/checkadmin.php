<?php
session_start();
include '../includes/connection.php';
if (isset($_POST['submit'])) {
    $admin = $_POST['uadmin'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email='$admin' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin'] = $row['name'];
        header("location: admin.php");
    } else {
        $message = "Your Password is invalid";
        echo "<script>alert('$message'); window.location='adminlogin.php';</script>";
    }
}
