<?php
require_once("admin/config/config.php");

session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
$sum = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ===================SWIPER CSS======================= -->
  <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
  <!-- ====================TAILWIND + GG FONT====================== -->
  <?php
  require_once("pages/general.php");
  ?>
  <script src="./handle/script.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="./css/main.css" />
  <title>Thanh toán</title>
</head>

<body class="h-full min-h-[100vh]">
  <div class="container">
    <?php
    require_once("pages/header.php");

    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
    $sql_user = "SELECT * FROM user WHERE id = '$id_user'";
    $result_user = mysqli_query($mysqli, $sql_user);
    $each_user = mysqli_fetch_array($result_user);
    ?>
    <main class="px-3 pb-10 mt-10">
      <form method="post" action="process_checkout.php">
        <div class="grid grid-cols-[800px_minmax(0,_1fr)] gap-5">
          <div class="shadow-md bg-white p-3">
            <h3 class="text-gray22 uppercase font-semibold text-xl w-full border-b-2 border-gray-500 pb-3">
              Thông tin thanh toán
            </h3>

            <div class="mt-5">
              <div class="field">
                <label for="fullname" class="text-xs font-semibold">Họ và tên*</label>
                <input id="fullname" name="name_receiver" type="text" class="w-full p-2 text-gray22 placeholder:text-gray75 border border-grayde rounded-lg outline-none focus:shadow-inner" placeholder="Họ tên của bạn" value="<?= isset($id_user) ? $each_user['fullname'] : '' ?>" />
              </div>
              <div class="field">
                <label for="phone" class="text-xs font-semibold">Số điện thoại*</label>
                <input id="phone" name="phone_receiver" type="text" class="w-full p-2 text-gray22 placeholder:text-gray75 border border-grayde rounded-lg outline-none focus:shadow-inner" placeholder="Số điện thoại của bạn" value="<?= isset($id_user) ? $each_user['phone_number'] : '' ?>" />
              </div>
              <div class="field">
                <label for="email" class="text-xs font-semibold">Địa chỉ email*</label>
                <input id="email" name="email_receiver" type="email" class="w-full p-2 text-gray22 placeholder:text-gray75 border border-grayde rounded-lg outline-none focus:shadow-inner" placeholder="Email của bạn" value="<?= isset($id_user) ? $each_user['email'] : '' ?>" />
              </div>
              <div class="field">
                <label for="address" class="text-xs font-semibold">Địa chỉ*</label>
                <input id="address" name="address_receiver" type="text" class="w-full p-2 text-gray22 placeholder:text-gray75 border border-grayde rounded-lg outline-none focus:shadow-inner" placeholder="Địa chỉ của bạn" />
              </div>
              <div class="field">
                <label for="note" class="text-xs font-semibold">Ghi chú*</label>
                <textarea id="note" name="note" type="text" class="w-full p-2 text-gray22 placeholder:text-gray75 border border-grayde rounded-lg outline-none focus:shadow-inner" placeholder="Ghi chú nếu chú"></textarea>
              </div>
            </div>
          </div>

          <div class="shadow-md bg-white p-3">
            <h3 class="text-gray22 uppercase font-semibold text-lg pb-3">
              Thông tin thanh toán
            </h3>
            <table class="mt-3 w-full">
              <thead>
                <?php if (!empty($_SESSION['cart'])) { ?>
                  <tr class="bg-[#d7d7d9] uppercase text-sm">
                    <th class="w-[55%] text-left p-2">Sản phẩm</th>
                    <th class="w-[25%] text-right p-2">Tổng</th>
                  </tr>
                <?php } ?>
              </thead>
              <tbody>
                <?php if (!empty($_SESSION['cart'])) { ?>
                  <?php foreach ($cart as $id => $each) : ?>
                    <tr class="w-full">
                      <td class="flex items-center gap-10 border-b border-gray-500 w-full pb-3">
                        <div class="w-[70px] h-[70px] flex items-center shrink-0">
                          <a href="delete_from_cart.php?id=<?= $id ?>" class="text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                          </a>
                          <img src="admin/modules/products/store/<?= $each['thumbnail'] ?>" class="w-full h-full object-cover" />
                        </div>
                        <div class="flex flex-col items-start">
                          <h2 class="text-sm font-semibold uppercase hidden-text">
                            <?= $each['name'] ?>
                          </h2>
                          <p class="text-secondary font-bold mt-2">
                            <?= number_format($each['price'], 0, ',', '.') ?> ₫
                          </p>
                          <div class="p-1 border border-primary text-primary rounded-lg mt-2">
                            <a href="update_quantity_in_cart.php?id=<?= $id ?>&type=decrement" class="px-4 py-1 border border-primary rounded-full hover:bg-primary hover:text-white transition-all">
                              -
                            </a>
                            <span class="text-xl px-4 font-bold"><?= $each['quantity'] ?></span>
                            <a href="update_quantity_in_cart.php?id=<?= $id ?>&type=increment" class="px-4 py-1 border border-primary rounded-full hover:bg-primary hover:text-white transition-all">
                              +
                            </a>
                          </div>
                        </div>
                      </td>
                      <?php
                      $result = $each['price'] * $each['quantity'];
                      $sum += $result;
                      ?>
                      <td class="border-b border-gray-500 w-full pb-3">
                        <p class="text-[#c40c00] font-bold text-right">
                          <?= number_format($result, 0, ',', '.') ?> ₫
                        </p>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php } else { ?>
                  <div class="flex flex-col items-center">
                    <img src="pages/image/banner/cart_empty.png" alt="Carts" class="max-w-[225px] max-h-[225px] w-full h-full object-cover">
                  </div>
                <?php } ?>
              </tbody>
            </table>

            <?php if (!empty($_SESSION['cart'])) { ?>
              <div class="flex items-center justify-between mt-4 font-bold text-lg">
                <p>Tổng</p>
                <p><?= number_format($sum, 0, ',', '.') ?> ₫</p>
              </div>
            <?php } ?>

            <div class="mt-10">
              <h3 class="text-black text-xl uppercase font-semibold">
                Thanh toán
              </h3>
              <div class="flex items-center gap-4 mt-3">
                <input id="payment_method_cod" type="radio" name="payment_method" value="cod" checked />
                <label for="payment_method_cod" class="text-gray22 font-bold text-xs">Thanh toán khi nhận hàng</label>
              </div>
              <div class="flex items-center gap-4 mt-3">
                <input id="payment_method_bacs" type="radio" name="payment_method" value="bacs" />
                <label for="payment_method_bacs" class="text-gray22 font-bold text-xs">Chuyển khoản ngân hàng</label>
              </div>
            </div>

            <button type="submit" name="order" class="font-bold py-3 text-white bg-[#195bbc] w-full text-center rounded-lg uppercase mt-10 hover:bg-[#144996] transition-all">
              Đặt hàng
            </button>
          </div>
        </div>
      </form>
    </main>

    <?php
    require_once("pages/footer.php");
    ?>
  </div>

  <!--=============== SWIPER JS ===============-->
  <script src="./handle/swiper-bundle.min.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="./handle/main.js"></script>
  <?php require_once 'general_live_search_json.php' ?>
  <script type="text/javascript">
    const dashboardUser = document.querySelector('.dashboard-user');
    const dashboardUserSetting = document.querySelector('.dashboard-user-setting');
    dashboardUser?.addEventListener('click', function() {
      dashboardUserSetting.classList.toggle('hidden-sub');
    });
  </script>
</body>

</html>