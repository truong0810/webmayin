<?php
include("../../config/config.php");
$id = $_POST['cate_id'];
$tendanhmuc = $_POST['cate_name'];
$slug = $_POST['cate_slug'];
if (isset($_POST['cate_update'])) {
  $SQL = "UPDATE category SET name='" . $tendanhmuc . "',slug='" . $slug . "' WHERE id = $id";
  mysqli_query($mysqli, $SQL);
  header("Location:../../index.php?action=quanlydanhmucsanpham");
  mysqli_close($mysqli);
}
