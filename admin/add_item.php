<?php
$host = "localhost";
$username = "root";
$pass = "";
$dbname = "ethnic_wear";

$conn = mysqli_connect($host, $username, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch form data
$pname = $_POST['product-name'];
$price = $_POST['price'];
$gender = $_POST['gender'];
$description = $_POST['description'];
$category = $_POST['category'];
$pimage = $_FILES['pimage']['name'];
$temp_image = $_FILES['pimage']['tmp_name'];

$upload_dir = "../assets/products/" . $pimage;

$query = "INSERT INTO products (pname, price, category, description, gender, image) 
              VALUES ('$pname', '$price', '$category', '$description', '$gender', '$pimage')";

if (mysqli_query($conn, $query)) {
    if (move_uploaded_file($temp_image, $upload_dir)) {
        echo "<script>alert('Product added to cart.');</script>";
        Header("Location: admin.php?page=add_products");
    } else {
        echo "Failed to upload image. Error: " . $_FILES['image']['error'];
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
