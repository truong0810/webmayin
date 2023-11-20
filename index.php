<?php
require_once("admin/config/config.php");
session_start();
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
   <script src="./handle/script.js" defer></script>
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="./css/main.css" />

   <title>Document</title>
</head>

<body class="h-full min-h-[100vh]">
   <div class="container">
      <?php
      require_once("pages/header.php");
      require_once("pages/main.php");
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