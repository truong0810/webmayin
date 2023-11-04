<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ===================SWIPER CSS======================= -->
  <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
  <!-- ====================TAILWIND + GG FONT====================== -->
  <?php
  include("pages/general.php");
  ?>
  <script src="./handle/script.js"></script>
  <link rel="stylesheet" href="./css/main.css" />
  <title>Document</title>
</head>

<body class="h-full min-h-[100vh]">
  <div class="container">
    <?php
    include("pages/header.php");
    ?>

    <main class="px-3 pb-10">
      <!-- =========SINGLE PRODUCT HEADER========= -->
      <section class="single-product-header">
        <div class="mt-7">
          <nav class="flex items-center gap-3 text-sm text-[#1A7FD7]">
            <a href="details.php">Trang chủ</a>
            <span>/</span>
            <a href="details.php">Máy Scan</a>
            <span>/</span>
            <a href="details.php">Máy Scan HP</a>
          </nav>
        </div>
      </section>

      <!-- =========PRODUCT DETAILS=============== -->
      <section class="product-details">
        <div class="grid grid-cols-[600px_minmax(0,_1fr)] mt-5 gap-5">
          <!-- =====PRODUCT DETAILS IMAGE======= -->
          <div>
            <div class="product-details-item relative w-full h-[600px] border border-gray-400 transition-all">
              <img src="./pages/image/product/pr1.jpg" alt="" class="w-full h-full object-cover" />
              <div class="btn-prev">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
              </div>
              <div class="btn-next">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
              </div>
              <div class="flex items-center justify-center text-gray-700 absolute bottom-0 left-0 p-5">
                <a href="/details.html" class="p-2 rounded-2xl border border-gray-500 hover:bg-primaryHover hover:text-white transition-all">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                  </svg>
                </a>
              </div>
            </div>
            <div class="flex items-center gap-3 mt-3">
              <div class="details-active w-[135px] h-[135px]">
                <a>
                  <img src="./pages/image/product/pr1.jpg" class="w-full h-full object-cover" />
                </a>
              </div>
              <div class="w-[135px] h-[135px]">
                <a>
                  <img src="./pages/image/product/pr2.jpg" class="w-full h-full object-cover" />
                </a>
              </div>
              <div class="w-[135px] h-[135px]">
                <a>
                  <img src="./pages/image/product/pr3.jpg" class="w-full h-full object-cover" />
                </a>
              </div>
            </div>
          </div>
          <!-- =====PRODUCT DETAILS INFO================ -->
          <div>
            <!-- TÊN MÁY -->
            <h3 class="text-gray55 text-2xl hidden-text font-semibold">
              Máy scan không dây HP Enterprise Flow N7000 snw1 (6FW10A)
            </h3>

            <!-- GIÁ CẢ -->
            <div class="mt-8">
              <div class="flex items-center gap-3">
                <span class="text-gray8e line-through text-lg">11.800.000
                  <span class="inline-block -translate-y-1">₫</span></span>
                <span class="inline-block bg-[#c40c00] rounded-lg py-[2px] px-[10px] text-white text-md">
                  -3%</span>
              </div>
              <div class="mt-2 flex items-end gap-3">
                <p class="text-secondary text-3xl font-bold">
                  25.350.000
                  <span class="inline-block -translate-y-2">₫</span>
                </p>
                <span class="text-[15px] text-[#a4a4a4] font-semibold">(Giá đã có VAT)</span>
              </div>
            </div>
            <!-- THÔNG TIN MÁY IN -->
            <div class="flex flex-col gap-2 mt-4">
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Loại máy: </span>
                <span class="text-gray8e">Máy scan ADF</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Khổ giấy: </span>
                <span class="text-gray8e">Tối đa A4</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Tốc độ scan: </span>
                <span class="text-gray8e">
                  75 trang/phút hoặc 150 ảnh/phút</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Scan hai mặt: </span>
                <span class="text-gray8e">Có</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Khay nạp giấy tự động (ADF):
                </span>
                <span class="text-gray8e">Có sẵn</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Cổng giao tiếp: </span>
                <span class="text-gray8e"> USB/ LAN/ WiFi</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Bảo hành: </span>
                <span class="text-gray8e">12 tháng tại nơi sử dụng</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-black font-bold">Tình trạng máy: </span>
                <span class="text-gray8e">
                  100% mới, nguyên tem, nguyên hộp, CO/CQ</span>
              </div>
            </div>

            <!-- ĐÁNH GIÁ SẢN PHẨM -->
            <button class="flex items-center gap-4 bg-[#fcb515] text-white p-2 rounded-lg hover:bg-primary transition-all mt-5">
              <div class="flex flex-col items-center justify-center gap-[6px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                  </svg>
                </div>
              </div>
              Đánh giá sản phẩm
            </button>

            <!-- SẴN HÀNG  -->
            <p class="text-[#31c064] text-base font-semibold flex items-center gap-2 mt-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
              </svg>
              Sẵn hàng
            </p>

            <!-- FORM ĐẶT HÀNG -->
            <form>
              <div class="mt-5 flex flex-col gap-2">
                <span class="text-gray22 text-[15px] font-bold">Số lượng:</span>
                <!-- ================================ -->
                <div class="flex items-center gap-3">
                  <!-- BTN INCREMENT -->
                  <div class="py-2 px-1 border border-primary text-primary rounded-lg">
                    <button class="px-3 py-1 border border-primary rounded-full hover:bg-primary hover:text-white transition-all">
                      -
                    </button>
                    <span class="text-xl px-4 font-bold">1</span>
                    <button class="px-3 py-1 border border-primary rounded-full hover:bg-primary hover:text-white transition-all">
                      +
                    </button>
                  </div>
                  <!-- BTN ADD CART -->
                  <div>
                    <a class="flex items-center justify-center gap-3 bg-secondary text-white hover:bg-[#c40c00] px-10 py-3 rounded-lg transition-all font-semibold h-[50px] w-[300px]" href="/thanhtoan.html">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                      </svg>

                      Thêm vào giỏ hàng
                    </a>
                  </div>
                  <!-- BTN GỬI BÁO GIÁ -->
                  <div>
                    <button class="flex items-center justify-center gap-3 uppercase bg-primary text-white rounded-lg px-10 py-3 font-bold hover:bg-[#000] transition-all h-[50px] w-[300px]">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                      </svg>
                      Gửi báo giá
                    </button>
                  </div>
                </div>
                <!-- ============================== -->
                <div class="flex items-center gap-3">
                  <!-- BTN TRẢ GÓP QUA THẺ -->
                  <button class="text-white uppercase text-center px-20 rounded-lg font-bold bg-[#288ad6] text-sm group h-[50px] w-[370px]">
                    <p class="group-hover:text-lg">Trả góp qua thẻ</p>
                    <p class="group-hover:text-xs font-normal">
                      Visa,Master,JCB
                    </p>
                  </button>
                  <!-- BTN TRẢ GÓP -->
                  <button class="text-white uppercase flex flex-col items-center px-20 rounded-lg font-bold bg-[#288ad6] text-sm group h-[50px] w-[370px]">
                    <p class="group-hover:text-lg">Trả góp</p>
                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                      </svg>
                    </span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>

      <!-- ============PRODUCT DESCRIPTION=================== -->
      <section class="product-description">
        <div class="grid grid-cols-[926px_minmax(0,_1fr)] gap-5 mt-10">
          <!-- ======DESCRIPTION===== -->
          <div class="border border-gray-500 w-full h-fit">
            <span class="block text-center text-lg py-2 text-white bg-primary w-full uppercase font-bold">Mô Tả</span>
            <div class="text-center">
              <p class="mt-4 text-gray22 text-[19px] capitalize hidden-text font-bold">
                Máy Scan HP ScanJet Enterprise Flow N7000 snw1 (6FW10A)
              </p>
              <p class="mt-4 italic">(Bảo hành: 12 tháng)</p>
            </div>

            <div class="px-4 mt-10 pb-10">
              <p>
                Nhu cầu scan ngày càng gia tăng trong các doanh nghiệp, văn
                phòng.&nbsp;<strong>Máy quét HP&nbsp;ScanJet Enterprise Flow N7000 snw1
                  (6FW10A)</strong>&nbsp;đến từ thương hiệu HP với năng suất công việc cao, chắc
                chắn sẽ hỗ trợ hết mình cho doanh nghiệp của bạn.
              </p>
              <h4 class="text-xl mt-5 font-bold">Hiệu năng mạnh mẽ</h4>
              <p>
                Sản phẩm máy quét HP ScanJet Enterprise Flow N7000 snw1
                (6FW10A) mang một thiết kế gọn gàng, nhẹ nhàng, dễ dàng di
                chuyển lắp đặt không rườm rà, mất thời gian.
              </p>
              <p class="mt-5">
                Máy scan có tốc độ làm việc nhanh chóng cùng với độ chính xác
                cao, nhờ phần mềm được cà đặt sẵn cùng khay nạp giấy 80 trang,
                tiết kiệm thời gian làm việc. HP ScanJet Enterprise Flow N7000
                có thể xử lý khối lượng lớn công việc với tốc độ cao, lên đến
                75 trang / phút. Khuyến nghị 7.500 trang / ngày.
              </p>
              <p class="mt-5">
                Với phần mềm HP EveryPage, cho phép máy quét có thể scan đủ
                loại tài liệu, thậm chí hàng chồng các loại và kích cỡ giấy
                ảnh media hỗn hợp. Màn hình LCD trực quan, hỗ trợ người dùng
                thao tác nhanh chóng, tiết kiệm thời gian, đơn giản hóa các
                công việc phức tạp với HP Scan Premium, cùng tính năng chụp
                quét hai mặt một.
              </p>

              <h4 class="text-xl mt-5 font-bold">
                Chất lượng hình ảnh tuyệt vời
              </h4>
              <p>
                Các sản phẩm scan màu của HP canJet Enterprise Flow N7000 có
                chất lượng hình ảnh tương đương bản gốc nhờ các tính năng tự
                động: phơi sáng, tạo ngưỡng, phát hiện màu, làm mịn/xóa nền,
                phát hiện kích cỡ, làm thẳng nội dung, cải thiện nội dung, tự
                động nạp, cảm biến phát hiện nhiều nguồn cấp, phát hiện nhiều
                nguồn cấp nâng cao, tự động định hướng, bỏ nhiều màu, bỏ màu
                kênh, xóa viền, xóa trang trống, hợp nhất các trang, xóa lỗ,
                tem kỹ thuật số, chụp siêu dữ liệu.
              </p>
              <h4 class="text-xl mt-5 font-bold">
                Scan qua mạng Lan có dây và không dây WiFi
              </h4>
              <p>
                Máy scan Hp scanjet Enterprise Flow N7000 snw1 6FW10A tích hợp
                sẵn cổng kết nối qua mạng Lan chuẩn RJ45 và không dây WiFi
                giúp bạn kết nối thiết bị vào hệ thống mạng Lan của công ty dễ
                dàng, để mọi người trong văn phòng có thể sử dụng chung thiết
                bị, tiết kiệm chi phí đầu tư.
              </p>
            </div>
          </div>
          <!-- ======TECHNICAL SPECIFICATIONS===== -->
          <div class="border border-gray-500 w-full">
            <span class="block text-center text-lg py-2 text-white bg-primary w-full uppercase font-bold">Thông số kỹ thuật</span>
            <div class="p-4 relative overflow-x-auto">
              <table class="w-full text-sm text-left text-black">
                <tbody>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap w-[130px]">
                      Hãng sản xuất
                    </td>
                    <td class="px-6 py-4">HP</td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap w-[130px]">
                      Chủng loại
                    </td>
                    <td class="px-6 py-4">
                      HP ScanJet Enterprise Flow N7000 snw1 (6FW10A)
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Loại máy
                    </td>
                    <td class="px-6 py-4">
                      Nạp giấy TỰ ĐỘNG (ADF), quét 2 mặt
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Chu kỳ hoạt động (hàng ngày)
                    </td>
                    <td class="px-6 py-4">
                      Số lượng trang in hàng ngày được khuyến nghị: 7500 trang
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Độ phân giải quang học
                    </td>
                    <td class="px-6 py-4">Lên tới 600 dpi</td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Công suất khay nạp tài liệu tự động
                    </td>
                    <td class="px-6 py-4">Tiêu chuẩn, 80 tờ</td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Tùy chọn chụp quét (ADF)
                    </td>
                    <td class="px-6 py-4">Hai mặt một lần</td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Kích thước chụp quét (ADF)
                    </td>
                    <td class="px-6 py-4">
                      <p>Kích thước chụp quét (ADF), tối đa216 x 3100 mm</p>
                      <br />
                      <p>
                        Kích thước chụp quét ADF (tối thiểu)50,8 x 50,8 mm
                      </p>
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Trọng lượng giấy ảnh media, được hỗ trợ ADF
                    </td>
                    <td class="px-6 py-4">43 đến 350 g/m²</td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Tốc độ chụp quét của khay nạp tài liệu tự động
                    </td>
                    <td class="px-6 py-4">
                      Tối đa 75 trang/phút hoặc 150 ảnh/phút
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Chiều sâu bit màu
                    </td>
                    <td class="px-6 py-4">
                      24 bit (bên ngoài), 48-bit (nội bộ)
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Bộ nhớ
                    </td>
                    <td class="px-6 py-4">1GB</td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Định dạng file scan
                    </td>
                    <td class="px-6 py-4">
                      Đối với văn bản & hình ảnh: PDF, PDF/A, PDF mã hóa,
                      JPEG, PNG, BMP, TIFF, Word, Excel, PowerPoint, Text
                      (.txt), Rich Text (.rtf) và PDF có thể tìm kiếm
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Kết nối
                    </td>
                    <td class="px-6 py-4">
                      Ethernet 10/100/1000 Base-T, USB 3.0, WiFi 802.11 b/g/n,
                      WiFi Direct
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Hệ điều hành tương thích
                    </td>
                    <td class="px-6 py-4">
                      Microsoft® Windows® (10, 8.1, 7, XP: 32-bit và 64-bit,
                      2008 R2, 2012 R2, 2016, 2019); MacOS (Catalina 10.15,
                      Mojave 10.14, High Sierra 10.13); Linux (Ubuntu, Fedora,
                      Debian, RHEL, Linux Mint, Open Suse, Manjaro); Citrix
                      ready
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Kích thước
                    </td>
                    <td class="px-6 py-4">
                      <p>
                        Kích thước tối thiểu (R x S x C)310 x 198 x 190 mm
                      </p>
                      <br />
                      <p>Kích thước tối đa (R x S x C)310 x 448 x 319 mm</p>
                    </td>
                  </tr>
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                      Trọng lượng
                    </td>
                    <td class="px-6 py-4">4,0 kg</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <!-- ===========LIST BRAND====================== -->
      <?php
      include("pages/layout/mainBrand.php")
      ?>
    </main>

    <?php
    include("pages/footer.php")
    ?>
  </div>

  <!--=============== SWIPER JS ===============-->
  <script src="./handle/swiper-bundle.min.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="./handle/main.js"></script>
  <script src="./handle/logic.js"></script>
</body>

</html>