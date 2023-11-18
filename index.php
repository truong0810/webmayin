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
   <script src="./handle/script.js"></script>
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


   <script src="./admin/js/jquery-3.7.1.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   <!--=============== SWIPER JS ===============-->
   <script src="./handle/swiper-bundle.min.js"></script>
   <!--=============== MAIN JS ===============-->
   <script src="./handle/main.js"></script>
   <script src="./handle/logic.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("#project").autocomplete({
            minLength: 0,
            source: "search_live_json.php",
            focus: function(event, ui) {
               $("#project").val(ui.item.label);
               return false;
            },
            select: function(event, ui) {
               $("#project").val(ui.item.name);
               $("#project-id").val(ui.item.id);
               return false;
            }
         }).autocomplete("instance")._renderItem = function(ul, item) {
            function formatCurrency(amount) {
               const parts = amount.toString().split('.');
               parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
               return parts.join(',');
            }
            return $("<li>")
               .append(`
                  <a href="details.php?id=${item.id}" class='flex items-center gap-4 font-primary'>
                     <div class='w-[60px] h-[60px]'>
                        <img src="admin/modules/products/store/${item.image}" class='w-full h-full object-cover' />
                     </div>
                     <div class='flex flex-col gap-[2px]'>
                        <h3 class='text-xl font-semibold hidden-text-oneline'>${item.name}</h3>
                        <div class='flex items-center gap-3'>
                           <p class='font-medium text-lg'>${formatCurrency(item.discount)} đ</p>
                           <p class='text-base line-through'>${formatCurrency(item.price)} đ</p>
                        </div>
                     </div>
                  </a>
               `)
               .appendTo(ul);
         };
      })
   </script>
</body>

</html>