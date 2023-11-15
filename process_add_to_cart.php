<?php
require_once("admin/config/config.php");
session_start();
// unset($_SESSION['cart']);
$id = $_GET['id'];


// SP Chưa có trong giỏ hàng
if (empty($_SESSION['cart'][$id])) {
  $sql = "SELECT * FROM product WHERE id = '$id'";
  $result = mysqli_query($mysqli, $sql);
  $each = mysqli_fetch_array($result);

  $_SESSION['cart'][$id]['name'] = $each['title'];
  $_SESSION['cart'][$id]['thumbnail'] = $each['thumbnail'];
  $_SESSION['cart'][$id]['price'] = $each['discount'];
  $_SESSION['cart'][$id]['quantity'] = 1;
} else {
  $_SESSION['cart'][$id]['quantity']++;
}

print_r($_SESSION['cart']);
