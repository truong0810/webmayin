<?php
session_start();
require 'check_admin_login.php';
require_once("../admin/config/image_config.php");
require_once("config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ====================TAILWIND + GG FONT====================== -->
  <?php
  require_once("../pages/general.php");
  ?>
  <script src="../handle/script.js"></script>
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="./css/style.css">
  <title>Dashboard</title>
</head>

<body>
  <div class="container">
    <?php
    require_once("modules/header.php");
    ?>

    <main class="h-[calc(100vh-70px)] pt-[70px]">
      <div class="grid grid-cols-[370px_minmax(0,_1fr)]">
        <!-- ==========SIDE BAR=============== -->
        <?php
        require_once("modules/sidebar.php");
        ?>
        <!-- =========CONTAINER MAIN========== -->
        <div class="dashboard-container p-5 shadow-md rounded-lg">
          <?php
          if (isset($_GET['action'])) {
            $tam = $_GET['action'];
          } else {
            $tam = '';
          }
          if (isset($_GET['process'])) {
            $process = $_GET['process'];
          } else {
            $process = '';
          }
          if ($tam == 'quanlydanhmucsanpham') {
            if ($process == 'add') {
              require_once("modules/categories/cate_add.php");
            } else if ($process == 'update') {
              require_once("modules/categories/cate_update.php");
            } else {
              require_once("modules/categories/index.php");
            }
          } else if ($tam == 'quanlyhangsanxuat') {
            if ($process == 'add') {
              require_once("modules/manufacturers/manu_add.php");
            } else if ($process == 'update') {
              require_once("modules/manufacturers/manu_update.php");
            } else {
              require_once("modules/manufacturers/index.php");
            }
          } else if ($tam == 'quanlysanpham') {
            if ($process == 'add') {
              require_once("modules/products/pr_add.php");
            } else if ($process == 'update') {
              require_once("modules/products/pr_update.php");
            } else if ($process == 'details') {
              require_once("modules/products/pr_details.php");
            } else {
              require_once("modules/products/index.php");
            }
          } else if ($tam == 'quanlydonhang') {
            if ($process == 'details') {
              require_once("modules/orders/od_details.php");
            } else {
              require_once("modules/orders/index.php");
            }
          } else if ($tam == 'quanlykhachhang') {
            require_once("modules/users/index.php");
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