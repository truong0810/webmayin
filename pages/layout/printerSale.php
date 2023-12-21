<?php
$sql_khuyenmai = "SELECT * FROM product WHERE hot_sale = 1 ORDER BY id ASC";
$query_khuyenmai = mysqli_query($mysqli, $sql_khuyenmai);
?>
<section class="product-filter">
   <div class="mt-10 border-b border-graydb px-3">
      <?php require("navigationPrinterFilter.php") ?>

      <div class="product-list mt-10 w-[1495px] overflow-x-auto flex items-center gap-4 flex-wrap mb-10">
         <?php while ($row = mysqli_fetch_array($query_khuyenmai)) { ?>
            <div class="product-item border w-[232px] border-graydb rounded-lg">
               <a href="details.php?id=<?= $row['id'] ?>" class="flex items-center justify-center text-center p-[15px_10px_20px_10px]">
                  <img srcset="admin/modules/products/store/<?= $row['thumbnail'] ?> 2x" class="w-[178px] h-[178px] object-cover hover:scale-110 transition-all" />
               </a>
               <p class="product-status bg-primary text-center uppercase text-white text-sm font-semibold p-2">
                  Còn hàng
               </p>
               <div class="mt-5 px-1 text-center">
                  <a href="details.php?id=<?= $row['id'] ?>" class="hidden-text text-lg font-semibold hover:text-primary transition-all">
                     <?= $row['title'] ?>
                  </a>
                  <p class="text-gray82 font-medium line-through text-lg mt-3">
                     <?= number_format($row['price'], 0, ',', '.') ?> đ
                  </p>
                  <p class="text-secondary font-bold text-2xl"><?= number_format($row['discount'], 0, ',', '.') ?> đ</p>

                  <?php if (!empty($_SESSION['id_user'])) { ?>
                     <div class="btn my-5">
                        <a href="process_add_to_cart.php?id=<?= $row['id'] ?>" class="inline-flex items-center justify-center gap-3 bg-primary py-[6px] px-5 rounded-lg text-white uppercase hover:bg-primaryHover transition-all">
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
         <?php } ?>
      </div>
   </div>
</section>