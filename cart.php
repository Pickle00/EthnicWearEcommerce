<?php
session_start();
require_once 'includes/connection.php';

$total_price = 0;
if (isset($_SESSION['user'])) {

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            $total_price += $cart_item['price'];
        }
    }


    if (isset($_POST['remove_item'])) {
        $remove_index = $_POST['remove_item_index'];
        if (isset($_SESSION['cart'][$remove_index])) {
            unset($_SESSION['cart'][$remove_index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            Header("Location: cart.php");
        }
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order-confirm'])) {
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $order_date = date("Y-m-d");
        $fname = $_SESSION['user'];
        $lname = $_SESSION['lname'];
        $email = $_SESSION['email'];
        $uid = $_SESSION['id'];

        // Calculate the total price including delivery charge
        $delivery_charge = 100;
        $cart_total = 0;

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart_item) {
                $cart_total += $cart_item['price'];
            }

            $cart_total += $delivery_charge;

            // Insert each item into the orders table
            foreach ($_SESSION['cart'] as $cart_item) {
                $pname = $cart_item['pname'];
                $price = $cart_item['price'];
                $size = $cart_item['size'];
                $img = $cart_item['image'];

                $status = 'Processing';
                $query = "INSERT INTO orders (uid,pname, price, size ,fname,lname,email,order_date, address, phone_no, img, status) VALUES ('$uid','$pname', '$price', '$size', '$fname','$lname','$email','$order_date', '$address', '$phone_no', '$img', '$status')";



                mysqli_query($conn, $query);
            }
            echo "<script>alert('Ordered Successfully');</script>";

            unset($_SESSION['cart']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="style/header.css" />
    <link rel="stylesheet" href="style/footer.css" />
    <link rel="stylesheet" href="style/cart.css" />
</head>

<body>
    <!-- HEADER -->
    <?php
    include('includes/header.php')
    ?>

    <!-- Cart -->

    <h2 class="your-cart">Your Cart</h2>

    <div class="added-items">


        <div class="cart">

            <div class="cart-header">
                <div class="header-product">Product</div>
                <div class="header-price">Price</div>
                <div class="header-quantity">Quantity</div>
                <div class="header-action">Action</div>
            </div>

            <!-- First cart item -->
            <?php

            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $index => $cart_item) :
            ?>
                    <div class="cart-item">
                        <div class="product">
                            <img src="assets/products/<?php echo $cart_item['image']; ?>" alt="<?php echo $cart_item['pname']; ?>">
                            <div class="product-info">
                                <p class="category"><?php echo $cart_item['category'] ?></p>
                                <h3><?php echo $cart_item['pname']; ?></h3>
                                <p>Size <?php echo $cart_item['size']; ?></p>
                            </div>
                        </div>
                        <div class="price">Rs.<?php echo $cart_item['price'] ?></div>
                        <div class="quantity">
                            x1
                        </div>

                        <form method="POST" action="cart.php">
                            <input type="hidden" name="remove_item_index" value="<?php echo $index; ?>">
                            <button type="submit" name="remove_item" class="remove-btn">Remove</button>
                        </form>
                    </div>
            <?php endforeach;
            } else {
                echo ("Your cart is empty");
            }
            ?>
        </div>

        <div class="cart-total">
            <form action="cart.php" method="post">
                <h3>Your Details</h3>
                <p>Address</p>
                <input type="text" class="address" name="address" placeholder="Enter your address" required>

                <p>Phone no.</p>
                <input type="number" class="number" name="phone_no" placeholder="Your Phone Number" required>


                <div class="cart-summary">
                    <h2>Cart Total</h2>
                    <div class="summary-item">
                        <p>Cart Subtotal</p>

                        <p>Rs. <?php echo ($total_price) ?></p>
                    </div>
                    <div class="summary-item">
                        <p>Delivery Charge</p>
                        <p>Rs. 100</p>
                    </div>
                    <div class="summary-total">
                        <p>Cart Total</p>
                        <p>Rs.<?php echo ($total_price + 100); ?></p>
                    </div>
                    <input type="submit" name="order-confirm" class="apply-btn" value="Confirm Order" />
                </div>
            </form>
        </div>
    </div>

    <?php
    include('includes/footer.php');
    ?>

</body>

</html>