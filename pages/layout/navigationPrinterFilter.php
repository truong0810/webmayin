<?php
$quanly = isset($_GET['quanly']) ? $_GET['quanly'] : '';
?>
<ul class="flex items-center justify-center gap-7">
  <li>
    <a href="index.php" class="<?= $quanly == '' ? 'product-filter-active' : '' ?> border border-primary px-4 py-3 rounded-full text-base text-primary uppercase font-semibold hover:text-white hover:bg-primary transition-all">Sản phẩm mới</a>
  </li>
  <li>
    <a href="index.php?quanly=sanphambanchay" class="border border-primary px-4 py-3 rounded-full text-base text-primary uppercase font-semibold hover:text-white hover:bg-primary transition-all <?= $quanly == 'sanphambanchay' ? 'product-filter-active' : '' ?>">Bán chạy</a>
  </li>
  <li>
    <a href="index.php?quanly=sanphamkhuyenmai" class="border border-primary px-4 py-3 rounded-full text-base text-primary uppercase font-semibold hover:text-white hover:bg-primary transition-all <?= $quanly == 'sanphamkhuyenmai' ? 'product-filter-active' : '' ?>">Khuyến mãi sốc</a>
  </li>
  <li>
    <a href="#" class="border border-primary px-4 py-3 rounded-full text-base text-primary uppercase font-semibold hover:text-white hover:bg-primary transition-all">Xem gần đây</a>
  </li>
</ul>