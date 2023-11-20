<?php
// empty = isset($_SESSION['level_admin']) || $_SESSION['level_admin'] !== 1 Vì chỉ có 2 level là 0 hoặc 1 => lên thằng $_SESSION['level_admin'] trả về 0 thì cũng ko lọt đc vào true của empty
if (empty($_SESSION['level_admin'])) {
  echo "<div class='flex items-center justify-center h-full'>
    <div class='flex flex-col items-center justify-center gap-10'>
      <img srcset='./images/public/404.png 2x' alt='404 Error'>
      <h3 class='text-5xl font-semibold uppercase text-red-600'>Bạn chưa đủ thẩm quyền!!</h3>
    </div>
  </div>";
  exit;
}
