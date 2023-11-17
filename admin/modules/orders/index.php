<?php
$sql = "SELECT orders.*,user.fullname,user.email,user.phone_number FROM orders JOIN user ON user.id = orders.user_id WHERE status = 0";
$result = mysqli_query($mysqli, $sql);

$sql_ordered = "SELECT orders.*, user.fullname, user.email, user.phone_number 
FROM orders 
JOIN user ON user.id = orders.user_id 
WHERE status IN (1, 2)";
$result_ordered = mysqli_query($mysqli, $sql_ordered);

?>
<div class="dashboard-products">
  <!-- DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT -->
  <div>
    <h2 class="text-dark11 text-2xl font-bold capitalize">
      Danh sách đơn hàng đã đặt
    </h2>
    <!-- TABLE PRODUCTS -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table class="w-full text-sm text-left text-gray-800 font-medium">
        <thead class="text-xs text-gray-800 uppercase">
          <tr class="border-b border-gray-400">
            <th class="px-6 py-3 bg-gray-50">Mã</th>
            <th class="px-6 py-3 w-[200px]">Thời gian đặt</th>
            <th class="px-6 py-3 bg-gray-50">Tên người nhận</th>
            <th class="px-6 py-3">Số điện thoại</th>
            <th class="px-6 py-3 bg-gray-50 w-[250px]">
              Địa chỉ giao hàng
            </th>
            <th class="px-6 py-3">Tổng tiền</th>
            <th class="px-6 py-3 bg-gray-50">Trạng thái</th>
            <th class="px-6 py-3">Xem</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result_ordered as $row) : ?>
            <tr class="border-b border-gray-200">
              <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap">
                <span><?= $row['id'] ?></span>
              </td>
              <td class="px-6 py-4 w-[200px]">
                <h4><?= $row['created_at'] ?></h4>
              </td>
              <td class="px-6 py-4"><?= $row['fullname'] ?></td>
              <td class="px-6 py-4"><?= $row['phone_number'] ?></td>
              <td class="px-6 py-4 w-[250px]">
                <?= $row['address'] ?>
              </td>
              <td class="px-6 py-4"><?= number_format($row['total_price'], 0, ',', '.') ?></td>
              <td class="px-6 py-4">
                <?php
                switch ($row['status']) {
                  case 1:
                    echo 'Đã duyệt';
                    break;
                  case 2:
                    echo 'Đã huỷ';
                    break;
                  default;
                }
                ?>
              </td>
              <td class="px-6 py-4">
                <a href="?action=quanlydonhang&process=details&id=<?= $row['id'] ?>" class="text-bluebtn cursor-pointer hover:underline">Details</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- DANH SÁCH ĐƠN HÀNG CHƯA ĐẶT -->
  <div class="mt-10">
    <h2 class="text-dark11 text-2xl font-bold capitalize">
      Danh sách đơn hàng chưa đặt
    </h2>
    <!-- TABLE PRODUCTS -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table class="w-full text-sm text-left text-gray-800 font-medium">
        <thead class="text-xs text-gray-800 uppercase">
          <tr class="border-b border-gray-400">
            <th class="px-6 py-3 bg-gray-50">Mã</th>
            <th class="px-6 py-3 w-[200px]">Thời gian đặt</th>
            <th class="px-6 py-3 bg-gray-50">Tên người nhận</th>
            <th class="px-6 py-3">Số điện thoại</th>
            <th class="px-6 py-3 bg-gray-50 w-[250px]">
              Địa chỉ giao hàng
            </th>
            <th class="px-6 py-3">Tổng tiền</th>
            <th class="px-6 py-3 bg-gray-50">Duyệt</th>
            <th class="px-6 py-3">Huỷ</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $each) : ?>
            <tr class="border-b border-gray-200">
              <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap">
                <span><?= $each['id'] ?></span>
              </td>
              <td class="px-6 py-4 w-[200px]">
                <h4><?= $each['created_at'] ?></h4>
              </td>
              <td class="px-6 py-4"><?= $each['fullname'] ?></td>
              <td class="px-6 py-4"><?= $each['phone_number'] ?></td>
              <td class="px-6 py-4 w-[250px]">
                <?= $each['address'] ?>
              </td>
              <td class="px-6 py-4"><?= number_format($each['total_price'], 0, ',', '.') ?></td>
              <td class="px-6 py-4">
                <a href="modules/orders/process_update_order.php?id=<?= $each['id'] ?>&status=1" class="flex items-center justify-center gap-1 bg-bluebtn p-2 rounded-lg text-white hover:bg-bluehover">
                  Duyệt
                </a>
              </td>
              <td class="px-6 py-4">
                <a href="modules/orders/process_update_order.php?id=<?= $each['id'] ?>&status=2" class="flex items-center justify-center gap-1 bg-secondary p-2 rounded-lg text-white hover:bg-secondaryhover">
                  Huỷ
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- PAGINATION -->
  <div class="flex items-center justify-end gap-3 mt-10 mr-20">
    <a href="#" class="pagi-active inline-block text-black font-medium">1</a>
    <a href="#" class="inline-block text-black font-medium">2</a>
    <a href="#" class="inline-block text-black font-medium">3</a>
  </div>
</div>