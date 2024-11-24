<?php
session_start();
require_once 'includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Podu</title>
  <link rel="stylesheet" href="style/header.css" />
  <link rel="stylesheet" href="style/landing.css" />
  <link rel="stylesheet" href="style/footer.css" />
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
<!-- HEADER -->
<?php
include('includes/header.php');
include('includes/search.php');
?>

<!-- BANNER -->
<div class="banner">
  <img src="assets/images/banner.jpg" alt="banner" />
  <div class="info">
    <h1>Shopping And Department Store.</h1>
    <p>
      Shopping is a bit of a relaxing hobby for me, which is sometimes
      troubling for the bank balance.
    </p>
    <button>Learn More</button>
  </div>
</div>

<!-- CATEGORIES -->

<div class="categories">
  <p class="top-categories">Shop Our Top Categories</p>

  <div class="category-list">
    <a href="products.php?category=Dress">
      <div class="category-item">
        <img src="assets/images/Magar Gurung Designer Hand Embroidered Traditional Lehenga Dress.jpg" alt="Bangle" />
        <p>Dress</p>
      </div>
    </a>
    <a href="products.php?category=Neckpiece">
      <div class="category-item">
        <img src="assets/images/Neckpiece.jpeg" alt="Neckpiece" />
        <p>Neckpiece</p>
      </div>
    </a>
    <a href="products.php?category=Earrings">
      <div class="category-item">
        <img src="assets/images/Maadwaari.jpeg" alt="Earrings" />
        <p>Earrings</p>
      </div>
    </a>
    <a href="products.php?category=Head">
      <div class="category-item">
        <img src="assets/images/Head.jpeg" alt="Head" />
        <p>Head</p>
      </div>
    </a>
    <a href="products.php?category=Other">
      <div class="category-item">
        <img src="assets/images/Dhimal Kantha.jpeg" alt="Bangle" />
        <p>Accessories</p>
      </div>
    </a>


  </div>
</div>

<!-- PRODUCTS SECTION -->


<p class="section">Our Products</p>
<div class="products">
  <?php
  $products = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
  $result = mysqli_query($conn, $products);
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <a class="product-info" href="product-info.php?pid=<?php echo $row['pid']; ?>" style="text-decoration: none;">
        <div class="product-card">
          <div class="product-image">
            <img src="assets/products/<?php echo $row['image']; ?>" alt="<?php echo ($row['pname']) ?>" />
          </div>

          <h3><?php echo $row['pname']; ?></h3>
          <p>Organic Cotton, fairtrade certified</p>
          <div class="price-rating">
            <span>Rs. <?php echo $row['price']; ?></span>
          </div>
          <a href="product-info.php?pid=<?php echo $row['pid']; ?>">

            <button>Show Product</button>
          </a>
        </div>
      </a>


  <?php
    }
  } else {
    echo "<p>No products foune!</p>";
  }

  ?>

</div>

<a href="products.php" class="show-product">
  <div class="show-all-products">
    <button class="all-products">Show All Products</button>
  </div>
</a>


<!-- FOR MEN -->

<p class="section">For Men</p>
<div class="products">
  <?php
  $men = "SELECT * FROM products WHERE gender='male' ORDER BY RAND() LIMIT 4";
  $result = mysqli_query($conn, $men);
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <a class="product-info" href="product-info.php?pid=<?php echo $row['pid']; ?>" style="text-decoration: none;">
        <div class="product-card">
          <div class="product-image">
            <img src="assets/products/<?php echo $row['image']; ?>" alt="<?php echo ($row['pname']) ?>" />
          </div>

          <h3><?php echo $row['pname']; ?></h3>
          <p>Organic Cotton, fairtrade certified</p>
          <div class="price-rating">
            <span>Rs. <?php echo $row['price']; ?></span>
          </div>
          <a href="product-info.php?pid=<?php echo $row['pid']; ?>">

            <button>Show Product</button>
          </a>

        </div>
      </a>

  <?php
    }
  } else {
    echo "<p>No products found!</p>";
  }
  ?>
</div>
<a href="products.php?gender=male" class="show-product">

  <div class="show-all-products">
    <button class="all-products">Show For Men</button>
  </div>
</a>


<div class="discount">
  <div class="left">
    <p>Get 10% off</p>
    <button>Learn More</button>
  </div>
  <div class="right">
    <img src="assets/images/nepali.png" alt="" />
  </div>
</div>

<!-- FOR WOMEN -->

<p class="section">For Women</p>
<div class="products">
  <?php
  $women = "SELECT * FROM products WHERE gender='female' ORDER BY RAND() LIMIT 4";
  $result = mysqli_query($conn, $women);
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <a class="product-info" href="product-info.php?pid=<?php echo $row['pid']; ?>" style="text-decoration: none;">
        <div class="product-card">
          <div class="product-image">
            <img src="assets/products/<?php echo $row['image']; ?>" alt="<?php echo ($row['pname']) ?>" />
          </div>

          <h3><?php echo $row['pname']; ?></h3>
          <p>Organic Cotton, fairtrade certified</p>
          <div class="price-rating">
            <span>Rs. <?php echo $row['price']; ?></span>
          </div>
          <a href="product-info.php?pid=<?php echo $row['pid']; ?>">

            <button>Show Product</button>
          </a>
        </div>
      </a>

  <?php
    }
  } else {
    echo "<p>No products found!</p>";
  }
  ?>
</div>

<a href="products.php?gender=female" class="show-product">
  <div class="show-all-products">
    <button class="all-products">Show For Women</button>
  </div>
</a>


<?php
include('includes/footer.php');
?>
</body>
<script src="js/script.js" type="javascript">
</script>


</html>