<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

include 'config.php';

$product_id = $_GET['id'];
$action = $_GET['action'];


if ($action === 'empty')
  unset($_SESSION['cart']);

//Get the product from the database
$result = $mysqli->query("SELECT qty FROM products WHERE id = " . $product_id);


if ($result) {

  if ($obj = $result->fetch_object()) {

    switch ($action) {
        //Add quantity
      case "add":
        if ($_SESSION['cart'][$product_id] + 1 <= $obj->qty)
          $_SESSION['cart'][$product_id]++;
        break;

        //Remove Quantity
      case "remove":
        $_SESSION['cart'][$product_id]--;
        if ($_SESSION['cart'][$product_id] == 0)
          unset($_SESSION['cart'][$product_id]);
        break;
    }
  }
}



header("location:cart.php");
