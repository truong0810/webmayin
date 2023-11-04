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
              Thêm mới danh mục
            </h2>
            <!-- FORM ADD CATEGORIES -->
            <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
              Thông tin danh mục
            </h2>
            <form>
              <div class="mt-5">
                <div class="flex flex-col gap-3">
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Tên danh mục</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter name category..." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Slug</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter slug category..." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Status</label>
                    <input type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter status..." />
                  </div>
                </div>
              </div>

              <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                  Thêm danh mục
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