<?php
require_once("admin/config/config.php");
session_start();

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];

if (isset($_POST['user_signup'])) {
  $errors = false;
  $_SESSION['signup_data'] = $_POST;

  // Kiểm tra email trùng lặp
  $SQL = "SELECT COUNT(*) FROM user WHERE email = '$email'";
  $result = mysqli_query($mysqli, $SQL);
  $number_rows = mysqli_fetch_array($result)['COUNT(*)'];

  if ($number_rows > 0) {
    $_SESSION['error_email'] = "Email already exists. Please choose a different email.";
    $errors = true;
  }

  if (empty($password)) {
    $_SESSION['error_password'] = "Trường này không được để trống";
    $errors = true;
  }
  // Kiểm tra mật khẩu không trùng khớp
  if ($password !== $confirmPassword) {
    $_SESSION['error_confirmPassword'] = "Passwords do not match.";
    $errors = true;
  }

  // Kiểm tra và xử lý lỗi
  if ($errors) {
    // Có lỗi, điều hướng về trang signup.php và truyền lỗi dưới dạng query string
    header("Location: signup.php");
    exit();
  }


  // Xoá dữ liệu đã lưu trữ trong session nếu không có lỗi
  unset($_SESSION['signup_data']);

  // Không có lỗi, tiếp tục xử lý đăng ký
  $sql_signup = "INSERT INTO user (fullname, username, email, phone_number, password) VALUES ('$fullname', '$username', '$email', '$phone', '$password')";
  mysqli_query($mysqli, $sql_signup);

  // $sql_select =  "SELECT * FROM user WHERE email = '$email'";
  // $result = mysqli_query($mysqli, $sql_select);
  // $each = mysqli_fetch_array($result);

  // $_SESSION['name_user'] = $fullname;
  // $_SESSION['id_user'] = $each['id'];
  // $_SESSION['avatar_user'] = $each['avatar'];
  // $_SESSION['email_user'] = $each['email'];
  // Điều hướng về trang signup.php sau khi đăng ký thành công
  header("Location: signin.php");
  exit();
}
mysqli_close($mysqli);
