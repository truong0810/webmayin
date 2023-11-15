<?php
require_once("admin/config/config.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['user_signin'])) {

  if (isset($_POST['remember'])) {
    $remember = true;
  } else {
    $remember = false;
  }

  $SQL = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($mysqli, $SQL);
  //Đếm xem có bao nhiêu bản ghi
  $number_rows = mysqli_num_rows($result);

  if ($number_rows == 1) {
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['name_user'] = $each['fullname'];
    $_SESSION['id_user'] = $id;
    $_SESSION['avatar_user'] = $each['avatar'];
    $_SESSION['email_user'] = $each['email'];
    if ($remember) {
      $token = uniqid('user_', true);
      $sql_update = "UPDATE user SET token = '$token' WHERE id = '$id'";
      mysqli_query($mysqli, $sql_update);
      setcookie('remember', $token, time() + 60 * 60 * 24 * 30);
    }
    header('Location:index.php');
    exit;
  }

  header('Location:signin.php?error=Email hoặc password không chính xác.');
}
