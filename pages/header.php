<?php
$active = isset($_GET['about']) ? $_GET['about'] : '';
?>
<header class="header">
   <setion class="header-info">
      <div class="flex items-center py-[25px] px-[15px]">
         <!-- Header Logo -->
         <div class="w-[263px]">
            <a class="cursor-pointer" href="index.php">
               <img srcset="./pages/image/banner/logo.png 2x" alt="Logo" class="w-full max-w-[200px] object-cover" />
            </a>
         </div>
         <!-- Header Right -->
         <div class="flex items-center gap-5 flex-1 justify-end">
            <!-- Header Input -->
            <div class="w-full max-w-[679px]">
               <div class="flex items-center border border-primary p-1 rounded-md ui-widget">
                  <input type="text" id="project" class="outline-none text-base flex-1 placeholder:text-gray75" placeholder="Tìm kiếm...." />
                  <button class="bg-primary text-white py-[5px] px-3 rounded-lg hover:bg-primaryHover transition-all">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                     </svg>
                  </button>
                  <img id="project-icon" src="images/transparent_1x1.png" class="ui-state-default" alt>
                  <input type="hidden" id="project-id">
                  <p id="project-description"></p>
               </div>
            </div>
            <!-- Header nav -->
            <div class="flex items-center gap-7">
               <a href="carts.php" class="flex flex-col items-center gap-1 text-xs hover:text-primaryHover font-medium transition-all uppercase">
                  <span>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                     </svg>
                  </span>
                  <span>Giỏ hàng</span>
               </a>

               <a class="flex flex-col items-center gap-1 text-xs hover:text-primaryHover font-medium transition-all uppercase">
                  <span>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                     </svg>
                  </span>
                  <span>Liên hệ</span>
               </a>

               <?php if (!isset($_SESSION['id_user'])) { ?>
                  <a class="flex flex-col items-center gap-1 text-xs hover:text-primaryHover font-medium transition-all uppercase" href="signin.php">
                     <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                     </span>
                     <span>Đăng nhập</span>
                  </a>
               <?php } else { ?>
                  <div class="dashboard-user relative w-[32px] h-[32px] cursor-pointer">
                     <img src="./admin/modules/users/uploads/<?= $_SESSION['avatar_user'] ?>" alt="Users" class="w-full h-full rounded-full" />
                     <div class="dashboard-user-setting absolute right-0 top-0 translate-y-8 bg-white shadow-md rounded-lg overflow-hidden hidden-sub z-[999999]">
                        <div class="border-b-2 border-gray-300 p-3">
                           <p class="text-[#111827] capitalize hidden-text-oneline">
                              <?= $_SESSION['name_user'] ?>
                           </p>
                           <p class="font-semibold text-black hidden-text-oneline">
                              <?= $_SESSION['email_user'] ?>
                           </p>
                        </div>
                        <div class="flex flex-col items-start">
                           <a href="#" class="hover:bg-gray-200 w-full transition-all">
                              <span class="px-3 py-2 inline-block">Settings</span>
                           </a>
                           <a href="signout.php" class="hover:bg-gray-200 w-full transition-all">
                              <span class="px-3 py-2 inline-block">Sign out</span>
                           </a>
                        </div>
                     </div>
                  </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </setion>

   <!-- Header Navigation -->
   <section class="header-nav flex items-center justify-center bg-graydb px-[15px] py-[20px]">
      <nav>
         <ul class="flex items-center gap-14">
            <li>
               <a href="index.php" class="uppercase font-semibold <?= $active == '' ? 'nav-active' : '' ?> relative">Trang Chủ</a>
            </li>
            <li>
               <a href="index.php?about=ve-chung-toi" class="uppercase font-semibold relative <?= $active == 've-chung-toi' ? 'nav-active' : '' ?>">Về chúng tôi</a>
            </li>
            <li>
               <a href="index.php?about=tin-tuc" class=" uppercase font-semibold relative <?= $active == 'tin-tuc' ? 'nav-active' : '' ?>">Tin tức</a>
            </li>
            <li>
               <a href="index.php?about=chinh-sach-van-chuyen" class="uppercase font-semibold relative <?= $active == 'chinh-sach-van-chuyen' ? 'nav-active' : '' ?>">Chính sách vận chuyển</a>
            </li>
            <li>
               <a href="index.php?about=chinh-sach-bao-hanh" class="uppercase font-semibold relative <?= $active == 'chinh-sach-bao-hanh' ? 'nav-active' : '' ?>">Chính sách bảo hành</a>
            </li>
         </ul>
      </nav>
   </section>
</header>