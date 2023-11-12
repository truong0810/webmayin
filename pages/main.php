<main class="px-3 pb-10">
  <?php
  // ===========MAIN BANNER=====================
  require_once("layout/mainBanner.php");
  // ===========MAIN SERVICE==================== 
  require_once("layout/mainService.php");
  // ===========PRODUCT FILTER================== 
  if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
  } else {
    $tam = '';
  }
  if ($tam == 'sanphambanchay') {
    require_once("layout/printerHotSelling.php");
  } else if ($tam == 'sanphamkhuyenmai') {
    require_once("layout/printerSale.php");
  } else {
    require_once("layout/printerFilter.php");
  }
  // ===========PRINTER LIST==================== 
  require_once("layout/printerList.php");
  // ===========LIST BRAND======================
  require_once("layout/mainBrand.php");
  ?>
</main>