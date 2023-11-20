<?php
require 'check_super_admin_login.php';
$query_cate = "SELECT * FROM category";
$result_cate = mysqli_query($mysqli, $query_cate);

$query_manu = "SELECT * FROM manufacturer";
$result_manu = mysqli_query($mysqli, $query_manu);
?>

<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Thêm mới sản phẩm
  </h2>
  <?php
  if (isset($_GET['error'])) {
    echo "<p class='p-5 font-semibold text-xl text-[#a00]'>";
    echo htmlspecialchars($_GET['error']);
    echo "</p>";
  }
  ?>
  <!-- FORM ADD PRODUCTS -->
  <form id="form-product-add" action="modules/products/process_product_add.php" method="post" enctype="multipart/form-data">
    <div class="flex items-center justify-center w-full">
      <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-full block relative overflow-hidden mt-5">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
          <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
          </svg>
          <p class="mb-2 text-sm text-gray-500">
            <span class="font-semibold">Click to upload</span> or
            drag and drop
          </p>
          <p class="text-xs text-gray-500">
            SVG, PNG, JPG or GIF (MAX. 800x400px)
          </p>
        </div>
        <img id="selected-image" class="absolute inset-0 w-full h-full object-cover" />
        <input id="dropzone-file" type="file" class="hidden" name="product_thumbnail" />
      </label>
    </div>

    <div class="grid grid-cols-2 gap-5 mt-10">
      <!-- THÔNG SỐ CHÍNH -->
      <div class="flex flex-col gap-3">
        <h2 class="text-xl font-bold text-secondary uppercase">
          Thông số chính
        </h2>
        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tên sản phẩm</label>
          <input autocomplete="off" name="product_name" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tên sản phẩm....." />
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div class="box-field">
            <label class="block mb-2 text-sm font-semibold cursor-pointer">Chọn nhà sản xuất</label>
            <select name="manufacturer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
              <?php $selected_cate = false; ?>
              <option <?= $selected_cate || 'selected'; ?>>
                Choose a producer</option>
              <?php foreach ($result_manu as $each) : ?>
                <option value="<?= $each['id'] ?>"><?= $each['name'] ?></option>
                <?php $selected = true; ?>
              <?php endforeach ?>
            </select>
          </div>

          <div class="box-field">
            <label class="block mb-2 text-sm font-semibold cursor-pointer">Chọn danh mục</label>
            <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
              <?php $selected_cate = false; ?>
              <option <?= $selected_cate || 'selected'; ?>>Choose a category</option>
              <?php foreach ($result_cate as $each) : ?>
                <option value="<?= $each['id'] ?>"><?= $each['name'] ?></option>
                <?php $selected = true; ?>
              <?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Giá gốc</label>
          <input autocomplete="off" name="product_price" type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập giá gốc của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Giá khuyến mãi</label>
          <input autocomplete="off" name="product_discount" type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập giá khuyến mãi của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Loại máy</label>
          <input autocomplete="off" name="product_type" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập loại của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Khổ giấy</label>
          <input autocomplete="off" name="product_papersize" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập khổ giấy của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tốc độ scan</label>
          <input autocomplete="off" name="product_scanspeed" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tốc độ scan của sản phẩm....." />
        </div>

        <div class="flex items-center gap-x-[100px]">
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Scan hai mặt</label>
            <div class="flex items-center gap-5">
              <div class="flex items-center justify-center gap-2">
                <label>Có</label>
                <input type="radio" name="product_doublescan" value="1" />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không</label>
                <input type="radio" name="product_doublescan" value="0" />
              </div>
            </div>
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Khuyến mãi sốc</label>
            <div class="flex items-center gap-5">
              <div class="flex items-center justify-center gap-2">
                <label>Có</label>
                <input type="radio" name="product_promotion" value="1" />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không</label>
                <input type="radio" name="product_promotion" value="0" />
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
                <input type="radio" name="product_selling" value="1" />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không</label>
                <input type="radio" name="product_selling" value="0" />
              </div>
            </div>
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Khay nạp giấy tự động (ADF)</label>
            <div class="flex items-center gap-5">
              <div class="flex items-center justify-center gap-2">
                <label>Có sẵn</label>
                <input type="radio" name="product_automatic" value="1" />
              </div>
              <div class="flex items-center justify-center gap-2">
                <label>Không có sẵn</label>
                <input type="radio" name="product_automatic" value="0" />
              </div>
            </div>
          </div>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Cổng giao tiếp</label>
          <input autocomplete="off" name="product_communicate" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập cổng giao tiếp của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Bảo hành</label>
          <input autocomplete="off" name="product_warranty" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập bảo hành của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tình trạng máy</label>
          <input autocomplete="off" name="product_condition" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tình trạng máy của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Upload multiple image</label>
          <input autocomplete="off" name="product_images[]" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" type="file" multiple>

        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Kích thước</label>
          <textarea name="product_printersize" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kích thước của sản phẩm....."></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Trọng lượng</label>
          <input autocomplete="off" name="product_weight" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập trọng lượng của sản phẩm....." />
        </div>
      </div>

      <!-- THÔNG SỐ PHỤ -->
      <div class="flex flex-col gap-3">
        <h2 class="text-xl font-bold text-secondary uppercase">
          Thông số phụ
        </h2>
        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Chủng loại</label>
          <input autocomplete="off" name="product_species" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chủng loại sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Loại máy</label>
          <input autocomplete="off" name="product_machinetype" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập loại máy của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Chu kỳ hoạt động (hàng ngày)</label>
          <input autocomplete="off" name="product_activitycycle" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chu kỳ hoạt động của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Độ phân giải quang học</label>
          <input autocomplete="off" name="product_opticalresolution" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập độ phân giải quang học của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Công suất khay nạp tài liệu tự động</label>
          <input autocomplete="off" name="product_autodocfeeder" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập công suất khay nạp tài liệu tự động của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tùy chọn chụp quét (ADF)</label>
          <input autocomplete="off" name="product_scanoptions" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tùy chọn chụp quét của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Kích thước chụp quét (ADF)</label>
          <textarea name="product_scansize" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kích thước của sản phẩm....."></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Trọng lượng giấy ảnh media, được hỗ trợ ADF</label>
          <input autocomplete="off" name="product_supportweight" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập trọng lượng của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tốc độ chụp quét của khay nạp tài liệu tự động</label>
          <input autocomplete="off" name="product_autoscanspeed" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tốc độ chụp quét của khay nạp tài liệu tự động của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Chiều sâu bit màu</label>
          <input autocomplete="off" name="product_colorbitdepth" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chiều sâu bit màu của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Bộ nhớ</label>
          <input autocomplete="off" name="product_memory" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập bộ nhớ của sản phẩm....." />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Định dạng file scan</label>
          <textarea name="product_scanfileformat" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập định dạng file scan của sản phẩm....."></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Kết nối</label>
          <textarea name="product_connect" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kết nối của sản phẩm....."></textarea>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Hệ điều hành tương thích</label>
          <textarea name="product_operatingsystem" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập hệ điều hành tương thích của sản phẩm....."></textarea>
        </div>
      </div>
    </div>

    <div class="box-field">
      <label class="text-sm font-semibold cursor-pointer">Mô tả sản phẩm</label>
      <textarea name="product_desc_add" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập mô tả của sản phẩm....."></textarea>
    </div>

    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit" name="product_add">
      <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Thêm sản phẩm
      </span>
    </button>
  </form>
</div>