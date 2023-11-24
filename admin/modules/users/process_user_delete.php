<?php
include("../../config/config.php");
if (isset($_POST['delete_user_button'])) {
  $user_id = mysqli_real_escape_string($mysqli, $_POST['id']);

  // Lấy thông tin avatar và xóa dữ liệu trong database
  $sql_avatar = "SELECT avatar FROM user WHERE id = $user_id";
  $result_avatar = mysqli_query($mysqli, $sql_avatar);
  $row = mysqli_fetch_array($result_avatar);
  $logo_path = 'uploads/' . $row['avatar'];


  $SQL = "DELETE FROM user WHERE id = $user_id";
  $delete_query_run = mysqli_query($mysqli, $SQL);
  if ($delete_query_run && !empty($row['avatar']) && file_exists($logo_path)) {
    unlink($logo_path);
    echo 200;
  } else {
    echo 500;
  }
  mysqli_close($mysqli);
}
