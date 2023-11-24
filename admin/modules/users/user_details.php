<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}

$user_id = $_GET['id'];
$check_query = "SELECT * FROM user WHERE id = '$user_id'";
$check_result = mysqli_query($mysqli, $check_query);

if (mysqli_num_rows($check_result) === 0) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}

$sql = "SELECT * FROM user WHERE id = $user_id ";
$query_user = mysqli_query($mysqli, $sql);
$each = mysqli_fetch_array($query_user);
?>
<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Thông tin chi tiết người dùng
  </h2>
  <!-- FORM USERS DETAILS-->
  <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
    Thông tin người dùng
  </h2>
  <form>

    <div class="flex items-center justify-center w-full">
      <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-full block relative overflow-hidden mt-5">
        <img src="modules/users/uploads/<?php echo $each['avatar']; ?>" class="w-full h-full object-cover" />
      </label>
    </div>

    <div class="grid grid-cols-2 gap-5 mt-10">
      <div class="flex flex-col gap-3">
        <div class="box-field">
          <label for="" class="text-sm font-semibold cursor-pointer">Fullname</label>
          <span class="font-medium text-gray77 text-lg"><?= $each['fullname'] ?></span>
        </div>
        <div class="box-field">
          <label for="" class="text-sm font-semibold cursor-pointer">Username</label>
          <span class="font-medium text-gray77 text-lg"><?= $each['username'] ?></span>
        </div>
        <div class="box-field">
          <label for="" class="text-sm font-semibold cursor-pointer">Email</label>
          <span class="font-medium text-gray77 text-lg"><?= $each['email'] ?></span>
        </div>
        <div class="box-field">
          <label for="" class="text-sm font-semibold cursor-pointer">Phone number</label>
          <span class="font-medium text-gray77 text-lg"><?= $each['phone_number'] ?></span>
        </div>
      </div>
      <!-- THÔNG SỐ PHỤ -->
      <div class="flex flex-col gap-3">
        <div class="box-field">
          <label for="" class="text-sm font-semibold cursor-pointer">Password</label>
          <input type="password" class="font-medium text-gray-77 text-lg" value="<?= htmlspecialchars($each['password']) ?>" readonly>
        </div>
        <div class="box-field">
          <label for="" class="text-sm font-semibold cursor-pointer">Confirm password</label>
          <input type="password" class="font-medium text-gray-77 text-lg" value="<?= htmlspecialchars($each['password']) ?>" readonly>
        </div>
        <div class="box-field">
          <label for="" class="text-sm font-semibold cursor-pointer">Giới tính</label>
          <span class="font-medium text-gray77 text-lg"><?= $each['gender'] == 0 ? 'Nam' : 'Nữ'; ?></span>
        </div>
      </div>
    </div>
  </form>
</div>