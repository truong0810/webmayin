<?php
require_once("../../config/config.php");
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
$motasanpham = $_POST['product_desc_add'];
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
$pr_thumbnail = time() . '_' . $pr_thumbnail;
$thumbnail_tmp = $_FILES['product_thumbnail']['tmp_name'];

//PRODUCTS IMAGES
$images = $_FILES['product_images'];
$num_of_imgs = count($images['name']);

if (isset($_POST['product_add'])) {
  $sql_product = "INSERT INTO product(category_id,manufacturer_id,title,price,discount,printer_type,paper_size,scan_speed,double_sided_scanning,automatic_paper_feeder,printer_communicate,warranty,thumbnail,printer_condition,hot_selling,hot_sale) VALUES($danhmuc,$nhasanxuat,'" . $tensanpham . "',$giagoc,$giakhuyenmai,'" . $loaimay . "','" . $khogiay . "','" . $tocdoquet . "',$scanhaimat,$khaynaptudong,'" . $conggiaotiep . "','" . $baohanh . "','" . $pr_thumbnail . "','" . $tinhtrangmay . "',$banchay,$khuyenmai)";
  mysqli_query($mysqli, $sql_product);
  move_uploaded_file($thumbnail_tmp, 'store/' . $pr_thumbnail);

  // Lấy id của sản phẩm vừa thêm
  $product_id = $mysqli->insert_id;

  // Thêm sản phẩm bài product_details
  $sql_product_details = "INSERT INTO product_details(product_id,species,machine_type,activity_cycle,optical_resolution,auto_doc_feeder,scan_options,scan_size,support_weight,auto_scan_speed,color_bit_depth,memory,scan_file_format,connect,operating_system,printer_size,printer_weight,description) VALUES($product_id,'" . $chungloai . "','" . $loaimayin . "','" . $chukyhoatdong . "','" . $dophangiai . "','" . $congsuatkhaynap . "','" . $tuychonquet . "','" . $kichthuocquet . "','" . $trongluonghotro . "','" . $tocdoquet . "','" . $chieusaubitmau . "','" . $bonho . "','" . $dinhdangscanfile . "','" . $ketnoi . "','" . $hedieuhanh . "','" . $kichthuoc . "','" . $trongluong . "','" . $motasanpham . "')";
  mysqli_query($mysqli, $sql_product_details);
  // Thêm ảnh sản phẩm vào product_images
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

        $sql_product_images = "INSERT INTO product_images(product_id,images) VALUES($product_id,'" . $new_img_name . "')";
        mysqli_query($mysqli, $sql_product_images);
        move_uploaded_file($tmp_name, $img_upload_path);
      } else {
        $em = "You can't upload files of this type";
        // Xử lý lỗi
        // header("Location:../../index.php?action=quanlysanpham&process=add&error=$em");
      }
    } else {
      $em = "Unknown Error Occurred while uploading";
      // Xử lý lỗi
      // header("Location:../../index.php?action=quanlysanpham&process=add&error=$em");
    }
  }

  // Sau khi thêm sản phẩm và ảnh, bạn có thể thực hiện các hành động khác (ví dụ: chuyển hướng đến trang khác)
  header("Location:../../index.php?action=quanlysanpham");
  mysqli_close($mysqli);
}
