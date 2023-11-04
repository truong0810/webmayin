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
              Cập nhập người dùng
            </h2>
            <!-- FORM ADD USERS -->
            <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
              Thông tin người dùng
            </h2>
            <form>
              <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-full block relative overflow-hidden mt-5">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500">
                      <span class="font-semibold">Click to upload</span> or
                      drag and drop
                    </p>
                    <p class="text-xs text-gray-500">
                      SVG, PNG, JPG or GIF (MAX. 800x400px)
                    </p>
                  </div>
                  <img id="selected-image" class="absolute inset-0 w-full h-full object-cover" />
                  <input id="dropzone-file" type="file" class="hidden" />
                </label>
              </div>

              <div class="grid grid-cols-2 gap-5 mt-10">
                <div class="flex flex-col gap-3">
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Fullname</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter your fullname..." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Username</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter your username..." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Email</label>
                    <input type="email" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter your email..." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Address</label>
                    <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter your address..." />
                  </div>
                </div>
                <!-- THÔNG SỐ PHỤ -->
                <div class="flex flex-col gap-3">
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Password</label>
                    <input type="password" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter your password..." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Confirm password</label>
                    <input type="password" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter your confirm password..." />
                  </div>
                  <div class="box-field">
                    <label for="" class="text-sm font-semibold cursor-pointer">Giới tính</label>
                    <div class="flex items-center gap-5">
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Nam</label>
                        <input type="radio" name="user-gender" value="Nam" />
                      </div>
                      <div class="flex items-center justify-center gap-2">
                        <label for="">Nữ</label>
                        <input type="radio" name="user-gender" value="Nữ" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                  Cập nhập người dùng
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

    const fileInput = document.getElementById('dropzone-file');
    const selectedImage = document.getElementById('selected-image');

    fileInput.addEventListener('change', function() {
      // Kiểm tra xem đã chọn tệp hay chưa
      if (fileInput.files.length > 0) {
        const file = fileInput.files[0];

        // Kiểm tra xem tệp được chọn có phải là hình ảnh hay không
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();

          reader.onload = function(e) {
            // Đặt src của thẻ <img> bằng dữ liệu ảnh đã đọc
            selectedImage.src = e.target.result;
          };

          // Đọc tệp ảnh
          reader.readAsDataURL(file);
        } else {
          alert('Vui lòng chọn một tệp ảnh hợp lệ.');
          fileInput.value = ''; // Xóa lựa chọn tệp không hợp lệ
        }
      }
    });
  </script>
</body>

</html>