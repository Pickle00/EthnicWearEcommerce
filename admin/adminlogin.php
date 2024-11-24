<?php
session_start();
require_once '../includes/connection.php';
if (isset($_SESSION['admin'])) {
    Header("Location: admin.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            height: 100%;
        }

        .container {
            margin-top: 500px;
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <div class="container">
        <form action="checkadmin.php" method="post">
            <h2>Admin</h2>
            <p><input type="text" name="uadmin" placeholder="admin"></p>
            <p><input type="password" name="password" placeholder="password"></p>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>

</html>