<?php
require_once 'connection.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];


$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";


$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "user already exist";
} else {
    $insertquery = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";

    if (mysqli_query($conn, $insertquery)) {
        echo '<script>alert("Account Successfully Created");</script>';
        header("Location: ../login.php");
    }
}