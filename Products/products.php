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
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products || Your Wellbeing</title>
  <link rel="stylesheet" href="../css/style_product.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>

<body>


  <div class="flex">

    <?php
    $product_id = array();
    $product_quantity = array();
    foreach ($products as $product) {

      echo '<section>';

      //echo '<div class="item">';
      echo '<div class="img-container">';
      echo '<img src="../images/products/' . $product->product_img_name . '"/>';
      echo '</div>';

      //echo '<div class="product-info">';
      echo '<p><h3>' . $product->product_name . '</h3></p>';
      echo '<p><strong>Product Code</strong>: ' . $product->product_code . '</p>';
      echo '<p><strong>Description</strong>: ' . $product->product_desc . '</p>';

      echo '<aside>';
      echo '<ul>';
      echo '<li><strong>Units</strong>: ' . $product->qty . '</li>';
      echo '<li><strong>Price </strong>: $' . $product->price . '</li>';
      echo '</ul>';

      //echo '</div>';

      if ($product->qty > 0) {
        echo '<p><a href="update-cart.php?action=add&id=' . $product->id . '"><input type="submit" value="Add To Cart"  /></a></p>';
      } else {
        echo 'Out Of Stock!';
      }
      echo '</aside>';
      echo '</section>';
    }

    $_SESSION['product_id'] = $product_id;
    echo '</div>';

    ?>


    <script src="../js/vendor/jquery.js"></script>

</body>

<?php include '../template/footer.php'  ?>


</html>