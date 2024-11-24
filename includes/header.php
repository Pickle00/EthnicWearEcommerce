<?php
$no_of_product = 0;
if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $cart_item) {
    $no_of_product += 1;
  }
}

?>
<div class="announcement">
  <div class="announcement-socials">
    <ul class="socials">
      <li class="social-item">
        <a href="https://twitter.com/">
          <i class="fa-brands fa-x-twitter"></i>
        </a>
      </li>
      <li class="social-item">
        <a href="https://facebook.com">
          <i class="fa-brands fa-square-facebook"></i>
        </a>
      </li>
      <li class="social-item">
        <a href="https://instagram.com"><i class="fa-brands fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="announcement-head">
    <span>Order now & get 10% Discount</span>
  </div>
  <div class="announcement-contact">
    <span><i class="fa-solid fa-phone"></i> +977 9812345678</span>
    <span><i class="fa-regular fa-envelope"></i> ethnicwear@gmail.com</span>
  </div>
</div>
<header>
  <div class="section-left">
    <div class="headlogo">
      <img src="assets/images/logo.jpg" alt="logo" class="logo" />
    </div>
    <div class="nav-shop">
      <ul>
        <a class="options" href="index.php">
          <li>Home</li>
        </a>
        <a class="options" href="products.php">
          <li>Products</li>
        </a>
        <a class="options" href="products.php?gender=male">
          <li>Men</li>
        </a>
        <a class="options" href="products.php?gender=female">
          <li>Women</li>
        </a>
        <a class="options" href="orders.php">
          <li>Orders</li>
        </a>
      </ul>
    </div>
  </div>
  <div class="section-right">
    <form action="" class="form-search" method="get">
      <input type="text" class="search" placeholder="search" onkeyup="liveSearch()" id="searchBar" autocomplete="off" />
      <button class="search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </form>
    <div id="searchResults" class="search-results">
    </div>
    <div class="right">

      <?php
      if (!isset($_SESSION['user'])) {
      ?>


        <a class="my-account" href="login.php">
          <i class="fa-regular fa-user"></i>
          <span>Account</span>
        </a>


      <?php
      } else {

      ?>
        <a class="my-account" href="logout.php">
          <i class="fa-regular fa-user"></i>
          <p><span><?php echo ($_SESSION['user']);  ?></span></p>
        </a>


      <?php
      }
      ?>
      <a class="shopping-cart" href="cart.php">
        <i class="fa-solid fa-cart-shopping"></i>
        <label class="no-of-products"><?php echo ($no_of_product); ?></label>
        <span>Cart</span>
      </a>
    </div>
  </div>
</header>

<script>
  function liveSearch() {
    var searchQuery = document.getElementById('searchBar').value;
    var searchResults = document.getElementById('searchResults');

    // Show the search results if there is input
    if (searchQuery.length > 0) {
      searchResults.style.display = 'block'; // Show results
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          searchResults.innerHTML = xhr.responseText;
        }
      };
      xhr.open("GET", "includes/search.php?query=" + searchQuery, true);
      xhr.send();
    } else {
      searchResults.style.display = 'none';
    }
  }

  document.querySelector('.form-search').addEventListener('submit', function(e) {
    e.preventDefault();
  });

  document.addEventListener('click', function(event) {
    var searchBar = document.getElementById('searchBar');
    var searchResults = document.getElementById('searchResults');

    if (!searchBar.contains(event.target) && !searchResults.contains(event.target)) {
      searchResults.style.display = 'none';
    }
  });
</script>