<?php
session_start();
require_once 'includes/connection.php';


  $pid = $_GET['pid'];

  $query = "SELECT * FROM products WHERE pid =$pid";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);



  if (isset($_POST['add_to_cart'])) {
    // pname	price	fname	lname	order_date	address	phone_no	img
    if ($row['category'] == "Dress") {
      $size = $_POST['size'];
    } else {
      $size = "";
    }
    $pname = $row['pname'];
    $price = $row['price'];
    $category = $row['category'];
    $image = $row['image'];


    $cart_item = array(
      'pname' => $pname,
      'price' => $price,
      'image' => $image,
      'size' => $size,
      'category' => $category
    );

    $_SESSION['cart'][] = $cart_item;
    foreach ($_SESSION['cart'] as $item) {
    }

    // unset($_SESSION['cart']);
    echo "<script>alert('Product added to cart.');</script>";
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/header.css" />
  <link rel="stylesheet" href="style/landing.css" />
  <link rel="stylesheet" href="style/footer.css" />
  <link rel="stylesheet" href="style/product-info.css" />
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
  </head>
  <?php
  include('includes/header.php');

  ?>

  <!-- PRODUCT DESCRIPTION -->
  <p class="product-title">Product</p>
  <div class="product-detail">
    <div class="left">
      <div class="product-image">
        <img src="assets/products/<?php echo $row['image']; ?>" alt="">
      </div>
    </div>

    <div class="right">
      <p class="product-name">
        <?php echo $row['pname']; ?>
      </p>
      <p class="price"> <span>Price</span> <br> Rs.<?php echo $row['price']; ?></p>

      <form class="select" method="post">

        <?php

        if ($row['category'] == "Dress") {
          echo ($row['category']);
        ?>
          <p class="choose">Choose a size:</p>


          <div class="size-selection">
            <input type="radio" id="small" name="size" value="small">
            <label for="small" class="size-button">Small</label>

            <input type="radio" id="medium" name="size" value="medium" checked>
            <label for="medium" class="size-button">Medium</label>

            <input type="radio" id="large" name="size" value="large">
            <label for="large" class="size-button">Large</label>
          </div>

        <?php

        } else {
        }
        ?>
        <?php

        if (isset($_SESSION['user'])) {
        ?>
          <div class="button-option">
            <input type="Submit" name="add_to_cart" class="to-cart" value="Add to Cart">
          </div>

        <?php
        }
        ?>



      </form>




      <h3>Description</h3>
      <p class="description"><?php echo $row['description']; ?>
      </p>
    </div>

  </div>


  <!-- FOOTER -->
  <?php
  include('includes/footer.php');
  ?>



</body>

</html>