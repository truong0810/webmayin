<?php
include("../../config/config.php");
$tendanhmuc = $_POST['cate_name'];
$slug = $_POST['cate_slug'];
if (isset($_POST['cate_add'])) {
  $SQL = "INSERT INTO category(name,slug) VALUES('" . $tendanhmuc . "','" . $slug . "')";
  mysqli_query($mysqli, $SQL);
  header("Location:../../index.php?action=quanlydanhmucsanpham");
  mysqli_close($mysqli);
}
