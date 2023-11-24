<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';

// =============PHAN TRANG ======================
$sql_so_user = "SELECT COUNT(*) FROM user WHERE fullname LIKE '%$search%'";
$mang_so_user = mysqli_query($mysqli, $sql_so_user);
$ket_qua_so_user = mysqli_fetch_array($mang_so_user);
$so_user = $ket_qua_so_user['COUNT(*)'];

$so_user_tren_1_trang = 5;
$so_trang = ceil($so_user / $so_user_tren_1_trang);
$bo_qua = $so_user_tren_1_trang * ($page - 1);

if (!empty($search)) {
  $action = isset($_GET['action']) ? $_GET['action'] : '';
  $newURL = "index.php?action=$action&search=" . urlencode($search);
  $sql = "SELECT user.* FROM user WHERE fullname LIKE '%$search%' ORDER BY user.id ASC LIMIT $so_user_tren_1_trang OFFSET $bo_qua";
} else {
  $sql = "SELECT user.* FROM user ORDER BY user.id ASC LIMIT $so_user_tren_1_trang OFFSET $bo_qua";
}

$query_user = mysqli_query($mysqli, $sql);
?>
<div class="dashboard-products">
  <h2 class="text-dark11 text-2xl font-bold capitalize">
    Danh sách người dùng
  </h2>
  <div class="flex items-center justify-between mt-5">
    <!-- SEARCH USERS -->
    <div class="dashboard-input-field flex items-center border-2 border-gray-300 p-2 w-[384px] rounded-lg bg-[#f9fafb] focus:border-red-700 focus-within:border-2 focus-within:border-[#3b82f6] transition-all">
      <form action="index.php" class="w-full bg-transparent">
        <input type="hidden" name="action" value="quanlykhachhang" class="hidden">
        <input name="search" type="search" class="flex-1 text-sm font-medium outline-none bg-transparent w-full" placeholder="Search for users" autocomplete="off" value="<?php echo $search ?>" />
      </form>
    </div>
    <!-- ADD USERS -->
    <a href="index.php?action=quanlykhachhang&process=add" class="flex items-center gap-1 bg-bluebtn text-white font-medium p-2 rounded-lg hover:bg-bluehover transition-all">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg>
      Add user
    </a>
  </div>

  <!-- TABLE USERS -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <table class="w-full text-sm text-left text-gray-800 font-medium" id="user_table">
      <thead class="text-xs text-gray-800 uppercase">
        <tr class="border-b border-gray-400">
          <th class="px-6 py-3 bg-gray-50 w-[293px]">
            Tên người dùng
          </th>
          <th class="px-6 py-3 bg-gray-50">Username</th>
          <th class="px-6 py-3">Email</th>
          <th class="px-6 py-3 bg-gray-50">Giới tính</th>
          <th class="px-6 py-3">Số điện thoại</th>
          <th class="px-6 py-3 bg-gray-50">Chi tiết</th>
          <th class="px-6 py-3">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($query_user as $each) : ?>
          <tr class="border-b border-gray-200">
            <th class="px-6 py-4 font-medium text-gray-900 whitespace-wrap bg-gray-50 w-[293px]">
              <?= $each['fullname'] ?>
            </th>
            <th class="px-6 py-4 font-medium text-gray-900 whitespace-wrap bg-gray-50 w-[293px]">
              <?= $each['username'] ?>
            </th>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap bg-gray-50 w-[293px]">
              <?= $each['email'] ?>
            </td>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap bg-gray-50 w-[293px]">
              <?= $each['gender'] == 0 ? 'Nam' : 'Nữ'; ?>
            </td>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap bg-gray-50 w-[293px]">
              <?= $each['phone_number'] ?>
            </td>
            <td class="px-6 py-4 bg-gray-50">
              <a href="?action=quanlykhachhang&process=details&id=<?= $each['id'] ?>" class="text-bluebtn cursor-pointer hover:underline">Details</a>
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center gap-2">
                <a href="?action=quanlykhachhang&process=update&id=<?php echo $each['id'] ?>" class="flex items-center justify-center gap-1 bg-bluebtn p-2 rounded-lg text-white hover:bg-bluehover">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  Sửa
                </a>
                <button name="delete_user_button" class="delete_user_button flex items-center justify-center gap-1 bg-secondary p-2 rounded-lg text-white hover:bg-secondaryhover" value="<?php echo $each['id']; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                  Xoá
                </button>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <!-- PAGINATION -->
  <?php if ($so_user > 0) { ?>
    <div class="flex items-center justify-end gap-3 mt-10 mr-20">
      <?php
      for ($i = 1; $i <= $so_trang; $i++) {
      ?>
        <a href="index.php?action=quanlykhachhang&page=<?php echo $i ?>&search=<?php echo $search ?>" class="inline-block text-black font-medium <?php echo $page == $i ? 'pagi-active' : '' ?>">
          <?php echo $i ?>
        </a>
      <?php } ?>
    </div>
  <?php } ?>
</div>