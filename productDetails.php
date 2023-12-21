<?php
require_once("admin/config/config.php");
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// PAGINATION
$sql_quantity = "SELECT COUNT(*) FROM product";
$result_quantity = mysqli_query($mysqli, $sql_quantity);
$ket_qua_so_product = mysqli_fetch_array($result_quantity);
$so_product = $ket_qua_so_product['COUNT(*)'];

$so_product_tren_1_trang = 15;
$so_trang = ceil($so_product / $so_product_tren_1_trang);
$bo_qua = $so_product_tren_1_trang * ($page - 1);

$sql = "SELECT * FROM product LIMIT $so_product_tren_1_trang OFFSET $bo_qua";
$result = mysqli_query($mysqli, $sql);

$prev_page = $page - 1;
$next_page = $page + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- ===================SWIPER CSS======================= -->
   <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
   <!-- ====================TAILWIND + GG FONT====================== -->
   <?php
   require_once("pages/general.php");
   ?>
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <script src="./handle/script.js"></script>
   <link rel="stylesheet" href="./css/main.css" />
   <title>Document</title>
</head>

<body>
   <div class="container">
      <?php
      require_once("pages/header.php");
      ?>

      <main class="px-3 pb-10">
         <div class="grid grid-cols-[1155px,minmax(0,_1fr)] gap">
            <!-- MAIN CONTAINER -->
            <div>
               <!-- TITLE -->
               <div class="py-[35px] px-[10px]">
                  <div class="flex items-center justify-between">
                     <div class="flex items-center gap-3 text-xs font-medium">
                        <a href="#">
                           Trang chủ
                        </a>
                        <span>/</span>
                        <a href="#" class="text-sm text-primary font-bold">Máy in tổng hợp</a>
                     </div>
                     <div class="flex items-center justify-center gap-1">
                        <label for="product_filter" class="block text-sm font-medium text-gray-900 ">Sắp xếp theo:</label>
                        <select id="product_filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-pointer w-auto">
                           <option selected value="">Thứ tự mặc định</option>
                           <option value="asc">Mới nhất</option>
                           <option value="desc">Giảm dần</option>
                        </select>
                     </div>
                  </div>
                  <div class="flex items-center justify-between">
                     <div class="flex items-center justify-center gap-2 mt-10">
                        <h3 class="text-black text-2xl font-bold uppercase">
                           Máy in tổng hợp
                        </h3>
                        <p class="text-sm font-medium">(Tổng <span class="font-semibold text-primary text-base"><?= $so_product ?></span> sản phẩm)</p>
                     </div>
                     <?php if ($so_product > 0) { ?>
                        <div class="flex items-center justify-center gap-2">
                           <?php for ($i = 1; $i <= $so_trang; $i++) { ?>
                              <a href="productDetails.php?page=<?= $i ?>" class="transition-all w-[50px] h-[50px] flex items-center justify-center rounded-full text-lg font-semibold <?= $page == $i ? 'text-white bg-primaryHover' : 'border text-primary border-primary hover:text-white hover:bg-primary' ?>">
                                 <?php echo $i ?>
                              </a>
                           <?php } ?>
                        </div>
                     <?php } ?>
                  </div>
               </div>
               <!-- CONTAINER -->
               <div class="mt-10 overflow-x-auto flex items-center flex-wrap mb-10 gap-y-5">
                  <?php foreach ($result as $each) : ?>
                     <div class="px-[9px]">
                        <div class="product-item border w-[269px] border-graydb rounded-lg">
                           <a href="details.php?id=<?= $each['id'] ?>" class="flex items-center justify-center text-center p-[15px_10px_20px_10px]">
                              <img srcset="admin/modules/products/store/<?= $each['thumbnail'] ?> 2x" class="w-[210px] h-[210px] object-cover hover:scale-110 transition-all" />
                           </a>
                           <p class="product-status bg-primary text-center uppercase text-white text-sm font-semibold p-2">
                              Còn hàng
                           </p>
                           <div class="mt-5 px-1 text-center">
                              <a href="details.php?id=<?= $each['id'] ?>" class="hidden-text text-lg font-semibold hover:text-primary transition-all">
                                 <?= $each['title'] ?>
                              </a>
                              <p class="text-gray82 font-medium line-through text-lg mt-3">
                                 <?= number_format($each['price'], 0, ',', '.') ?> đ
                              </p>
                              <p class="text-secondary font-bold text-2xl"><?= number_format($each['discount'], 0, ',', '.') ?> đ</p>

                              <?php if (!empty($_SESSION['id_user'])) { ?>
                                 <div class="btn my-5">
                                    <a href="process_add_to_cart.php?id=<?= $each['id'] ?>" class="inline-flex items-center justify-center gap-3 bg-primary py-[6px] px-5 rounded-lg text-white uppercase hover:bg-primaryHover transition-all">
                                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                       </svg>
                                       <span>Mua ngay</span>
                                    </a>
                                 </div>
                              <?php } else { ?>
                                 <div class="btn my-5">
                                    <a class="inline-flex items-center justify-center gap-3 bg-primary py-[6px] px-5 rounded-lg text-white uppercase hover:bg-primaryHover transition-all">
                                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                       </svg>
                                       <span>Mua ngay</span>
                                    </a>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  <?php endforeach ?>
               </div>

               <?php if ($so_product > 0) { ?>
                  <!-- PAGINATION -->
                  <div class="flex items-center justify-center gap-2">
                     <a href="<?= $prev_page > 0 ? '?page=' . $prev_page : '#' ?>" class="w-[50px] h-[50px] flex items-center justify-center rounded-full text-lg text-primary font-semibold border border-primary hover:text-white hover:bg-primary transition-all <?= $prev_page > 0 ? '' : 'pointer-events-none' ?>" <?= $prev_page > 0 ? '' : 'disabled' ?>>
                        < </a>
                           <?php for ($i = 1; $i <= $so_trang; $i++) { ?>
                              <a href="productDetails.php?page=<?= $i ?>" class="transition-all w-[50px] h-[50px] flex items-center justify-center rounded-full text-lg font-semibold <?= $page == $i ? 'text-white bg-primaryHover' : 'border text-primary border-primary hover:text-white hover:bg-primary' ?>">
                                 <?php echo $i ?>
                              </a>
                           <?php } ?>
                           <a href="<?= $next_page <= $so_trang ? '?page=' . $next_page : '#' ?>" class="w-[50px] h-[50px] flex items-center justify-center rounded-full text-lg text-primary font-semibold border border-primary hover:text-white hover:bg-primary transition-all
                           <?= $next_page <= $so_trang ? '' : 'pointer-events-none' ?>
                           " <?= $next_page <= $so_trang ? '' : 'disabled' ?>>
                              > </a>
                  </div>
               <?php } ?>
            </div>


            <!-- RIGHT -->
            <div class="py-[35px] px-[15px]">
               <h3 class="flex items-center justify-center gap-2 text-2xl font-bold uppercase">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                  </svg>
                  Lọc sản phẩm
               </h3>

               <div class="border border-gray-300 mt-6 px-4 py-5">
                  <h3 class="text-black capitalize text-lg font-bold w-full pb-3 border-b border-gray-200">Thương hiệu</h3>
                  <div class="flex items-center gap-x-4 gap-y-1 mt-3 flex-wrap">
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Brother</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">10</span>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Brother</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">10</span>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Brother</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">10</span>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Brother</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">10</span>
                     </div>
                  </div>
               </div>

               <div class="border border-gray-300 mt-6 px-4 py-5">
                  <h3 class="text-black capitalize text-lg font-bold w-full pb-3 border-b border-gray-200">Loại máy</h3>
                  <div class="flex flex-col items-start gap-x-4 gap-y-1 mt-3 flex-wrap">
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Đen trắng đa năng</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">159</span>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Đen trắng đơn năng</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">100</span>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Laser màu đa năng</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">59</span>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Laser màu đơn năng</label>
                        <span class="inline-block ml-1 py-[2px] px-[4px] border border-gray-300 text-xs">69</span>
                     </div>
                  </div>
               </div>

               <div class="border border-gray-300 mt-6 px-4 py-5">
                  <h3 class="text-black capitalize text-lg font-bold w-full pb-3 border-b border-gray-200">Lọc theo giá</h3>
                  <div class="flex flex-col items-start gap-x-4 gap-y-1 mt-3 flex-wrap">
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">Dưới 3 triệu</label>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">3 triệu - 5 triệu</label>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">5 triệu - 8 triệu</label>
                     </div>
                     <div class="flex items-center mb-4">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer">
                        <label class="ml-2 text-sm font-medium text-gray-900">8 triệu - 12 triệu</label>
                     </div>
                  </div>
               </div>

               <div class="mt-5">
                  <img src="./pages/image/banner/Tai-sao-fix.png" alt="Banner" class="w-full h-full object-cover">
               </div>
            </div>
         </div>
         <?php
         require_once("pages/layout/mainBrand.php");
         ?>
      </main>

      <?php
      require_once("pages/footer.php");
      ?>
   </div>
   <!--=============== SWIPER JS ===============-->
   <script src="./handle/swiper-bundle.min.js"></script>
   <!--=============== MAIN JS ===============-->
   <script src="./handle/main.js"></script>
   <script src="./handle/logic.js"></script>
   <?php require_once 'general_live_search_json.php' ?>
</body>

</html>