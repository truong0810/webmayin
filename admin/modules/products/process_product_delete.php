<?php
require_once("../../config/config.php");
if (isset($_POST['delete_product_button'])) {
  $product_id = mysqli_real_escape_string($mysqli, $_POST['id']);

  // Tắt kiểm tra ràng buộc khóa ngoại để xóa các hàng con trước
  mysqli_query($mysqli, "SET FOREIGN_KEY_CHECKS = 0");

  // Lấy danh sách ảnh từ bảng product_images
  $sql_select_images = "SELECT images FROM product_images WHERE product_id = $product_id";
  $result_select_images = mysqli_query($mysqli, $sql_select_images);
  // Duyệt qua các ảnh và xoá từ thư mục "store/"
  while ($image_row = mysqli_fetch_array($result_select_images)) {
    $image_path = 'store/' . $image_row['images'];
    if (file_exists($image_path)) {
      unlink($image_path);
    }
  }

  // Xoá từ bảng product_images
  $sql_delete_images = "DELETE FROM product_images WHERE product_id = $product_id";
  $delete_images_query = mysqli_query($mysqli, $sql_delete_images);

  // Xoá từ bảng product_details
  $sql_delete_details = "DELETE FROM product_details WHERE product_id = $product_id";
  $delete_details_query = mysqli_query($mysqli, $sql_delete_details);

  // Lấy ảnh thumbnail và xóa dữ liệu trong database
  $sql_select_thumbnail = "SELECT thumbnail FROM product WHERE id = $product_id";
  $result_select_thumbnail = mysqli_query($mysqli, $sql_select_thumbnail);
  $row = mysqli_fetch_array($result_select_thumbnail);
  $logo_path = 'store/' . $row['thumbnail'];

  // Xoá từ bảng product
  $sql_delete_product = "DELETE FROM product WHERE id = $product_id";
  $delete_product_query = mysqli_query($mysqli, $sql_delete_product);

  // Bật lại kiểm tra ràng buộc khóa ngoại
  mysqli_query($mysqli, "SET FOREIGN_KEY_CHECKS = 1");

  // Kiểm tra xem tất cả các câu truy vấn DELETE đã thành công
  if ($delete_product_query && $delete_details_query && $delete_images_query) {
    // Kiểm tra và xoá ảnh từ thư mục "store/"
    if (!empty($row['thumbnail']) && file_exists($logo_path)) {
      unlink($logo_path);
      echo 200;
    }
  } else {
    echo 500;
  }
  mysqli_close($mysqli);
}
