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
              Thông tin chi tiết người dùng
            </h2>
            <!-- FORM ADD USERS -->
            <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
              Thông tin người dùng
            </h2>
            <form>
              <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-full block relative overflow-hidden mt-5">
                  <img id="selected-image" class="absolute inset-0 w-full h-full object-cover" />
                </label>
              </div>

              <div class="grid grid-cols-2 gap-5 mt-10">
                <div class="flex flex-col gap-3">
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Fullname</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="Lê Quang Thái" readonly />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Username</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="lequangthai2002" readonly />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Email</label>
                    <input type="email" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="thai@gmail.com" readonly />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Address</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="Thuỵ Lâm, Đông Anh,Hà Nội" readonly />
                  </div>
                </div>
                <!-- THÔNG SỐ PHỤ -->
                <div class="flex flex-col gap-3">
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Password</label>
                    <input type="password" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="123456" readonly />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Confirm password</label>
                    <input type="password" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="123456" readonly />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Giới tính</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="Nam" readonly />
                  </div>
                </div>
              </div>
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