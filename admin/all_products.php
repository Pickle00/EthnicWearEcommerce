<?php
require_once '../includes/connection.php';
$query = "SELECT * FROM products";


if (isset($_POST['remove_item'])) {
    $pid = $_POST['pid'];
    $delete = "DELETE FROM products WHERE pid='$pid'";
    if (mysqli_query($conn, $delete)) {
        echo "<script>alert('Product deleted Successfully');</script>";
    }
    Header("Location: admin.php?page=all_products");
}
?>

<head>
    <link rel="stylesheet" href="style/all_products.css" />
</head>
<p class="order-title">All Products</p>
<div class="cart">
    <div class="cart-header">
        <div class="header-product">Product</div>
        <div class="header-price">Price</div>
        <div class="header-quantity">Gender</div>
        <div class="header-action">Action</div>
    </div>
    <?php

    $result = mysqli_query($conn, $query);
    $total_cost = 0;
    $order_date;
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="cart-item">
                <div class="product">
                    <img src="../assets/products/<?php echo $row['image']; ?>" alt="Floral Print Wrap Dress" />
                    <div class="product-info">
                        <h3><?php echo $row['pname']; ?></h3>
                    </div>
                </div>
                <div class="price">Rs. <?php echo $row['price']; ?></div>
                <div class="gender"><?php echo $row['gender']; ?></div>
                <form method="POST" action="all_products.php">
                    <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                    <button type="submit" name="remove_item" class="remove-btn">Remove</button>
                </form>
            </div>

    <?php
        }
    } else {
        echo "<p>No Orders found!</p>";
    }

    ?>
</div>