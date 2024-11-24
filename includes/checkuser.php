<?php
session_start();
require_once 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $row['fname'];
    $_SESSION['id']=$row['uid'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['email'] = $row['email'];
    header("Location: ../index.php");
} else {
    echo "<script>alert('Login Failes');</script>";
    header("Location: ../login.php");
}
