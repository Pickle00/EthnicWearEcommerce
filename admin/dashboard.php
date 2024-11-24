<?php
require_once '../includes/connection.php';

// Query to get distinct emails
$select_distinct_users_query = "SELECT DISTINCT email FROM orders";
$distinct_emails_result = mysqli_query($conn, $select_distinct_users_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podu</title>

    <link rel="stylesheet" href="style/dashboard.css" />
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
</head>
<body>
<p class="order-title"> Orders</p>
    <?php
    if ($distinct_emails_result && mysqli_num_rows($distinct_emails_result) > 0) {
        while ($row = mysqli_fetch_assoc($distinct_emails_result)) {
            $email = $row['email'];

            // Query to get orders for each email
            $select_orders_query = "SELECT * FROM orders WHERE email = '$email' AND status = 'Processing'";
            $orders_result = $conn->query($select_orders_query);


    ?>
            
            <div class="cart">
                <div class="cart-header">
                    <div class="header-product">Product</div>
                    <div class="header-price">Price</div>
                    <div class="header-quantity">Quantity</div>
                    <div class="header-action">Status</div>
                    <div class="header-action">Action</div>
                </div>

                <?php
                if ($orders_result->num_rows > 0) {
                    $total_cost = 0;
                    $order_date = '';
                    $fname = '';
                    $lname = '';
                    $phone = '';

                    while ($data = $orders_result->fetch_assoc()) {
                        $fname = $data['fname'];
                        $lname = $data['lname'];
                        $phone = $data['phone_no'];
                        $total_cost += $data['price'];
                        $order_date = $data['order_date'];
                ?>
                        <div class="cart-item">
                            <div class="product">
                                <img src="../assets/products/<?php echo $data['img']; ?>" alt="Product Image" />
                                <div class="product-info">
                                    <h3><?php echo $data['pname']; ?></h3>
                                    <?php if ($data['size']) { ?>
                                        <p>Size <?php echo $data['size']; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="price">Rs. <?php echo $data['price']; ?></div>
                            <div class="quantity">x1</div>
                            <div class="action"><?php echo $data['status']; ?></div>
                            <form action="confirm.php" method="post">
                                <input type="hidden" name="oid" value="<?php echo $data['oid'] ?>">
                                <input type="submit" class="confirm" value="Confirm Order" name="confirm">
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="from">
                        <p>Customer name: <strong><?php echo $fname . ' ' . $lname; ?></strong></p>
                        <p><strong>Phone no: </strong><span><?php echo $phone; ?></span></p>
                        <p>Ordered Date: <strong><?php echo $order_date; ?></strong></p>
                        <p>Total Cost: <strong>Rs. <?php echo $total_cost + 100; ?></strong></p>
                    </div>
        <?php
                }

                echo('</div>');
            }
        } else {
            echo "<p>No Orders found!</p>";
        }
        ?>
</body>

</html>