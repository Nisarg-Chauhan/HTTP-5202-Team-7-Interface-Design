<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
include '../template/header.php';


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Wellbeing</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>

<body>




  <div class="row" style="margin-top:10px;">
    <div class="small-12">
      <p>Success. Whatever task you performed, has been executed successfully. Congrats!</p>
      <p>In case you purchased a product, then please check your spam in email for the receipt.</p>



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