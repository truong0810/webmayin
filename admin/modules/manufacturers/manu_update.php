<?php
$SQL = "SELECT * FROM manufacturer WHERE id = $_GET[id]";
$query_cate = mysqli_query($mysqli, $SQL);
?>
<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Thêm mới nhà sản xuất
  </h2>
  <!-- FORM ADD MANUFACTURE -->
  <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
    Thông tin nhà sản xuất
  </h2>
  <form action="modules/manufacturers/process_manu_update.php" method="post" enctype="multipart/form-data">
    <?php
    while ($row = mysqli_fetch_array($query_cate)) {
    ?>
      <div class="mt-5">
        <input type="hidden" name="manu_id" value="<?php echo $row['id'] ?>" class="hidden" />
        <div class="flex flex-col gap-3">
          <div class="flex items-center justify-center w-full">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-full block relative overflow-hidden mt-5">
              <img id="selected-image" class="absolute inset-0 w-full h-full object-cover" src="modules/manufacturers/uploads/<?= $row['logo'] ?>" />
              <input id="dropzone-file" type="file" class="hidden" name="manu_logo" value="<?php echo $row['logo'] ?>" />
            </label>
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Tên nhà sản xuất</label>
            <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter name manufacture..." name="manu_name" value="<?= $row['name'] ?>" />
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Số điện thoại</label>
            <input type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter phone manufacture..." name="manu_phone" value="<?= $row['phone_number'] ?>" />
          </div>
          <div class="box-field">
            <label class="text-sm font-semibold cursor-pointer">Địa chỉ</label>
            <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter address manufacture..." name="manu_address" value="<?= $row['address'] ?>" />
          </div>
        </div>
      </div>
    <?php } ?>

    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit" name="manu_update">
      <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Cập nhập nhà sản xuất
      </span>
    </button>
  </form>
</div>