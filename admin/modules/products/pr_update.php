<?php
require 'check_super_admin_login.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}

$product_id = $_GET['id'];
$sql_update = "SELECT product.*,category.name AS category_name, manufacturer.name AS manufacturer_name, product_details.*, product_images.*
FROM product
LEFT JOIN category ON product.category_id = category.id
LEFT JOIN manufacturer ON product.manufacturer_id = manufacturer.id
LEFT JOIN product_details ON product.id = product_details.product_id
LEFT JOIN product_images ON product.id = product_images.product_id
WHERE product.id = $product_id";

$query_product = mysqli_query($mysqli, $sql_update);
$each = mysqli_fetch_array($query_product);

if (!$each) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}

// Tiến hành tạo các giá trị mặc định cho các trường select
$selected_category_id = $each['category_id'];
$selected_manufacturer_id = $each['manufacturer_id'];

// Thực hiện truy vấn SQL để lấy danh sách các category và manufacturer mới nhất
$sql_categories = "SELECT * FROM category";
$query_categories = mysqli_query($mysqli, $sql_categories);

$sql_manufacturers = "SELECT * FROM manufacturer";
$query_manufacturers = mysqli_query($mysqli, $sql_manufacturers);


// Kiểm tra có ảnh hay không trong product_images
$sql_images_check = "SELECT COUNT(*) AS image_count FROM product_images WHERE product_id = $product_id";
$result_images_check = mysqli_query($mysqli, $sql_images_check);
$row_images_check = mysqli_fetch_assoc($result_images_check);
$image_count = $row_images_check['image_count'];

