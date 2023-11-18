<?php
require_once("../../config/config.php");
$product_id = $_POST['pr_id'];

$tensanpham = $_POST['product_name'];

$nhasanxuat = intval($_POST['manufacturer_id']);
$danhmuc = intval($_POST['category_id']);

$giagoc = floatval($_POST['product_price']);
$giakhuyenmai = floatval($_POST['product_discount']);
$loaimay = $_POST['product_type'];
$khogiay = $_POST['product_papersize'];
$tocdoscan = $_POST['product_scanspeed'];
$scanhaimat = intval($_POST['product_doublescan']);
$khuyenmai = intval($_POST['product_promotion']);
$banchay = intval($_POST['product_selling']);
$khaynaptudong = intval($_POST['product_automatic']);
$conggiaotiep = $_POST['product_communicate'];
$baohanh = $_POST['product_warranty'];
$tinhtrangmay = $_POST['product_condition'];
$motasanpham = $_POST['product_desc'];

// THÔNG SỐ PHỤ
$chungloai = $_POST['product_species'];
$loaimayin = $_POST['product_machinetype'];
$chukyhoatdong = $_POST['product_activitycycle'];
$dophangiai = $_POST['product_opticalresolution'];
$congsuatkhaynap = $_POST['product_autodocfeeder'];
$tuychonquet = $_POST['product_scanoptions'];
$kichthuocquet = $_POST['product_scansize'];
$trongluonghotro = $_POST['product_supportweight'];
$tocdoquet = $_POST['product_autoscanspeed'];
$chieusaubitmau = $_POST['product_colorbitdepth'];
$bonho = $_POST['product_memory'];
$dinhdangscanfile = $_POST['product_scanfileformat'];
$ketnoi = $_POST['product_connect'];
$hedieuhanh = $_POST['product_operatingsystem'];
$kichthuoc = $_POST['product_printersize'];
$trongluong = $_POST['product_weight'];

//THUMBNAIL
$thumbnail = $_FILES['product_thumbnail'];
$pr_thumbnail = $thumbnail['name'];
$thumbnail_tmp = $thumbnail['tmp_name'];

//PRODUCTS IMAGES
$images = $_FILES['product_images'];
$num_of_imgs = count($images['name']);
$new_images_selected = false;

