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
            <!-- DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT -->
            <h2 class="text-dark11 text-2xl font-bold capitalize">
              Thông tin chi tiết đơn hàng đã đặt
            </h2>
            <!-- TABLE PRODUCTS -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
              <table class="w-full text-sm text-left text-gray-800 font-medium">
                <thead class="text-xs text-gray-800 uppercase">
                  <tr class="border-b border-gray-400">
                    <th class="px-6 py-3 bg-gray-50 w-[200px]">Ảnh</th>
                    <th class="px-6 py-3 w-[300px]">Tên sản phẩm</th>
                    <th class="px-6 py-3 bg-gray-50">Số lượng</th>
                    <th class="px-6 py-3">Đơn giá</th>
                    <th class="px-6 py-3 bg-gray-50">Thành Tiền</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b border-gray-200">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap">
                      <div class="w-[100px] h-[100px]">
                        <img src="../product/pr7.jpg" class="w-full h-full object-cover" />
                      </div>
                    </td>
                    <td class="px-6 py-4 w-[300px]">
                      <h4>
                        Máy scan không dây HP ScanJet Pro N4000 snw1 (6FW08A)
                      </h4>
                    </td>
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">33.999.000 đ</td>
                    <td class="px-6 py-4 w-[250px]">33.999.000 đ</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="flex items-center gap-5 mt-10 font-bold text-3xl">
              <h4>Tổng tiền hoá đơn:</h4>
              <span>33.999.000 đ</span>
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