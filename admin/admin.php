<?php
session_start();
require_once '../includes/connection.php';
if (!isset($_SESSION['admin'])) {
    Header("Location: adminlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style/admin.css" />
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
        <a href="admin.php?page=dashboard"><li><i class="fas fa-tachometer-alt"></i> Dashboard</li></a>
           <a href="admin.php?page=confirmed-orders"> <li><i class="fas fa-check-circle"></i> Confirmed Orders</li></a>
         <a href="admin.php?page=all_products">   <li><i class="fa-solid fa-cart-shopping"></i> All Products</li></a>
           <a href="admin.php?page=add_products"> <li><i class="fas fa-plus-circle"></i> Add Products</li></a>

            <li><a href="alogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Content Area -->
    <div class="content">
        <p class="admin-name"><span>Welcome &nbsp;</span> <?php echo $_SESSION['admin'] ?></p>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'dashboard':

                    include 'dashboard.php';
                    break;
                case 'confirmed-orders':
                    include 'confirmed_orders.php';
                    break;
                case 'add_products':
                    include 'add_products.php';
                    break;
                case 'all_products':
                    include 'all_products.php';
                    break;
                case 'logout':
                    include 'logout.php';
                    break;
                default:
                    include 'dashboard.php';
            }
        } else {
            include 'dashboard.php';
        }
        ?>
    </div>

</body>

</html>