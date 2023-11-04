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
  <style>
    .hidden-sub {
      visibility: visible;
      opacity: 0;
      display: none;
    }
  </style>
  <link rel="stylesheet" href="../css/main.css" />
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
          <div class="dashboard-main text-center flex items-center justify-center h-full">
            <p class="text-3xl text-black font-bold uppercase">
              Hiện chưa có bất kỳ thông tin nào!! VUI LÒNG QUAY LẠI SAU
            </p>
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