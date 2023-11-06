<?php
include("../../config/config.php");
if (isset($_POST['delete_cate_btn'])) {
  $product_id = mysqli_real_escape_string($mysqli, $_POST['id']);
  $SQL = "DELETE FROM category WHERE id = $product_id";
  $delete_query_run = mysqli_query($mysqli, $SQL);
  if ($delete_query_run) {
    echo 200;
  } else {
    echo 500;
  }
  mysqli_close($mysqli);
}