if (isset($_POST['product_update'])) {

  // Kiểm tra xem ảnh chính thumbnail có thay đổi hay không
  if ($thumbnail['error'] === UPLOAD_ERR_OK) {
    // Xử lý và lưu ảnh mới vào thư mục
    $pr_thumbnail = time() . '_' . $pr_thumbnail;
    move_uploaded_file($thumbnail_tmp, 'store/' . $pr_thumbnail);
    // Xóa ảnh cũ nếu tồn tại
    $sql_thumbnail = "SELECT * FROM product WHERE id = $product_id";
    $query_thumbnail = mysqli_query($mysqli, $sql_thumbnail);
    while ($row = mysqli_fetch_array($query_thumbnail)) {
      // Kiểm tra nếu có ảnh cũ, thì xóa ảnh cũ trước khi cập nhật ảnh mới
      if (!empty($row['thumbnail'])) {
        unlink('store/' . $row['thumbnail']);
      }
    }

    if ($num_of_imgs > 0 && !empty($images['name'][0])) {
      $new_images_selected = true;
      // Xóa ảnh cũ nếu tồn tại
      $sql_product_images = "SELECT * FROM product_images WHERE product_id = $product_id";
      $query_product_images = mysqli_query($mysqli, $sql_product_images);
      while ($row = mysqli_fetch_array($query_product_images)) {
        // Kiểm tra nếu có ảnh cũ, thì xóa ảnh cũ trước khi cập nhật ảnh mới
        if (!empty($row['images'])) {
          unlink('store/' . $row['images']);
          $image_id = $row['id'];
          $sql_delete_image = "DELETE FROM product_images WHERE id = $image_id";
          mysqli_query($mysqli, $sql_delete_image);
        }
      }
      // Xử lý và lưu ảnh mới
      for ($i = 0; $i < $num_of_imgs; $i++) {
        $image_name = $images['name'][$i];
        $tmp_name = $images['tmp_name'][$i];
        $error = $images['error'][$i];

        if ($error === 0) {
          $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
          $img_ex_lc = strtolower($img_ex);
          $allowed_exs = array('jpg', 'jpeg', 'png', 'gif');

          if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = time() . '_' . $image_name;
            $img_upload_path = 'store/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $sql_update_images = "INSERT INTO product_images (product_id, images) VALUES ($product_id, '$new_img_name')";
            mysqli_query($mysqli, $sql_update_images);
          }
        }
      }
    }
    if (!$new_images_selected) {
      // Nếu không chọn ảnh mới, lấy ảnh trong cơ sở dữ liệu
      $sql_product_images = "SELECT * FROM product_images WHERE product_id = $product_id";
      $query_product_images = mysqli_query($mysqli, $sql_product_images);
      while ($row = mysqli_fetch_array($query_product_images)) {
        // Sử dụng ảnh từ cơ sở dữ liệu để cập nhật
        $image_name_update = $row['images'];
        $image_id = $row['id'];
        $sql_update_images = "UPDATE product_images SET images='$image_name_update' WHERE id = $image_id";
        mysqli_query($mysqli, $sql_update_images);
      }
    }

    // Cập nhật thông tin sản phẩm chính
    $sql_update_product = "UPDATE product SET category_id = $danhmuc, manufacturer_id = $nhasanxuat, title = '$tensanpham', price = $giagoc, discount = $giakhuyenmai, printer_type = '$loaimay', paper_size = '$khogiay', scan_speed = '$tocdoscan', double_sided_scanning = $scanhaimat, automatic_paper_feeder = $khaynaptudong, printer_communicate = '$conggiaotiep', warranty = '$baohanh',
    thumbnail = '$pr_thumbnail', printer_condition = '$tinhtrangmay', hot_selling = $banchay, hot_sale = $khuyenmai WHERE id = $product_id";
  } else {
    if ($num_of_imgs > 0 && !empty($images['name'][0])) {
      $new_images_selected = true;
      // Xóa ảnh cũ nếu tồn tại
      $sql_product_images = "SELECT * FROM product_images WHERE product_id = $product_id";
      $query_product_images = mysqli_query($mysqli, $sql_product_images);
      while ($row = mysqli_fetch_array($query_product_images)) {
        // Kiểm tra nếu có ảnh cũ, thì xóa ảnh cũ trước khi cập nhật ảnh mới
        if (!empty($row['images'])) {
          unlink('store/' . $row['images']);
          $image_id = $row['id'];
          $sql_delete_image = "DELETE FROM product_images WHERE id = $image_id";
          mysqli_query($mysqli, $sql_delete_image);
        }
      }
      // Xử lý và lưu ảnh mới
      for ($i = 0; $i < $num_of_imgs; $i++) {
        $image_name = $images['name'][$i];
        $tmp_name = $images['tmp_name'][$i];
        $error = $images['error'][$i];

        if ($error === 0) {
          $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
          $img_ex_lc = strtolower($img_ex);
          $allowed_exs = array('jpg', 'jpeg', 'png', 'gif');

          if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = time() . '_' . $image_name;
            $img_upload_path = 'store/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $sql_update_images = "INSERT INTO product_images (product_id, images) VALUES ($product_id, '$new_img_name')";
            mysqli_query($mysqli, $sql_update_images);
          }
        }
      }
    }
    if (!$new_images_selected) {
      // Nếu không chọn ảnh mới, lấy ảnh trong cơ sở dữ liệu
      $sql_product_images = "SELECT * FROM product_images WHERE product_id = $product_id";
      $query_product_images = mysqli_query($mysqli, $sql_product_images);
      while ($row = mysqli_fetch_array($query_product_images)) {
        // Sử dụng ảnh từ cơ sở dữ liệu để cập nhật
        $image_name_update = $row['images'];
        $image_id = $row['id'];
        $sql_update_images = "UPDATE product_images SET images='$image_name_update' WHERE id = $image_id";
        mysqli_query($mysqli, $sql_update_images);
      }
    }
    $sql_update_product = "UPDATE product SET category_id = $danhmuc, manufacturer_id = $nhasanxuat, title = '$tensanpham', price = $giagoc, discount = $giakhuyenmai, printer_type = '$loaimay', paper_size = '$khogiay', scan_speed = '$tocdoscan', double_sided_scanning = $scanhaimat, automatic_paper_feeder = $khaynaptudong, printer_communicate = '$conggiaotiep', warranty = '$baohanh', printer_condition = '$tinhtrangmay', hot_selling = $banchay, hot_sale = $khuyenmai WHERE id = $product_id";
  }

  mysqli_query($mysqli, $sql_update_product);

  // Cập nhật thông tin sản phẩm chi tiết
  // Kiểm tra xem sản phẩm có tồn tại trong cơ sở dữ liệu hay không
  $sql_check_product = "SELECT * FROM product_details WHERE product_id = $product_id";
  $result_check_product = mysqli_query($mysqli, $sql_check_product);

  if (mysqli_num_rows($result_check_product) > 0) {
    $sql_update_product_details = "UPDATE product_details SET species = '$chungloai', machine_type = '$loaimayin', activity_cycle = '$chukyhoatdong', optical_resolution = '$dophangiai', auto_doc_feeder = '$congsuatkhaynap', scan_options = '$tuychonquet', scan_size = '$kichthuocquet', support_weight = '$trongluonghotro', auto_scan_speed = '$tocdoquet', color_bit_depth = '$chieusaubitmau', memory = '$bonho', scan_file_format = '$dinhdangscanfile', connect = '$ketnoi', operating_system = '$hedieuhanh', printer_size = '$kichthuoc', printer_weight = '$trongluong', description = '$motasanpham' WHERE product_id = $product_id";
  } else {
    $sql_update_product_details = "INSERT INTO product_details(product_id,species,machine_type,activity_cycle,optical_resolution,auto_doc_feeder,scan_options,scan_size,support_weight,auto_scan_speed,color_bit_depth,memory,scan_file_format,connect,operating_system,printer_size,printer_weight,description) VALUES($product_id,'" . $chungloai . "','" . $loaimayin . "','" . $chukyhoatdong . "','" . $dophangiai . "','" . $congsuatkhaynap . "','" . $tuychonquet . "','" . $kichthuocquet . "','" . $trongluonghotro . "','" . $tocdoquet . "','" . $chieusaubitmau . "','" . $bonho . "','" . $dinhdangscanfile . "','" . $ketnoi . "','" . $hedieuhanh . "','" . $kichthuoc . "','" . $trongluong . "','" . $motasanpham . "')";
  }

  mysqli_query($mysqli, $sql_update_product_details);

  header("Location:../../index.php?action=quanlysanpham");
  mysqli_close($mysqli);
}
