<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- ===================SWIPER CSS======================= -->
  <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
  <!-- ====================TAILWIND + GG FONT====================== -->
  <?php
  include("pages/general.php");
  ?>
  <script src="./handle/script.js"></script>
  <link rel="stylesheet" href="./css/main.css" />
  <title>Document</title>
</head>

<body class="h-full min-h-[100vh]">
  <div class="container">
    <?php
    include("pages/header.php");
    ?>

    <main class="px-3 pb-10">
      <?php
      // ===========MAIN BANNER=====================
      include("pages/layout/mainBanner.php");
      // ===========MAIN SERVICE==================== 
      include("pages/layout/mainService.php");
      // ===========PRODUCT FILTER================== 
      include("pages/layout/printerFilter.php");
      // ===========PRINTER LIST==================== 
      include("pages/layout/printerList.php");
      // ===========LIST BRAND======================
      include("pages/layout/mainBrand.php");
      ?>
    </main>

    <?php
    include("pages/footer.php")
    ?>
  </div>

  <!--=============== SWIPER JS ===============-->
  <script src="./handle/swiper-bundle.min.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="./handle/main.js"></script>
  <script src="./handle/logic.js"></script>
</body>

</html>