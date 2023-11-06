<?php
include("../../config/config.php");
$tennhasanxuat = $_POST['manu_name'];
$sodienthoai = $_POST['manu_phone'];
$diachi = $_POST['manu_address'];
$image = $_FILES['manu_logo']['name'];
$image = time() . '_' . $image;

$image_tmp = $_FILES['manu_logo']['tmp_name'];
if (isset($_POST['manu_add'])) {
  $SQL = "INSERT INTO manufacturer(name,logo,phone_number,address) VALUES('" . $tennhasanxuat . "','" . $image . "','" . $sodienthoai . "','" . $diachi . "')";
  mysqli_query($mysqli, $SQL);
  move_uploaded_file($image_tmp, 'uploads/' . $image);
  header("Location:../../index.php?action=quanlyhangsanxuat");
  mysqli_close($mysqli);
}
