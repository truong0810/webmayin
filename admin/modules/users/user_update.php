<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}

$user_id = mysqli_real_escape_string($mysqli, $_GET['id']);
$check_query = "SELECT * FROM user WHERE id = '$user_id'";
$check_result = mysqli_query($mysqli, $check_query);

if (mysqli_num_rows($check_result) === 0) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}

$SQL = "SELECT * FROM user WHERE id = '$user_id'";
$query_user = mysqli_query($mysqli, $SQL);
?>
<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Cập nhật người dùng
  </h2>
  <!-- FORM UPDATE USERS -->
  <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
    Thông tin người dùng
  </h2>
  <form action="modules/users/process_user_update.php" method="post" enctype="multipart/form-data">
    <?php
    while ($row = mysqli_fetch_array($query_user)) {
    ?>
      <div class="flex items-center justify-center w-full">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-full block relative overflow-hidden mt-5">
          <img id="selected-image" class="absolute inset-0 w-full h-full object-cover" src="modules/users/uploads/<?= $row['avatar'] ?>" />
          <input id="dropzone-file" type="file" class="hidden" name="user_avatar" value="<?php echo $row['avatar'] ?>" />
        </label>
      </div>

      <div class="grid grid-cols-2 gap-5 mt-10">
        <div class="flex flex-col gap-3">
          <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>" class="hidden" />
          <div class="box-field">
            <label for="" class="text-sm font-semibold cursor-pointer">Fullname</label>
            <input name="fullname" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="<?= $row['fullname'] ?>" />
          </div>
          <div class="box-field">
            <label for="" class="text-sm font-semibold cursor-pointer">Username</label>
            <input name="username" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="<?= $row['username'] ?>" />
          </div>
          <div class="box-field">
            <label for="" class="text-sm font-semibold cursor-pointer">Email</label>
            <input name="email" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="<?= $row['email'] ?>" />
          </div>
          <div class="box-field">
            <label for="" class="text-sm font-semibold cursor-pointer">Phone number</label>
            <input name="phone_number" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="<?= $row['phone_number'] ?>" />
          </div>
        </div>
        <!-- THÔNG SỐ PHỤ -->
        <div class="flex flex-col gap-3">
          <div class="box-field">
            <label for="" class="text-sm font-semibold cursor-pointer">Password</label>
            <input name="password" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="<?= $row['password'] ?>" />
          </div>
          <div class="box-field">
            <label for="" class="text-sm font-semibold cursor-pointer">Confirm password</label>
            <input name="confirm_password" type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" value="<?= $row['password'] ?>" />
          </div>
          <div class="box-field">
            <label for="" class="text-sm font-semibold cursor-pointer">Giới tính</label>
            <div class="flex items-center gap-3">
              <label for="gender-male" class="flex items-center gap-2">
                <input id="gender-male" name="gender" type="radio" value="0" <?= $row['gender'] == 0 ? 'checked' : '' ?>>
                <span>Nam</span>
              </label>

              <label for="gender-female" class="flex items-center gap-2">
                <input id="gender-female" name="gender" type="radio" value="1" <?= $row['gender'] == 1 ? 'checked' : '' ?>>
                <span>Nữ</span>
              </label>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>
    <button name="btn_update" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit">
      <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Cập nhập người dùng
      </span>
    </button>
  </form>
</div>