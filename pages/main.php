<main class="pb-10">
  <?php
  if (isset($_GET['about'])) {
    $temp = $_GET['about'];
  } else {
    $temp = '';
  }
  if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
  } else {
    $tam = '';
  }
  if ($temp == 've-chung-toi') {
    require_once("layout/about_us.php");
  } else if ($temp == 'tin-tuc') {
    require_once("layout/about_news.php");
  } else if ($temp == 'chinh-sach-van-chuyen') {
    require_once("layout/about_shipping.php");
  } else if ($temp == 'chinh-sach-bao-hanh') {
    require_once("layout/about_warranty.php");
  } else {
    // ===========MAIN BANNER=====================
    require_once("layout/mainBanner.php");
    // ===========MAIN SERVICE==================== 
    require_once("layout/mainService.php");
    // ===========PRODUCT FILTER================== 
    if ($tam == 'sanphambanchay') {
      require_once("layout/printerHotSelling.php");
    } else if ($tam == 'sanphamkhuyenmai') {
      require_once("layout/printerSale.php");
    } else {
      require_once("layout/printerFilter.php");
    }
    // ===========PRINTER LIST==================== 
    require_once("layout/printerList.php");
  }
  // ===========LIST BRAND======================
  require_once("layout/mainBrand.php");
  ?>
</main>