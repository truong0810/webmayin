<?php
$sql_category = "SELECT * FROM category ORDER BY id ASC";
$query_category = mysqli_query($mysqli, $sql_category);
?>

<section class="pinter-list">
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
      <a href="#" class="text-sm text-primary py-3 px-5 border border-primary rounded-full hover:bg-primary hover:text-white transition-all font-semibold">See all</a>
    </div>
  </div>

  <?php
  require("categoryPrinterList.php");
  ?>
</section>