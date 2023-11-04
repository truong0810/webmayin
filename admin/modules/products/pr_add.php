<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ====================TAILWIND + GG FONT====================== -->
  <?php
  include("../../../pages/general.php");
  ?>
  <script src="../../../handle/script.js"></script>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../../css/main.css" />
  <title>Dashboard</title>
</head>

<body>
  <div class="container">
    <?php
    include("../../modules/header.php");
    ?>

    <main class="h-[calc(100vh-70px)] pt-[70px]">
      <div class="grid grid-cols-[370px_minmax(0,_1fr)]">
        <!-- DASHBOARD SIDEBAR -->
        <?php
        include("../sidebar.php");
        ?>
        <!-- ===========DASHBOARD CONTAINER -->
        <div class="dashboard-container p-5 shadow-md rounded-lg">
          <div class="dashboard-products">
            <h2 class="text-dark11 text-3xl font-bold uppercase">
              Thêm mới sản phẩm
            </h2>
            <!-- FORM ADD PRODUCTS -->
            <form>
              <div class="grid grid-cols-2 gap-5 mt-10">
                <!-- THÔNG SỐ CHÍNH -->
                <div class="flex flex-col gap-3">
                  <h2 class="text-xl font-bold text-secondary uppercase">
                    Thông số chính
                  </h2>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Tên sản phẩm</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tên sản phẩm....." />
                  </div>
                  <div class="grid grid-cols-2 gap-3">
                    <div class="box-field">
                      <label for="" class="block mb-2 text-sm font-semibold cursor-pointer">Chọn nhà sản xuất</label>
                      <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
                        <option selected>Choose a producer</option>
                        <option value="HP">HP</option>
                        <option value="Cannon">Cannon</option>
                        <option value="Dell">Dell</option>
                        <option value="Samsung">Samsung</option>
                      </select>
                    </div>
                    <div class="box-field">
                      <label for="" class="block mb-2 text-sm font-semibold cursor-pointer">Chọn danh mục</label>
                      <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
                        <option selected>Choose a category</option>
                        <option value="">Máy In Đa Năng</option>
                        <option value="">Máy In Màu</option>
                        <option value="">Máy In A3</option>
                      </select>
                    </div>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Hình ảnh</label>
                    <textarea class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập đường dẫn hình ảnh của sản phẩm....."></textarea>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Giá gốc</label>
                    <input type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập giá gốc của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Giá khuyến mãi</label>
                    <input type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập giá khuyến mãi của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Loại máy</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập loại của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Khổ giấy</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập khổ giấy của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Tốc độ scan</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tốc độ scan của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Tốc độ scan</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tốc độ scan của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Scan hai mặt</label>
                    <div class="flex items-center gap-5">
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Có</label>
                        <input type="radio" name="pinter-radio" value="Có" />
                      </div>
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Không</label>
                        <input type="radio" name="pinter-radio" value="Không" />
                      </div>
                    </div>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Khuyến mãi sốc</label>
                    <div class="flex items-center gap-5">
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Có</label>
                        <input type="radio" name="pinter-promotion" value="Có" />
                      </div>
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Không</label>
                        <input type="radio" name="pinter-promotion" value="Không" />
                      </div>
                    </div>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Bán chạy</label>
                    <div class="flex items-center gap-5">
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Có</label>
                        <input type="radio" name="pinter-selling" value="Có" />
                      </div>
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Không</label>
                        <input type="radio" name="pinter-selling" value="Không" />
                      </div>
                    </div>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Khay nạp giấy tự động (ADF)</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập khay nạp giấy tự động của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Cổng giao tiếp</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập cổng giao tiếp của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Bảo hành</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập bảo hành của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Tình trạng máy</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tình trạng máy của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Mô tả sản phẩm</label>
                    <textarea class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập mô tả của sản phẩm....."></textarea>
                  </div>
                </div>
                <!-- THÔNG SỐ PHỤ -->
                <div class="flex flex-col gap-3">
                  <h2 class="text-xl font-bold text-secondary uppercase">
                    Thông số phụ
                  </h2>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Chủng loại</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chủng loại sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Loại máy</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập loại máy của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Chu kỳ hoạt động (hàng ngày)</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chu kỳ hoạt động của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Độ phân giải quang học</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập độ phân giải quang học của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Công suất khay nạp tài liệu tự động</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập công suất khay nạp tài liệu tự động của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Tùy chọn chụp quét (ADF)</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tùy chọn chụp quét của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Kích thước chụp quét (ADF)</label>
                    <textarea class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kích thước của sản phẩm....."></textarea>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Trọng lượng giấy ảnh media, được hỗ trợ ADF</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập trọng lượng của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Tốc độ chụp quét của khay nạp tài liệu tự động</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập tốc độ chụp quét của khay nạp tài liệu tự động của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Chiều sâu bit màu</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập chiều sâu bit màu của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Bộ nhớ</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập bộ nhớ của sản phẩm....." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Định dạng file scan</label>
                    <textarea class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập định dạng file scan của sản phẩm....."></textarea>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Kết nối</label>
                    <textarea class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kết nối của sản phẩm....."></textarea>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Hệ điều hành tương thích</label>
                    <textarea class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập hệ điều hành tương thích của sản phẩm....."></textarea>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Kích thước</label>
                    <textarea class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập kích thước của sản phẩm....."></textarea>
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Trọng lượng</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Nhập trọng lượng của sản phẩm....." />
                  </div>
                </div>
              </div>

              <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                  Thêm sản phẩm
                </span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script>
    const dashboardUser = document.querySelector('.dashboard-user');
    const dashboardUserSetting = document.querySelector(
      '.dashboard-user-setting'
    );
    dashboardUser.addEventListener('click', function() {
      dashboardUserSetting.classList.toggle('hidden-sub');
    });
  </script>
</body>

</html>