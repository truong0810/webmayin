<main class="px-3 pb-10">
  <?php
  // ===========MAIN BANNER=====================
  include("layout/mainBanner.php");
  // ===========MAIN SERVICE==================== 
  include("layout/mainService.php");
  // ===========PRODUCT FILTER================== 
  if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
  } else {
    $tam = '';
  }
  if ($tam == 'sanphambanchay') {
    include("layout/printerHotSelling.php");
  } else if ($tam == 'sanphamkhuyenmai') {
    include("layout/printerSale.php");
  } else {
    include("layout/printerFilter.php");
  }
  // ===========PRINTER LIST==================== 
  include("layout/printerList.php");
  // ===========LIST BRAND======================
  include("layout/mainBrand.php");
  ?>
</main>