<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}
$category_id = mysqli_real_escape_string($mysqli, $_GET['id']);

$check_query = "SELECT * FROM category WHERE id = '$category_id'";
$check_result = mysqli_query($mysqli, $check_query);

if (mysqli_num_rows($check_result) === 0) {
  echo '<script>window.location.href = "admin_404.php"</script>';
  exit();
}

$SQL = "SELECT * FROM category WHERE id = '$category_id'";
$query_cate = mysqli_query($mysqli, $SQL);
?>
<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Cập nhập danh mục
  </h2>
  <!-- FORM ADD CATEGORIES -->
  <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
    Thông tin danh mục
  </h2>
  <form id="form-category-update" action="modules/categories/process_cate_update.php" method="post">
    <div class="mt-5">
      <?php
      while ($row = mysqli_fetch_array($query_cate)) {
      ?>
        <div class="flex flex-col gap-3">
          <input type="hidden" name="cate_id" value="<?php echo $row['id'] ?>" class="hidden" readonly />
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Tên danh mục</label>
            <input type="text" name="cate_name" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter name category..." value="<?php echo $row['name'] ?>" autocomplete="off" />
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Slug</label>
            <input type="text" name="cate_slug" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter slug category..." value="<?php echo $row['slug'] ?>" autocomplete="off" />
          </div>
        </div>
      <?php } ?>
    </div>

    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit" name="cate_update">
      <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Sửa danh mục
      </span>
    </button>
  </form>
</div>