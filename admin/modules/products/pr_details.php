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
              Thông tin chi tiết sản phẩm
            </h2>
            <a href="/list_product" class="px-4 py-2 bg-bluebtn rounded-lg text-white hover:bg-bluehover transition-all inline-block mt-3">
              Back to list
            </a>
            <!-- HIỂN THỊ THÔNG TIN SẢN PHẨM -->
            <div>
              <div class="w-[250px] p-1 shadow mx-auto mt-10">
                <img src="../product/pr6.jpg" class="w-full h-full object-cover" />
              </div>
              <h2 class="text-center text-3xl font-semibold mt-3">
                Máy scan không dây HP Enterprise Flow N7000 snw1 (6FW10A)
              </h2>
              <div class="flex flex-col mt-10">
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Loại máy:</h4>
                  <span class="font-medium text-gray77">Máy scan ADF</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Giá gốc:</h4>
                  <span class="font-medium text-gray77">28.855.999 đ</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Giá khuyến mãi:
                  </h4>
                  <span class="font-medium text-gray77">8.855.999 đ</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Danh mục:</h4>
                  <span class="font-medium text-gray77">Máy In Đa Năng</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Bán Chạy:</h4>
                  <span class="font-medium text-gray77">Có</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Khuyễn mãi sốc:
                  </h4>
                  <span class="font-medium text-gray77">Có</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Khổ giấy:</h4>
                  <span class="font-medium text-gray77">Tối đa A4 </span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Tốc độ scan:
                  </h4>
                  <span class="font-medium text-gray77">75 trang/phút hoặc 150 ảnh/phút
                  </span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Scan hai mặt:
                  </h4>
                  <span class="font-medium text-gray77">Có</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Khay nạp giấy tự động (ADF):
                  </h4>
                  <span class="font-medium text-gray77">Có sẵn</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Cổng giao tiếp:
                  </h4>
                  <span class="font-medium text-gray77">USB/ LAN/ WiFi</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Bảo hành:</h4>
                  <span class="font-medium text-gray77">12 tháng tại nơi sử dụng
                  </span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Tình trạng máy:
                  </h4>
                  <span class="font-medium text-gray77">100% mới, nguyên tem, nguyên hộp, CO/CQ
                  </span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Hãng sản xuất:
                  </h4>
                  <span class="font-medium text-gray77">HP</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Chủng loại:
                  </h4>
                  <span class="font-medium text-gray77">
                    HP ScanJet Enterprise Flow N7000 snw1 (6FW10A)</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Loại máy:</h4>
                  <span class="font-medium text-gray77">
                    Nạp giấy TỰ ĐỘNG (ADF), quét 2 mặt</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Chu kỳ hoạt động (hàng ngày):
                  </h4>
                  <span class="font-medium text-gray77">
                    Số lượng trang in hàng ngày được khuyến nghị: 7500
                    trang</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Độ phân giải quang học:
                  </h4>
                  <span class="font-medium text-gray77">
                    Lên tới 600 dpi</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Công suất khay nạp tài liệu tự động:
                  </h4>
                  <span class="font-medium text-gray77">
                    Tiêu chuẩn, 80 tờ</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Tùy chọn chụp quét (ADF) :
                  </h4>
                  <span class="font-medium text-gray77">
                    Hai mặt một lần</span>
                </div>
                <div class="box-field flex items-center gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Kích thước chụp quét (ADF):
                  </h4>
                  <span class="font-medium text-gray77">
                    Kích thước chụp quét (ADF), tối đa216 x 3100 mm
                    <br />
                    Kích thước chụp quét ADF (tối thiểu)50,8 x 50,8 mm
                  </span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Trọng lượng giấy ảnh media, được hỗ trợ ADF:
                  </h4>
                  <span class="font-medium text-gray77">
                    43 đến 350 g/m²</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Tốc độ chụp quét của khay nạp tài liệu tự động:
                  </h4>
                  <span class="font-medium text-gray77">
                    Tối đa 75 trang/phút hoặc 150 ảnh/phút</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Chiều sâu bit màu:
                  </h4>
                  <span class="font-medium text-gray77">
                    24 bit (bên ngoài), 48-bit (nội bộ)</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Bộ nhớ:</h4>
                  <span class="font-medium text-gray77"> 1GB </span>
                </div>
                <div class="box-field flex items-center gap-3">
                  <h4 class="text-lg font-semibold capitalize w-full max-w-[200px]">
                    Định dạng file scan:
                  </h4>
                  <span class="font-medium text-gray77">
                    Đối với văn bản & hình ảnh: PDF, PDF/A, PDF mã hóa,
                    JPEG,PNG, BMP, TIFF, Word, Excel, PowerPoint, Text
                    (.txt),Rich Text (.rtf) và PDF có thể tìm kiếm</span>
                </div>
                <div class="box-field flex items-end gap-3">
                  <h4 class="text-lg font-semibold capitalize">Kết nối :</h4>
                  <span class="font-medium text-gray77">
                    Ethernet 10/100/1000 Base-T, USB 3.0, WiFi 802.11
                    b/g/n,WiFi Direct</span>
                </div>
                <div class="box-field flex items-center gap-3">
                  <h4 class="text-lg font-semibold capitalize w-full max-w-[270px]">
                    Hệ điều hành tương thích :
                  </h4>
                  <span class="font-medium text-gray77">Microsoft® Windows® (10, 8.1, 7, XP: 32-bit và
                    64-bit,2008 R2, 2012 R2, 2016, 2019); MacOS (Catalina
                    10.15, Mojave 10.14, High Sierra 10.13); Linux
                    (Ubuntu,Fedora, Debian, RHEL, Linux Mint, Open Suse,
                    Manjaro); Citrix ready</span>
                </div>
                <div class="box-field flex items-center gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Kích thước:
                  </h4>
                  <span class="font-medium text-gray77">
                    Kích thước tối thiểu (R x S x C)310 x 198 x 190 mm
                    <br />
                    Kích thước tối đa (R x S x C)310 x 448 x 319 mm</span>
                </div>
                <div class="box-field flex items-center gap-3">
                  <h4 class="text-lg font-semibold capitalize">
                    Trọng lượng :
                  </h4>
                  <span class="font-medium text-gray77">4,0 kg</span>
                </div>

                <div class="box-field">
                  <h4 class="text-lg font-semibold capitalize">Mô tả:</h4>
                  <p class="font-medium text-gray77">
                    Nhu cầu scan ngày càng gia tăng trong các doanh nghiệp,
                    văn phòng. Máy quét HP ScanJet Enterprise Flow N7000 snw1
                    (6FW10A) đến từ thương hiệu HP với năng suất công việc
                    cao, chắc chắn sẽ hỗ trợ hết mình cho doanh nghiệp của
                    bạn. Hiệu năng mạnh mẽ Sản phẩm máy quét HP ScanJet
                    Enterprise Flow N7000 snw1 (6FW10A) mang một thiết kế gọn
                    gàng, nhẹ nhàng, dễ dàng di chuyển lắp đặt không rườm rà,
                    mất thời gian. Máy scan có tốc độ làm việc nhanh chóng
                    cùng với độ chính xác cao, nhờ phần mềm được cà đặt sẵn
                    cùng khay nạp giấy 80 trang, tiết kiệm thời gian làm việc.
                    HP ScanJet Enterprise Flow N7000 có thể xử lý khối lượng
                    lớn công việc với tốc độ cao, lên đến 75 trang / phút.
                    Khuyến nghị 7.500 trang / ngày. Với phần mềm HP EveryPage,
                    cho phép máy quét có thể scan đủ loại tài liệu, thậm chí
                    hàng chồng các loại và kích cỡ giấy ảnh media hỗn hợp. Màn
                    hình LCD trực quan, hỗ trợ người dùng thao tác nhanh
                    chóng, tiết kiệm thời gian, đơn giản hóa các công việc
                    phức tạp với HP Scan Premium, cùng tính năng chụp quét hai
                    mặt một. Chất lượng hình ảnh tuyệt vời Các sản phẩm scan
                    màu của HP canJet Enterprise Flow N7000 có chất lượng hình
                    ảnh tương đương bản gốc nhờ các tính năng tự động: phơi
                    sáng, tạo ngưỡng, phát hiện màu, làm mịn/xóa nền, phát
                    hiện kích cỡ, làm thẳng nội dung, cải thiện nội dung, tự
                    động nạp, cảm biến phát hiện nhiều nguồn cấp, phát hiện
                    nhiều nguồn cấp nâng cao, tự động định hướng, bỏ nhiều
                    màu, bỏ màu kênh, xóa viền, xóa trang trống, hợp nhất các
                    trang, xóa lỗ, tem kỹ thuật số, chụp siêu dữ liệu. Scan
                    qua mạng Lan có dây và không dây WiFi Máy scan Hp scanjet
                    Enterprise Flow N7000 snw1 6FW10A tích hợp sẵn cổng kết
                    nối qua mạng Lan chuẩn RJ45 và không dây WiFi giúp bạn kết
                    nối thiết bị vào hệ thống mạng Lan của công ty dễ dàng, để
                    mọi người trong văn phòng có thể sử dụng chung thiết bị,
                    tiết kiệm chi phí đầu tư.
                  </p>
                </div>
              </div>
            </div>
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