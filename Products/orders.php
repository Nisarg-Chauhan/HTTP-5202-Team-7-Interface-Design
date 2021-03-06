<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}


if (!isset($_SESSION["login"])) {
  header("location:../login/login.php");
}
include '../template/header.php';
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Orders || Your wellbeing</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>

<body>


  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <h3>My Orders</h3>
      <hr>

      <?php

      $user = $_SESSION['login'];

      $result = $mysqli->query("SELECT * from orders where email='" . $user . "'");

      if ($result) {
        while ($obj = $result->fetch_object()) {
          //echo '<div class="large-6">';
          echo '<p><h4>Order ID ->' . $obj->id . '</h4></p>';
          echo '<p><strong>Date of Purchase</strong>: ' . $obj->date . '</p>';
          echo '<p><strong>Product Code</strong>: ' . $obj->product_code . '</p>';
          echo '<p><strong>Product Name</strong>: ' . $obj->product_name . '</p>';
          echo '<p><strong>Price Per Unit</strong>: ' . $obj->price . '</p>';
          echo '<p><strong>Units Bought</strong>: ' . $obj->units . '</p>';
          echo '<p><strong>Total Cost</strong>: ' . $currency . $obj->total . '</p>';
          echo '<p><hr></p>';
        }
      }
      ?>
    </div>
  </div>




  <script src="../js/vendor/jquery.js"></script>
  <script src="../js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
<?php include '../template/footer.php'  ?>

</html>