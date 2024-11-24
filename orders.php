<?php

session_start();
require_once 'includes/connection.php';
$query;
$id = $_SESSION['id'];
 echo $id;

echo $_SESSION['user'];
      echo $_SESSION['lname'];
      echo $_SESSION['email'];
if (isset($_SESSION['user'])) {
  $email = $_SESSION['email'];
  $query = "SELECT * FROM orders WHERE uid = '$id'";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style/header.css" />
  <link rel="stylesheet" href="style/landing.css" />
  <link rel="stylesheet" href="style/footer.css" />
  <link rel="stylesheet" href="style/order.css" />

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

  <?php
  include('includes/header.php');
  ?>
  <p class="order-title">Your Orders</p>
  <div class="cart">
    <div class="cart-header">
      <div class="header-product">Product</div>
      <div class="header-price">Price</div>
      <div class="header-quantity">Quantity</div>
      <div class="header-action">Status</div>
    </div>


    <?php
    if (isset($_SESSION['user'])) {
      $result = mysqli_query($conn, $query);
      $total_cost = 0;
      $order_date;
      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $total_cost += $row['price'];
          $order_date = $row['order_date'];
    ?>
          <!-- First cart item -->
          <div class="cart-item">
            <div class="product">
              <img src="assets/products/<?php echo $row['img']; ?>" alt="Floral Print Wrap Dress" />
              <div class="product-info">
                <h3><?php echo $row['pname']; ?></h3>
                <?php

                if ($row['size'] != "" || $row['size'] != null) {
                ?>
                  <p>Size <?php echo $row['size']; ?></p>

                <?php
                }
                ?>
              </div>
            </div>
            <div class="price">Rs. <?php echo $row['price']; ?></div>
            <div class="quantity">x1</div>
            <div class="action" style="background-color: <?php $color = $row['status'] == 'Processing' ? '#ff6f00' : 'rgb(64, 216, 64)';
                                                          echo ($color)   ?>"><?php echo $row['status']; ?></div>

          </div>

      <?php
        }
      } else {
        echo "<p class='alert'>No Orders found!</p>";
      }


      ?>
      <div class="total-price">
        <?php

        if (isset($order_date)) {
        ?>
          <p>Ordered Date: <?php echo $order_date; ?></p>
          <p>Total Cost : Rs <?php echo $total_cost + 100; ?></p>
        <?php } ?>
      </div> <?php } else {
              echo "<p class='alert'>Please Login</p>";
            }
              ?>
  </div>




  <?php
  include('includes/footer.php');
  ?>
</body>

</html>