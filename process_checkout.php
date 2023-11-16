<?php
require_once("admin/config/config.php");
session_start();

$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$email_receiver = $_POST['email_receiver'];
$address_receiver = $_POST['address_receiver'];
$note = $_POST['note'];
$user_id = $_SESSION['id_user'];
$cart = $_SESSION['cart'];

$total_price = 0;
foreach ($cart as $each) {
  $total_price += $each['quantity'] * $each['price'];
}
if (isset($_POST['order'])) {
  $sql = "INSERT INTO orders(user_id, fullname, email, phone_number, address, note, total_price) VALUES('$user_id', '$name_receiver', '$email_receiver','$phone_receiver', '$address_receiver', '$note', '$total_price')";
  mysqli_query($mysqli, $sql);

  $sql_query = "SELECT max(id) FROM orders WHERE user_id = '$user_id'";
  $result = mysqli_query($mysqli, $sql_query);
  $order_id = mysqli_fetch_array($result)['max(id)'];

  foreach ($cart as $product_id => $each) {
    $quantity = $each['quantity'];
    $sql = "INSERT INTO orders_details(order_id,product_id,quantity) VALUES('$order_id','$product_id','$quantity')";
    mysqli_query($mysqli, $sql);
  }

  mysqli_close($mysqli);
  unset($_SESSION['cart']);

  header('Location:index.php');
}
