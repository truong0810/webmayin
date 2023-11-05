<?php
include("../admin/config/image_config.php");
include("config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ====================TAILWIND + GG FONT====================== -->
  <?php
  include("../pages/general.php");
  ?>
  <script src="../handle/script.js"></script>
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="./css/style.css">
  <title>Dashboard</title>
</head>

<body>
  <div class="container">
    <?php
    include("modules/header.php");
    ?>

    <main class="h-[calc(100vh-70px)] pt-[70px]">
      <div class="grid grid-cols-[370px_minmax(0,_1fr)]">
        <!-- ==========SIDE BAR=============== -->
        <?php
        include("modules/sidebar.php");
        ?>
        <!-- =========CONTAINER MAIN========== -->
        <div class="dashboard-container p-5 shadow-md rounded-lg">
          <?php
          if (isset($_GET['action'])) {
            $tam = $_GET['action'];
          } else {
            $tam = '';
          }
          if (isset($_GET['progess'])) {
            $progess = $_GET['progess'];
          } else {
            $progess = '';
          }
          if ($tam == 'quanlydanhmucsanpham') {
            if ($progess == 'add') {
              include("modules/categories/cate_add.php");
            } else if ($progess == 'update') {
              include("modules/categories/cate_update.php");
            } else {
              include("modules/categories/index.php");
            }
          } else if ($tam == 'quanlyhangsanxuat') {
            include("modules/manufacturers/index.php");
          } else if ($tam == 'quanlysanpham') {
            include("modules/products/index.php");
          } else if ($tam == 'quanlydonhang') {
            include("modules/orders/index.php");
          } else if ($tam == 'quanlykhachhang') {
            include("modules/users/index.php");
          } else {
          ?>
            <div class="dashboard-main text-center flex items-center justify-center h-full">
              <p class="text-3xl text-black font-bold uppercase">
                Hiện chưa có bất kỳ thông tin nào!! VUI LÒNG QUAY LẠI SAU
              </p>
            </div>
          <?php } ?>
        </div>
      </div>
    </main>
  </div>
  <!-- Thư viện SweetAlert2 JS -->
  <script src="./js//jquery-3.7.1.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="./js/custom.js"></script>
</body>

</html>