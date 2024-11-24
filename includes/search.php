<?php

require_once 'connection.php';
if (isset($_GET['query'])) {
    $search = $_GET['query'];
    $query = "SELECT * FROM products WHERE pname LIKE '%$search%' OR category LIKE '%$search%' LIMIT 5";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           echo ' <a class="product-link" href="product-info.php?pid='.$row['pid'].'" style="text-decoration: none;">';
            echo '<div class="search-item">';
            echo '<img src="assets/products/' . $row['image'] . '" alt="Product Image">';

            echo '<p>' . $row['pname'] . '</p>';

            echo '</div>';
            echo '</a>';
        }
    } else {
        echo '<p>No results found</p>';
    }
}
