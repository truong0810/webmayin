<?php
$sql_category = "SELECT * FROM category ORDER BY id ASC";
$query_category = mysqli_query($mysqli, $sql_category);
?>

<section class="pinter-list px-3">
   <div class="heading-pinter flex items-center justify-between mt-5">
      <div class="flex items-center gap-3 bg-white z-10">
         <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
               <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
            </svg>
         </span>
         <h2 class="text-lg text-[#555] font-medium uppercase">Máy In</h2>
         <div class="flex items-center">
            <?php foreach ($query_category as $each) : ?>
               <a href="index.php?quanly=danhmucsanpham&id=<?= $each['id'] ?>" class="pinter-item-link text-sm text-gray77 font-medium hover:text-primary"><?= $each['name'] ?></a>
            <?php endforeach ?>
         </div>
      </div>
      <!-- ====Button See All====== -->
      <div class="pl-5 bg-white z-10">
         <a href="productDetails.php" class="text-sm text-primary py-3 px-5 border border-primary rounded-full hover:bg-primary hover:text-white transition-all font-semibold">See all</a>
      </div>
   </div>

   <div class="product-list mt-10 w-[1495px] overflow-x-auto flex items-center gap-4 flex-wrap mb-10">

      <?php
      // Check if a category ID is provided in the URL
      if (isset($_GET['quanly']) && $_GET['quanly'] === 'danhmucsanpham' && isset($_GET['id'])) {
         // If a category is selected, retrieve products for that category
         $categoryID = $_GET['id'];
         $sql_product = "SELECT * FROM product WHERE category_id = $categoryID";
      } else {
         // If no category is selected, retrieve random products from any category
         $sql_product = "SELECT * FROM product WHERE category_id = 3";
      }

      $query_product = mysqli_query($mysqli, $sql_product);
      while ($row = mysqli_fetch_array($query_product)) {
      ?>
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
      <?php }
      ?>
   </div>
</section>