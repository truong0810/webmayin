<?php
include("../../config/config.php");
$id = $_POST['manu_id'];
$tennhasanxuat = $_POST['manu_name'];
$sodienthoai = $_POST['manu_phone'];
$diachi = $_POST['manu_address'];
$image = $_FILES['manu_logo']['name'];
$image_tmp = $_FILES['manu_logo']['tmp_name'];

if (isset($_POST['manu_update'])) {
  // Kiểm tra xem có ảnh mới được tải lên hay không
  if ($_FILES['manu_logo']['error'] === UPLOAD_ERR_OK) {
    // Xử lý và lưu ảnh mới vào thư mục
    $image = time() . '_' . $image;
    move_uploaded_file($image_tmp, 'uploads/' . $image);
    // Xóa ảnh cũ nếu tồn tại
    $SQL = "SELECT * FROM manufacturer WHERE id = $id";
    $QUERY = mysqli_query($mysqli, $SQL);
    while ($row = mysqli_fetch_array($QUERY)) {
      // Kiểm tra nếu có ảnh cũ, thì xóa ảnh cũ trước khi cập nhật ảnh mới
      if (!empty($row['logo'])) {
        unlink('uploads/' . $row['logo']);
      }
    }
    $SQL_UPDATE = "UPDATE manufacturer SET name='" . $tennhasanxuat . "', logo='" . $image . "', phone_number='" . $sodienthoai . "', address='" . $diachi . "' WHERE id = '$id'";
  } else {
    $SQL_UPDATE = "UPDATE manufacturer SET name='" . $tennhasanxuat . "', phone_number='" . $sodienthoai . "', address='" . $diachi . "' WHERE id = '$id'";
  }
  mysqli_query($mysqli, $SQL_UPDATE);
  header("Location:../../index.php?action=quanlyhangsanxuat");
  mysqli_close($mysqli);
}
