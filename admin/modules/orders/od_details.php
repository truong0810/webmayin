<?php
$order_id = $_GET['id'];
$sql = "SELECT * FROM orders_details JOIN product ON product.id = orders_details.product_id WHERE order_id = '$order_id'";
$result = mysqli_query($mysqli, $sql);
$sum = 0;
?>
<div class="dashboard-products">
  <!-- DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT -->
  <h2 class="text-dark11 text-2xl font-bold capitalize">
    Thông tin chi tiết đơn hàng đã đặt
  </h2>
  <!-- TABLE PRODUCTS -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left text-gray-800 font-medium">
      <thead class="text-xs text-gray-800 uppercase">
        <tr class="border-b border-gray-400">
          <th class="px-6 py-3 bg-gray-50 w-[200px]">Ảnh</th>
          <th class="px-6 py-3 w-[300px]">Tên sản phẩm</th>
          <th class="px-6 py-3 bg-gray-50">Số lượng</th>
          <th class="px-6 py-3">Đơn giá</th>
          <th class="px-6 py-3 bg-gray-50">Thành Tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $each) : ?>
          <tr class="border-b border-gray-200">
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap">
              <div class="w-[100px] h-[100px]">
                <img src="./modules/products/store/<?= $each['thumbnail'] ?>" class="w-full h-full object-cover" />
              </div>
            </td>
            <td class="px-6 py-4 w-[300px]">
              <h4>
                <?= $each['title'] ?>
              </h4>
            </td>
            <td class="px-6 py-4"><?= $each['quantity'] ?></td>
            <td class="px-6 py-4"><?= number_format($each['discount'], 0, ',', '.') ?> đ</td>

            <?php
            $result = $each['price'] * $each['quantity'];
            $sum += $result;
            ?>
            <td class="px-6 py-4 w-[250px]"><?= number_format($result, 0, ',', '.') ?> đ</td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="flex items-center gap-5 mt-10 font-bold text-3xl">
    <h4>Tổng tiền hoá đơn:</h4>
    <span><?= number_format($sum, 0, ',', '.') ?> đ</span>
  </div>
</div>