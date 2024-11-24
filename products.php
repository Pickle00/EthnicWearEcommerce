<?php
require_once 'includes/connection.php';

$query = "SELECT * FROM products";

$title = "All Products";

if (isset($_GET['gender'])) {
    
    $gender = $_GET['gender'];
    if ($gender === 'male' || $gender === 'female') {
        $query = "SELECT * FROM products WHERE gender = '$gender'";
    }

    if($gender === 'male' ){
        $title = "All Men Products";
    }elseif($gender === 'female' ){
        $title = "All Women Products";
    }
}


if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "SELECT * FROM products WHERE category = '$category'";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/header.css" />
    <link rel="stylesheet" href="style/footer.css" />
    <link rel="stylesheet" href="style/product.css" />
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

    <p class="headin"><?php echo $title;?></p>
    <main>

        <?php
        $result = mysqli_query($conn, $query);
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
                        <button>Show Product</button>
                    </div>
                </a>


        <?php
            }
        } else {
            echo "<p>No products foune!</p>";
        }

        ?>


    </main>

    <?php
    include('includes/footer.php');
    ?>

</body>

</html>