<header class="h-[70px] fixed inset-0 border-b shadow border-gray-200 z-[999] bg-white">
  <div class="flex items-center justify-between py-3 px-5">
    <div class="flex items-center gap-10">
      <div class="w-[200px]">
        <img srcset="<?php echo BASE_URL; ?>pages/image/banner/logo.png 2x" alt="Logo" class="w-full h-full object-cover" />

      </div>
      <div class="dashboard-input-field flex items-center border border-gray-300 p-2 w-[384px] rounded-lg bg-[#f9fafb] focus:border-red-700 focus-within:border-2 focus-within:border-[#3b82f6] transition-all">
        <input type="text" class="flex-1 outline-none bg-transparent" placeholder="Search" />
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
      </div>
    </div>
    <div class="flex items-center gap-4">
      <div class="flex items-center gap-2">
        <span class="inline-block p-2 hover:bg-gray-200 rounded-lg hover:text-primary transition-all cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </span>
        <span class="inline-block p-2 hover:bg-gray-200 rounded-lg hover:text-primary transition-all cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
          </svg>
        </span>
        <span class="inline-block p-2 hover:bg-gray-200 rounded-lg hover:text-primary transition-all cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
          </svg>
        </span>
      </div>
      <div class="dashboard-user relative w-[32px] h-[32px] cursor-pointer">
        <img src="<?= $_SESSION['avatar_admin'] ?>" alt="Admins" class="w-full h-full rounded-full" />
        <div class="dashboard-user-setting absolute right-0 top-0 translate-y-8 bg-white shadow-md rounded-lg overflow-hidden hidden-sub z-[999999]">
          <div class="border-b-2 border-gray-300 p-3">
            <p class="text-[#111827] capitalize hidden-text-oneline">
              <?= $_SESSION['name_admin'] ?>
            </p>
            <p class="font-semibold text-black hidden-text-oneline">
              <?= $_SESSION['email'] ?>
            </p>
          </div>
          <div class="flex flex-col items-start">
            <a href="#" class="hover:bg-gray-200 w-full transition-all">
              <span class="px-3 py-2 inline-block">Settings</span>
            </a>
            <a href="#" class="hover:bg-gray-200 w-full transition-all">
              <span class="px-3 py-2 inline-block">Sign out</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>