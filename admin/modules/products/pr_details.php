<?php
require 'check_super_admin_login.php';
$product_id = $_GET['id'];

// $query_cate = "SELECT * FROM category";
// $result_cate = mysqli_query($mysqli, $query_cate);

// $query_manu = "SELECT * FROM manufacturer";
// $result_manu = mysqli_query($mysqli, $query_manu);

$sql = "SELECT product.*,category.name AS category_name, manufacturer.name AS manufacturer_name, product_details.*, product_images.*
FROM product
LEFT JOIN category ON product.category_id = category.id
LEFT JOIN manufacturer ON product.manufacturer_id = manufacturer.id
LEFT JOIN product_details ON product.id = product_details.product_id
LEFT JOIN product_images ON product.id = product_images.product_id
WHERE product.id = $product_id";

$query_product = mysqli_query($mysqli, $sql);
$each = mysqli_fetch_array($query_product);
?>

<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Thông tin chi tiết sản phẩm
  </h2>
  <a href="index.php?action=quanlysanpham" class="px-4 py-2 bg-bluebtn rounded-lg text-white hover:bg-bluehover transition-all inline-block mt-3">
    Back to list
  </a>
  <!-- HIỂN THỊ THÔNG TIN SẢN PHẨM -->
  <div>
    <div class="w-[350px] p-1 shadow mx-auto mt-10">
      <img src="modules/products/store/<?php echo $each['thumbnail'] ?>" class=" w-full h-full object-cover" />
    </div>
    <h2 class="text-center text-[35px] font-semibold mt-3">
      <?= $each['title'] ?>
    </h2>
    <div class="flex items-center justify-center gap-5">
      <?php foreach ($query_product as $each) : ?>
        <div class="w-[250px] p-1 shadow mt-10">
          <img src="modules/products/store/<?php echo $each['images'] ?>" class=" w-full h-full object-cover" />
        </div>
      <?php endforeach ?>
    </div>
    <div class="flex flex-col mt-10 gap-6">
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Loại máy:</h4>
        <span class="font-medium text-gray77 text-lg"><?= $each['printer_type'] ?></span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Giá gốc:</h4>
        <span class="font-medium text-gray77 text-lg">
          <?= number_format($each['price'], 0, ',', '.') ?> đ</span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Giá khuyến mãi:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= number_format($each['discount'], 0, ',', '.') ?> đ</span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Danh mục:</h4>
        <span class="font-medium text-gray77 text-lg"><?= $each['category_name'] ?></span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Bán Chạy:</h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['hot_selling'] == 0 ? "Không" : "Có" ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Khuyễn mãi sốc:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['hot_sale'] == 0 ? "Không" : "Có" ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Khổ giấy:</h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['paper_size'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Tốc độ scan:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['scan_speed'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Scan hai mặt:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['double_sided_scanning'] == 0 ? "Không" : "Có" ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Khay nạp giấy tự động (ADF):
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['automatic_paper_feeder'] == 0 ? "Không có sẵn" : "Có sẵn" ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Cổng giao tiếp:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['printer_communicate'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Bảo hành:</h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['warranty'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Tình trạng máy:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['printer_condition'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Hãng sản xuất:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['manufacturer_name'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Chủng loại:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['species'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Loại máy:</h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['machine_type'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Chu kỳ hoạt động (hàng ngày):
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['activity_cycle'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Độ phân giải quang học:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['optical_resolution'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Công suất khay nạp tài liệu tự động:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['auto_doc_feeder'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Tùy chọn chụp quét (ADF) :
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['scan_options'] ?>
        </span>
      </div>
      <div class="box-field flex items-center gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Kích thước chụp quét (ADF):
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['scan_size'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Trọng lượng giấy ảnh media, được hỗ trợ ADF:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['support_weight'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Tốc độ chụp quét của khay nạp tài liệu tự động:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['auto_scan_speed'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Chiều sâu bit màu:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['color_bit_depth'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Bộ nhớ:</h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['memory'] ?>
        </span>
      </div>
      <div class="box-field flex items-center gap-3">
        <h4 class="text-xl font-semibold capitalize w-full max-w-[200px]">
          Định dạng file scan:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['scan_file_format'] ?>
        </span>
      </div>
      <div class="box-field flex items-end gap-3">
        <h4 class="text-xl font-semibold capitalize">Kết nối :</h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['connect'] ?>
        </span>
      </div>
      <div class="box-field flex items-center gap-3">
        <h4 class="text-xl font-semibold capitalize w-full max-w-[270px]">
          Hệ điều hành tương thích :
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['operating_system'] ?>
        </span>
      </div>
      <div class="box-field flex items-center gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Kích thước:
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['printer_size'] ?>
        </span>
      </div>
      <div class="box-field flex items-center gap-3">
        <h4 class="text-xl font-semibold capitalize">
          Trọng lượng :
        </h4>
        <span class="font-medium text-gray77 text-lg">
          <?= $each['printer_weight'] ?>
        </span>
      </div>

      <div class="box-field">
        <h4 class="text-xl font-semibold capitalize">Mô tả:</h4>
        <p class="font-medium text-gray77 text-lg">
          <?= $each['description'] ?>
        </p>
      </div>
    </div>
  </div>
</div>