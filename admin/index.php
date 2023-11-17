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
   <?php
   // $arrX = array_keys($arr);
   // $arrY = array_values($arr);
   ?>

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
                  <div class="dashboard-main dashboard-main-container text-center flex items-center justify-center h-full w-full">
                     <figure class="highcharts-figure">
                        <div id="container"></div>
                     </figure>

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
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/series-label.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/modules/export-data.js"></script>
   <script src="https://code.highcharts.com/modules/accessibility.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $.ajax({
            url: 'get_revenue.php',
            dataType: 'json',
            data: {
               days: 30
            }
         }).done(function(res) {
            const arrX = Object.keys(res);
            const arrY = Object.values(res);

            Highcharts.chart('container', {
               chart: {
                  type: 'spline'
               },
               title: {
                  text: 'Thống kê doanh thu 30 ngày gần nhất'
               },
               xAxis: {
                  categories: arrX
               },
               legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle'
               },
               plotOptions: {
                  spline: {
                     marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                     }
                  }
               },
               series: [{
                  name: 'Doanh thu',
                  data: arrY
               }],

               responsive: {
                  rules: [{
                     condition: {
                        maxWidth: 500
                     },
                     chartOptions: {
                        legend: {
                           layout: 'horizontal',
                           align: 'center',
                           verticalAlign: 'bottom'
                        }
                     }
                  }]
               }
            });
         })
      })
   </script>
</body>

</html>