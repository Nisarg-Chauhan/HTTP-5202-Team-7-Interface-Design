<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

include '../template/header.php';
require_once '../Models/Database.php';
require_once '../Models/Products.php';


$dbcon = Database::getDb();
$product = new Product();
$products =  $product->getAllProducts($dbcon);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products || Your Wellbeing</title>
  <link rel="stylesheet" href="../css/style_product.css" />
  <link rel="stylesheet" href="../css/foundation.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>

<body>


  <div class="grid">

    <?php
    $product_id = array();
    $product_quantity = array();

    foreach ($products as $product) {

      echo '<div class="item">';
      echo '<div class="img-container">';
      echo '<img src="../images/products/' . $product->product_img_name . '"/>';
      echo '</div>';

      echo '<div class="product-info">';
      echo '<p><h3>' . $product->product_name . '</h3></p>';
      echo '<p><strong>Product Code</strong>: ' . $product->product_code . '</p>';
      echo '<p><strong>Description</strong>: ' . $product->product_desc . '</p>';
      echo '<p><strong>Units Available</strong>: ' . $product->qty . '</p>';
      echo '<p><strong>Price </strong>: $' . $product->price . '</p>';
      echo '</div>';

      if ($product->qty > 0) {
        echo '<p><a href="update-cart.php?action=add&id=' . $product->id . '"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
      } else {
        echo 'Out Of Stock!';
      }

      echo '</div>';
    }


    $_SESSION['product_id'] = $product_id;
    echo '</div>';

    ?>


    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>

<?php include '../template/footer.php'  ?>


</html>