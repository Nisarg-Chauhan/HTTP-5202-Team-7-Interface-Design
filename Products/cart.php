<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

include 'config.php';
include '../template/header.php';

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopping Cart || Your Wellbeing</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>

<body>


  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <?php

      echo '<p><h3>Your Shopping Cart</h3></p>';

      if (isset($_SESSION['cart'])) {

        $total = 0;
        echo '<table>';
        echo '<tr>';
        echo '<th>Code</th>';
        echo '<th>Name</th>';
        echo '<th>Quantity</th>';
        echo '<th>Cost</th>';
        echo '</tr>';
        foreach ($_SESSION['cart'] as $product_id => $quantity) {

          $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = " . $product_id);


          if ($result) {

            while ($obj = $result->fetch_object()) {
              $cost = $obj->price * $quantity; //work out the line cost
              $total = $total + $cost; //add to the total cost

              echo '<tr>';
              echo '<td>' . $obj->product_code . '</td>';
              echo '<td>' . $obj->product_name . '</td>';
              echo '<td>' . $quantity . '&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id=' . $product_id . '">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id=' . $product_id . '">-</a></td>';
              echo '<td>' . $cost . '</td>';
              echo '</tr>';
            }
          }
        }



        echo '<tr>';
        echo '<td colspan="3" align="right">Total</td>';
        echo '<td>' . $total . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Continue Shopping</a>';
        if (isset($_SESSION['login'])) {
          //echo '<a href="orders-update.php"><button style="float:right;">COD</button></a>';
          echo '<div style="float:right;" id="paypal-payment-button">';
        } else {
          echo '<a href="login2.php"><button style="float:right;">Login</button></a>';
        }



        echo '</td>';

        echo '</tr>';
        echo '</table>';
      } else {
        echo "You have no items in your shopping cart.";
      }

      echo '</div>';
      echo '</div>';
      ?>

      <?php include '../template/footer.php'; ?>

      <script src="../js/vendor/jquery.js"></script>
      <script src="../js/foundation.min.js"></script>
      <script>
        $(document).foundation();
      </script>
      <script src="https://www.paypal.com/sdk/js?client-id=AZaQBDBlv2eZeMvgjKpCAsjjPWflWsEWdWxlH7p7flEhlgwadjDYgaaoqSrnLyJj-mUiQhbcTwiC_GTF&disable-funding=credit,card"></script>
      <script src="../js/paypal.js"></script>
</body>

</html>