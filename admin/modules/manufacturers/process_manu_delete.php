<?php
include("../../config/config.php");
if (isset($_POST['delete_manu_btn'])) {
  $manu_id = mysqli_real_escape_string($mysqli, $_POST['id']);
  $SQL = "DELETE FROM manufacturer WHERE id = $manu_id";
  $delete_query_run = mysqli_query($mysqli, $SQL);
  if ($delete_query_run) {
    echo 200;
  } else {
    echo 500;
  }
  mysqli_close($mysqli);
}