?>
<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Cập nhập sản phẩm
  </h2>
  <!-- FORM UPDATE PRODUCTS -->
  <form id="form-product-update" action="modules/products/process_product_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="pr_id" value="<?= $product_id ?>" class="hidden" />
    <div class="flex items-center justify-center w-full">
      <label for="dropzone-file" class="w-[350px] flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-xl block relative overflow-hidden mt-5">
        <img id="selected-image" class="absolute inset-0 w-full h-full object-cover" src="modules/products/store/<?php echo $each['thumbnail'] ?>" />
        <input id="dropzone-file" type="file" class="hidden" name="product_thumbnail" />
      </label>
    </div>

    <?php if ($image_count > 0) {
      // Có ảnh, hiển thị HTML
    ?>
      <div class="flex items-center justify-center gap-5">
        <?php foreach ($query_product as $each) : ?>
          <div class="w-[150px] p-1 shadow mt-10">
            <img src="modules/products/store/<?php echo $each['images'] ?>" class="w-full h-full object-cover" />
          </div>
        <?php endforeach; ?>
      </div>
    <?php  }  ?>

    <div class="grid grid-cols-2 gap-5 mt-10">
      <!-- THÔNG SỐ CHÍNH -->
      <div class="flex flex-col gap-3">
        <h2 class="text-xl font-bold text-secondary uppercase">
          Thông số chính
        </h2>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tên sản phẩm</label>
          <input autocomplete="off" name="product_name" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tên sản phẩm....." value="<?= $each['title'] ?>" />
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div class="box-field">
            <label class="block mb-2 text-sm font-semibold cursor-pointer">Chọn nhà sản xuất</label>
            <select name="manufacturer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
              <option>Choose a producer</option>
              <?php foreach ($query_manufacturers as $rs) : ?>
                <?php $selected = ($rs['id'] == $selected_manufacturer_id) ? 'selected' : ''; ?>
                <option value="<?= $rs['id'] ?>" <?= $selected ?>><?= $rs['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="box-field">
            <label class="block mb-2 text-sm font-semibold cursor-pointer">Chọn danh mục</label>
            <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
              <option>Choose a producer</option>
              <?php foreach ($query_categories as $rs) : ?>
                <?php $selected = ($rs['id'] == $selected_category_id) ? 'selected' : ''; ?>
                <option value="<?= $rs['id'] ?>" <?= $selected ?>><?= $rs['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Giá gốc</label>
          <input autocomplete="off" name="product_price" type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập giá gốc của sản phẩm....." value="<?= $each['price'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Giá khuyến mãi</label>
          <input autocomplete="off" name="product_discount" type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập giá khuyến mãi của sản phẩm....." value="<?= $each['discount'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Loại máy</label>
          <input autocomplete="off" name="product_type" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập loại của sản phẩm....." value="<?= $each['printer_type'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Khổ giấy</label>
          <input autocomplete="off" name="product_papersize" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập khổ giấy của sản phẩm....." value="<?= $each['paper_size'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tốc độ scan</label>
          <input autocomplete="off" name="product_scanspeed" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tốc độ scan của sản phẩm....." value="<?= $each['scan_speed'] ?>" />
        </div>

        <div class="flex items-center gap-x-[100px]">
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Scan hai mặt</label>
            <div class="flex items-center gap-5">
              <div class="flex items-center justify-center gap-2">
                <label>Có</label>
                <input type="radio" name="product_doublescan" value="1" <?= $each['double_sided_scanning'] == 1 ? 'checked' : '' ?> />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không</label>
                <input type="radio" name="product_doublescan" value="0" <?= $each['double_sided_scanning'] == 0 ? 'checked' : '' ?> />
              </div>
            </div>
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Khuyến mãi sốc</label>
            <div class="flex items-center gap-5">
              <div class="flex items-center justify-center gap-2">
                <label>Có</label>
                <input type="radio" name="product_promotion" value="1" <?= $each['hot_sale'] == 1 ? 'checked' : '' ?> />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không</label>
                <input type="radio" name="product_promotion" value="0" <?= $each['hot_sale'] == 0 ? 'checked' : '' ?> />
              </div>
            </div>
          </div>
        </div>

        <div class="flex items-center gap-x-[100px]">
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Bán chạy</label>
            <div class="flex items-center gap-5">
              <div class="flex items-center justify-center gap-2">
                <label>Có</label>
                <input type="radio" name="product_selling" value="1" <?= $each['hot_selling'] == 1 ? 'checked' : '' ?> />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không</label>
                <input type="radio" name="product_selling" value="0" <?= $each['hot_selling'] == 0 ? 'checked' : '' ?> />
              </div>
            </div>
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Khay nạp giấy tự động (ADF)</label>
            <div class="flex items-center gap-5">
              <div class="flex items-center justify-center gap-2">
                <label>Có sẵn</label>
                <input type="radio" name="product_automatic" value="1" <?= $each['automatic_paper_feeder'] == 1 ? 'checked' : '' ?> />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không có sẵn</label>
                <input type="radio" name="product_automatic" value="0" <?= $each['automatic_paper_feeder'] == 0 ? 'checked' : '' ?> />
              </div>
            </div>
          </div>
        </div>
        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Cổng giao tiếp</label>
          <input autocomplete="off" name="product_communicate" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập cổng giao tiếp của sản phẩm....." value="<?= $each['printer_communicate'] ?>" />
        </div>


        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Bảo hành</label>
          <input autocomplete="off" name="product_warranty" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập bảo hành của sản phẩm....." value="<?= $each['warranty'] ?>" />
        </div>
        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tình trạng máy</label>
          <input autocomplete="off" name="product_condition" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tình trạng máy của sản phẩm....." value="<?= $each['printer_condition'] ?>" />
        </div>
        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Upload multiple image</label>
          <input autocomplete="off" name="product_images[]" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" type="file" multiple>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Kích thước</label>
          <textarea value="<?= $each['printer_size'] ?>" name="product_printersize" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kích thước của sản phẩm....."><?= $each['printer_size'] ?></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Trọng lượng</label>
          <input autocomplete="off" name="product_weight" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập trọng lượng của sản phẩm....." value="<?= $each['printer_weight'] ?>" />
        </div>
      </div>
      <!-- THÔNG SỐ PHỤ -->
      <div class="flex flex-col gap-3">
        <h2 class="text-xl font-bold text-secondary uppercase">
          Thông số phụ
        </h2>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Chủng loại</label>
          <input autocomplete="off" name="product_species" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chủng loại sản phẩm....." value="<?= $each['species'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Loại máy</label>
          <input autocomplete="off" name="product_machinetype" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập loại máy của sản phẩm....." value="<?= $each['machine_type'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Chu kỳ hoạt động (hàng ngày)</label>
          <input autocomplete="off" name="product_activitycycle" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chu kỳ hoạt động của sản phẩm....." value="<?= $each['activity_cycle'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Độ phân giải quang học</label>
          <input autocomplete="off" name="product_opticalresolution" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập độ phân giải quang học của sản phẩm....." value="<?= $each['optical_resolution'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Công suất khay nạp tài liệu tự động</label>
          <input autocomplete="off" name="product_autodocfeeder" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập công suất khay nạp tài liệu tự động của sản phẩm....." value="<?= $each['auto_doc_feeder'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tùy chọn chụp quét (ADF)</label>
          <input autocomplete="off" name="product_scanoptions" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tùy chọn chụp quét của sản phẩm....." value="<?= $each['scan_options'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Kích thước chụp quét (ADF)</label>
          <textarea value="<?= $each['scan_size'] ?>" name="product_scansize" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kích thước của sản phẩm....."><?= $each['scan_size'] ?></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Trọng lượng giấy ảnh media, được hỗ trợ ADF</label>
          <input autocomplete="off" name="product_supportweight" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập trọng lượng của sản phẩm....." value="<?= $each['support_weight'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tốc độ chụp quét của khay nạp tài liệu tự động</label>
          <input autocomplete="off" name="product_autoscanspeed" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tốc độ chụp quét của khay nạp tài liệu tự động của sản phẩm....." value="<?= $each['auto_scan_speed'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Chiều sâu bit màu</label>
          <input autocomplete="off" name="product_colorbitdepth" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chiều sâu bit màu của sản phẩm....." value="<?= $each['color_bit_depth'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Bộ nhớ</label>
          <input autocomplete="off" name="product_memory" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập bộ nhớ của sản phẩm....." value="<?= $each['memory'] ?>" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Định dạng file scan</label>
          <textarea value="<?= $each['scan_file_format'] ?>" name="product_scanfileformat" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập định dạng file scan của sản phẩm....."><?= $each['scan_file_format'] ?></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Kết nối</label>
          <textarea value="<?= $each['connect'] ?>" name="product_connect" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kết nối của sản phẩm....."><?= $each['connect'] ?></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Hệ điều hành tương thích</label>
          <textarea value="<?= $each['operating_system'] ?>" name="product_operatingsystem" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập hệ điều hành tương thích của sản phẩm....."><?= $each['operating_system'] ?></textarea>
        </div>

      </div>
    </div>

    <div class="box-field">
      <label class="text-sm font-semibold cursor-pointer">Mô tả sản phẩm</label>
      <textarea name="product_desc" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập mô tả của sản phẩm....."><?= $each['description'] ?></textarea>
    </div>

    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit" name="product_update">
      <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Cập nhập sản phẩm
      </span>
    </button>
  </form>
</div>