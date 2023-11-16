<?php
require_once("config/config.php");
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE email = '$email' and password = '$password'";
$result = mysqli_query($mysqli, $sql);

// Chỉ trả về 1 kết quả => Lấy dữ liệu ra và lưu vào SESSION
if (mysqli_num_rows($result) === 1) {
  $each = mysqli_fetch_array($result);

  session_start();
  $_SESSION['id_admin'] = $each['id'];
  $_SESSION['name_admin'] = $each['name'];
  $_SESSION['email'] = $each['email'];
  $_SESSION['level_admin'] = $each['level'];
  $_SESSION['avatar_admin'] = $each['avatar'];

  header('Location:index.php');
  exit;
}

header('Location:signin.php');
