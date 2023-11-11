<?php
include("../../config/config.php");

if (isset($_POST['delete_manu_btn'])) {
    $manu_id = mysqli_real_escape_string($mysqli, $_POST['id']);

    // Lấy thông tin logo và xóa dữ liệu trong database
    $sql_select_logo = "SELECT logo FROM manufacturer WHERE id = $manu_id";
    $result_select_logo = mysqli_query($mysqli, $sql_select_logo);
    $row = mysqli_fetch_array($result_select_logo);
    $logo_path = 'uploads/' . $row['logo'];

    $SQL = "DELETE FROM manufacturer WHERE id = $manu_id";
    $delete_query_run = mysqli_query($mysqli, $SQL);

    // Xoá ảnh từ thư mục 'uploads/'
    if ($delete_query_run && !empty($row['logo']) && file_exists($logo_path)) {
        unlink($logo_path);
        echo 200; // Success
    } else {
        echo 500; // Internal Server Error
    }

    mysqli_close($mysqli);
}
